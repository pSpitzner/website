<!doctype html>
<html lang="en">

<head>
    <title>Paul's Site</title>
</head>
<?php
include "main/php/_pre.php";
?>

<!-- content -->
<div id="content-index" class="content animate">

    <div id="profile-wrapper">

        <div id="profile-name">
            <div>
                <span id="profile-hello">Hi, I'm</span>
                <span>Paul</span>
            </div>
            <div>
                <span>Spitzner</span>
            </div>
        </div>
        <div id="profile-description">
            <div>
                I'm a
                physicist
            </div>
            <div>
                with passion
            </div>
            <div>
                for tech,
            </div>
            <div>
                clean code,
            </div>
            <div>
                and visual things.
            </div>
        </div>


        <img id="profile-pic" src="main/media/torso_transparent_1000w.webp">

        <div id="engage-wrapper" class="onlanding"> <!-- for small displays, button to show navbars -->
            <picture>
                <source srcset="main/media/enter_light_bg.webp" media="(prefers-color-scheme: light)">
                <img id="enter-bg" src="main/media/enter_dark_bg.webp">
                </img>
            </picture>
            <picture>
                <source srcset="main/media/enter_light_fg.webp" media="(prefers-color-scheme: light)">
                <img id="enter-key" src="main/media/enter_dark_fg.webp" onclick="engage()">
                </img>
            </picture>
        </div>
    </div>


</div> <!-- content -->

<?php
include "main/php/_post.php";
?>

</html>
