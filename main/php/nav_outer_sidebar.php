<!-- this is the guy shown on the left side, dynamically loading nav items -->

<div id="sbouter" class="col-2 p-0 m-0 d-none d-md-block
    <?php
        // we only want the onlanding class on the
        // index page!
        if (basename($_SERVER['PHP_SELF']) == "index.php") {
            echo " onlanding";
        }
    ?>
">

    <div id="sbinner" class="sticky">
        <div id="sbtop"></div>
        <!-- <div id="sbpad"></div> -->
        <div id="sbcontent">
            <div class="sidebar-header">
                <div class="logo"></div>
            </div>

            <ul class="list-unstyled components">
                <?php
                include "nav_inner.php";
                ?>
            </ul>
        </div>
    </div>
</div>
