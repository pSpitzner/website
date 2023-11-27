<!-- include this file before the content, but after setting a page title in head -->
<!-- default header to include after the custom one on all pages -->
<!-- I guess e.g.  the title is not overwritten by later. include this after customizaiton -->

<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
$root = "";
?>

<!-- I used to have hash based navigation. lets redirect all legacy to the new home, with javascript -->
<!-- urls used to have the pattern https://makeitso.one/#/about -->
<!-- <script>
    if (window.location.hash) {
        // set all to index
        window.location.href = "/holz5/";

    }
</script> -->

<head>

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $root; ?>/main/media/favicon_s/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $root; ?>/main/media/favicon_s/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $root; ?>/main/media/favicon_s/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $root; ?>/main/media/favicon_s/site.webmanifest">
    <link rel="shortcut icon" href="<?php echo $root; ?>/main/media/favicon_s/favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-TileColor" content="#da532c">
    <!-- safari pull-to-refresh color -->
    <meta name="theme-color" content="#fff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#000" media="(prefers-color-scheme: dark)">
    <!-- disable dark reader extension, we do have dark mode -->
    <meta name="darkreader-lock">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $root; ?>/main/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $root; ?>/main/css/combined_less.css">
</head>

<body>
    <!-- <div class="container pt-0 mt-0" id="smoothStateWrapper" data-transition="fade"> -->
    <main class="container pt-0 mt-0">
        <div class="row pt-0 mt-0">

            <!-- sidebar -->
            <?php
            include __DIR__ . "/nav_outer_sidebar.php";
            ?>

            <!-- content column -->
            <div class="col-sm-12 col-md-10 pt-0 mt-0">

                <!-- navbar -->
                <?php
                include __DIR__ . "/nav_outer_menubar.php";
                ?>

                <!-- swup div -->
                <div class="animate transition-default" id="swup" aria-live="polite">
