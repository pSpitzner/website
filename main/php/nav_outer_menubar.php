<!-- this is the navbar on top that is only visible for small displays -->

<nav id="nbtop" class="navbar navbar-expand-md d-md-none
    <?php
        // we only want th minimal class on the
        // index page!
        if (basename($_SERVER['PHP_SELF']) == "index.php") {
            echo " onlanding";
        }
    ?>
    ">
    <div id="menubar_header" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#idnavbar" aria-controls="idnavbar" aria-expanded="false">
        <div class="navbar-brand logo d-md-none m-r-auto"></div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <div>Paul's Site</div>
            </li>
            <li class="breadcrumb-item active d-none d-sm-inline" aria-current="page">
                <!-- only using one for now -->
                <span id="thebreadcrumb" class="idcontent idhome breadcrumb-last active d-none d-sm-inline"></span>
            </li>
        </ol>


        <span id="menubar-can-expand-icon" data-feather="more-horizontal" class="feather-lg d-md-none"></span>

    </div>

    <div class="collapse navbar-collapse" id="idnavbar">
        <div class="hline"></div>
        <ul class="navbar-nav d-md-none">
            <?php
            include "nav_inner.php";
            ?>
        </ul>
    </div>
</nav>
