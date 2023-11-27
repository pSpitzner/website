<!doctype html>
<html lang="en">

<?php
include "main/php/_pre.php";
?>

<head>
    <title>Paul's CV</title>
    <link rel="stylesheet" href="<?php echo $root; ?>/main/css/cv.css">
</head>

<!-- content -->
<div id="content-cv" class="content animate">


    <div id="cv-pdf-viewer-wrapper">
        <!-- i precreate the page containers to avoid dom flicker. this is optional -->
        <div id="pageContainer-1" class="pageContainer">
            <div class="renderOverlay"></div>
        </div>
        <div id="pageContainer-2" class="pageContainer">
            <div class="renderOverlay"></div>
        </div>

    </div>

    <!-- bootstrap download button -->
    <a href="main/media/cv_spitzner.pdf" id="cv-download-button-frame" class="alert" role="button" download>
        <span id="cv-download-icon" data-feather="download" class="feather"></span>
        <span id="cv-download-text">Download pdf</span>
    </a>



</div> <!-- content -->

<?php
include "main/php/_post.php";
?>

<!-- call this also with swup after page transition! -->
<script>
    init_pdf_viewer('cv-pdf-viewer-wrapper', 'main/media/cv_spitzner.pdf');
</script>

</html>
