

<?php
// Get setting and Markdown classes
require_once __DIR__ . "/settings.php";
// require_once BLOG_RESOURCE_PATH . "/Parsedown.php";
require_once BLOG_RESOURCE_PATH . "/Michelf/SmartyPants.inc.php";
require_once BLOG_RESOURCE_PATH . "/Michelf/SmartyPantsTypographer.inc.php";
// frontyaml installed via composer https://github.com/mnapoli/FrontYAML
require BLOG_RESOURCE_PATH . '/vendor/autoload.php';

$parser = new Mni\FrontYAML\Parser();




function parseMarkdown($markdown)
{
    global $parser;

    // used to have different parser:
    // $Parsedown = Parsedown::instance();
    // $html = $Parsedown->text($markdown);
    $document = $parser->parse($markdown);

    $yaml = $document->getYAML();
    if ($yaml === null) {
        $yaml = [];
    }
    $yaml = array_change_key_case($yaml, CASE_LOWER);

    $html = $document->getContent();
    $html = Michelf\SmartyPants::defaultTransform($html, "2");
    $html = Michelf\SmartyPantsTypographer::defaultTransform($html);
    // https://michelf.ca/projects/php-smartypants/configuration/
    // parse smart punctuation, "2" is the config for em dashes "---" and en dashes "--"

    return [$html, $yaml];
}

function getPostTitle($markdown)
{
    // Gets first # TITLE markdown and returns only text
    $titlePattern = '/^# (.*)/m';
    preg_match($titlePattern, $markdown, $matches);
    if (count($matches) < 2) {
        return '';
    }
    return $matches[1];
}

function getAdjacentPosts($file)
{
    $folder = dirname($file);
    $files = glob($folder . "/*.md");
    $index = array_search($file, $files);
    $prev = $index - 1;
    $next = $index + 1;

    if ($prev < 0) {
        $prev = null;
    } else {
        $prev = [
            'file' => $files[$prev],
            'slug' => pathinfo($files[$prev], PATHINFO_FILENAME),
            // 'title' => getPostTitle(file_get_contents($files[$prev])),
        ];
    }

    if ($next >= count($files)) {
        $next = null;
    } else {
        $next = [
            'file' => $files[$next],
            'slug' => pathinfo($files[$next], PATHINFO_FILENAME),
            // 'title' => getPostTitle(file_get_contents($files[$next])),
        ];
    }

    return [$prev, $next];
}

function renderPostFromMarkdown($fileOrMd, $options = [])
{
    // best way to mimic kwargs:
    // renderPostFromMarkdown(['showLink' => true]);

    $defaults = [
        'showDate' => false,
        'showLink' => false,
        'showAdjacentLinks' => false,
        'showIcon' => false,
        'prevPost' => null,
        'nextPost' => null,
    ];
    $options = array_merge($defaults, $options);

    if (file_exists($fileOrMd)) {
        $file = $fileOrMd;
        $markdown = file_get_contents($fileOrMd);
    } else {
        $file = null;
        $markdown = $fileOrMd;
    }

    [$html, $yaml] = parseMarkdown($markdown);

    $res = "<div class='blog-post'";

    // if we have tags, add them as attributes
    if (isset($yaml['tags'])) {
        $res .= " data-post-tags='" . implode(" ", $yaml['tags']) . "'";
    }

    $res .= ">";

    // add adjacent links
    if ($options['showAdjacentLinks']) {
        $res .= "<div class='blog-post-adjacent-links'>";
        if ($options['prevPost'] !== null) {
            $res .= "<a href='" . $options['prevPost']['slug'] . "'";
            $res .= "class='btn btn-matchsidebar shadow-none blog-link-prev'>";
            $res .= "<span data-feather='chevron-left'></span>";
            $res .= "Previous post";
            $res .= "</a>";
        }
        if ($options['nextPost'] !== null) {
            $res .= "<a href='" . $options['nextPost']['slug'] . "'";
            $res .= "class='btn btn-matchsidebar shadow-none blog-link-next'>";
            $res .= "Next post";
            $res .= "<span data-feather='chevron-right'></span>";
            $res .= "</a>";
        }
        $res .= "</div>";
    }

    // add icon, should float to the right
    if ($options['showIcon'] && isset($yaml['icon'])) {
        $res .= "<img class='blog-post-icon'";
        $res .= "src='" . $yaml['icon'] . "'";
        $res .= "></img>";
    }

    // if there is a date in the yaml, parse it
    if (isset($yaml['date']) && $options['showDate']) {
        try {
            $date = new DateTime('@' . $yaml['date']);
            $formattedDate = $date->format('F j, Y');
            $res .= "<div class='blog-post-date'>" . $formattedDate . "</div>";
        } catch (Exception $e) {
            // pass
        }
    }

    $res .= $html;

    $res .= "</div>";

    // add link by replacing the first h1
    if ($file !== null && $options['showLink']) {
        // Post slug is filename, without .md extension
        // but only from the BLOG_POSTS_PATH folder onwards
        // $slug = substr($file, 0, -3);
        // $slug = substr($slug, strlen(BLOG_POSTS_PATH) + 1);
        $slug = pathinfo($file, PATHINFO_FILENAME);

        $icon = "<a class = 'blog-post-link' href='" . $slug . "'>";
        $icon .= "<span data-feather='link'></span>";
        $icon .= "</a>";

        // find the first h1 (and last word) and add the link, without causing line breaks
        $res = preg_replace('/<h1>(.*\s)(\S*)<\/h1>/', '<h1>${1}<span style="white-space: nowrap;">${2}&nbsp;' . $icon . '</span></h1>', $res);
    }


    return $res;
}


function renderAllPostsFromFolder($folder, $options = []) {

    $defaults = ['prefix' => "", 'suffix' => ""];
    $options = array_merge($defaults, $options);

    $html = '';
    foreach (array_reverse(glob($folder . "/*.md")) as $file) {
        $html .= $options['prefix'];
        $html .= renderPostFromMarkdown($file, $options);
        $html .= $options['suffix'];
    }

    return $html;
}
