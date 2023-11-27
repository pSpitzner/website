<!-- creates an infinity scroll that just renders all the posts -->


<?php
include __DIR__ . "/../main/php/_pre.php";
?>

<head>
    <title>Paul's Blog</title>
</head>

<div id="content-blog" class="content animate blog markdown blog-infini-scroll">

    <?php
    include __DIR__ . "/utility.php";
    echo renderAllPostsFromFolder(BLOG_POSTS_PATH, [
        'showDate' => true, 'showLink' => true,
        'showIcon' => true
    ]);
    ?>

</div>

<?php
include __DIR__ . "/../main/php/_post.php";
?>
