<?php

/**
 * Loads the markdown file given in the ?page query param into $markdown.
 */

include __DIR__ . "/utility.php";
$slug = $_GET['page'];

// using BLOG_POSTS_PATH from utility.php does not work here?
$file = BLOG_POSTS_PATH . $slug;


if (file_exists($file)) {
    $markdown = file_get_contents($file);
    $pageTitle = getPostTitle($markdown);
} else {
    $markdown = "# 404 <br/> Post '$slug' not found 😢 ";
    $pageTitle = 'Blog post not found!';
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="blog.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<?php
include __DIR__ . "/../main/php/_pre.php";
?>

<div id="content-blogpost" class="content animate blog markdown blog-single-post">

    <?php

    [$prev, $next] = getAdjacentPosts($file);
    echo renderPostFromMarkdown(
        $markdown, [
            'showDate' => true,
            'showLink' => false,
            'showAdjacentLinks' => true,
            'prevPost' => $prev,
            'nextPost' => $next,
        ]);
    ?>

</div>

<?php
include __DIR__ . "/../main/php/_post.php";
?>

</html>
