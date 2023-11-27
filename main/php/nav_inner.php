<!-- this get included in the top bar and side bar -->
<li class="nav-item idtoggle idhome">
    <a class="nav-link noselect" href="<?php echo $root; ?>/index">
        <span data-feather="home" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Home</span>
        <span class="pad"></span>
    </a>
</li>

<li class="nav-item idtoggle idabout">
    <a class="nav-link noselect" href="<?php echo $root; ?>/about">
        <span data-feather="user" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">About Me</span>
        <span class="pad"></span>
    </a>
</li>

<li class="nav-item idtoggle idblog">
    <a class="nav-link noselect" href="<?php echo $root; ?>/blog">
        <span data-feather="rss" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Blog</span>
        <span class="pad"></span>
    </a>
</li>

<li class="nav-item idtoggle idresearch">
    <a class="nav-link noselect" href="<?php echo $root; ?>/research">
        <span data-feather="box" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Research</span>
        <span class="pad"></span>
    </a>
</li>

<li class="nav-item idtoggle idpublications">
    <a class="nav-link noselect" href="<?php echo $root; ?>/publications">
        <span data-feather="file" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Publications</span>
        <span class="pad"></span>
    </a>
</li>

<li class="nav-item idtoggle idcv">
    <a class="nav-link noselect" href="<?php echo $root; ?>/cv">
        <!-- <a class="nav-link noselect" href="main/media/cv_spitzner.pdf" target="_blank"> -->
        <span data-feather="list" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">CV</span>
        <span class="pad"></span>
    </a>
</li>

<!-- contact -->
<li class="nav-item idexpand">
    <div class="nav-link expand noselect " data-bs-target=".idcontact" data-bs-toggle="collapse" aria-expanded="false">
        <span data-feather="at-sign" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Contact</span>
        <span class="pad"></span>
        <span class="feather can-expand-icon rhs" data-feather="more-horizontal"></span>
    </div>
    <ul class="collapse list-unstyled nav-expand-group idcontact">
        <li class="nav-item expand">
            <div class="nav-link" onclick="contact_copy('idmail')">
                <span data-feather="mail" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="idmailmd swp-fix-1 text d-none d-md-inline d-xl-none">Mail</span>
                <span class="idmailxl swp-fix-1 text d-inline d-md-none d-xl-inline">paul.spitzner@ds.mpg.de</span>
                <span class="pad"></span>
            </div>
        </li>
        <li class="nav-item expand">
            <div class="nav-link" onclick="contact_copy('idphone')">
                <span data-feather="phone-call" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="idphonemd swp-fix-1 text d-none d-md-inline d-xl-none">Phone</span>
                <span class="idphonexl swp-fix-1 text d-inline d-md-none d-xl-inline">+49 551 5176 475</span>
                <span class="pad"></span>
            </div>
        </li>
        <li class="nav-item expand">
            <div class="nav-link" onclick="contact_copy('idinstitute')">
                <span data-feather="map-pin" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="idinstitutemd swp-fix-1 text d-none d-md-inline d-xl-none">Institute</span>
                <span class="idinstitutemd swp-fix-3 text d-inline d-md-none">Max Planck Institute for<br />Dynamics and Self-Organization<br />Office 3.132</span>
                <span class="idinstitutemd swp-fix-2 text d-none d-xl-inline">MPIDS<br />Office 3.132</span>
                <span class="idinstitutexl swp-fix-2 text d-none">Max Planck Institute for Dynamics and Self-Organization</span>
                <span class="pad"></span>
            </div>
        </li>
        <li class="nav-item expand">
            <div class="nav-link" onclick="contact_copy('idaddress')">
                <span data-feather="map" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="idaddressmd swp-fix-1 text d-none d-md-inline d-xl-none">Address</span>
                <span class="idaddressxl swp-fix-3 text d-inline d-md-none d-xl-inline">Am Faßberg 17<br />37077 Göttingen<br />Germany</span>
                <span class="pad"></span>
            </div>
        </li>
    </ul>
</li>
<!-- <li class="nav-item">
    <a class="nav-link noselect" href="./media/cv_spitzner_current.pdf">
        <span data-feather="list" class="feather d-md-none d-lg-inline"></span>
        <span class="pad"></span>
        <span class="text">CV</span>
        <span class="pad"></span>
    </a>
</li> -->

<!-- links -->
<li class="nav-item idexpand">
    <div class="nav-link expand noselect" data-bs-target=".idlinks" data-bs-toggle="collapse" aria-expanded="false">
        <span data-feather="link" class="sb-icon feather"></span>
        <span class="pad"></span>
        <span class="text">Links</span>
        <span class="pad"></span>
        <span class="feather can-expand-icon rhs" data-feather="more-horizontal"></span>
    </div>
    <ul class="collapse list-unstyled nav-expand-group idlinks">
        <li class="nav-item expand">
            <a class="nav-link" href="https://github.com/pSpitzner">
                <span data-feather="github" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-inline">GitHub</span>
                <span class="pad"></span>
            </a>
            <a class="nav-link" href="https://scholar.google.de/citations?user=addplfcAAAAJ">
                <span data-feather="scholar" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-none d-md-inline d-xl-none">Scholar</span>
                <span class="swp-fix-1 text d-inline d-md-none d-xl-inline">Google Scholar</span>
                <span class="pad"></span>
            </a>
            <a class="nav-link" href="https://arxiv.org/a/spitzner_f_1.html">
                <span data-feather="arxiv" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-inline">ArXiv</span>
                <span class="pad"></span>
            </a>
            <a class="nav-link" href="https://orcid.org/0000-0001-9774-4572">
                <span data-feather="orcid" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-inline">ORCID</span>
                <span class="pad"></span>
            </a>
            <!-- <a class="nav-link" href="https://twitter.com/paulspitzner">
                <span data-feather="twitter" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-inline">Twitter</span>
                <span class="pad"></span>
            </a> -->
            <a class="nav-link" href="https://www.linkedin.com/in/pspitzner">
                <span data-feather="linkedin" class="feather sm d-md-none d-lg-inline"></span>
                <span class="pad"></span>
                <span class="swp-fix-1 text d-inline">LinkedIn</span>
                <span class="pad"></span>
            </a>
        </li>
    </ul>
</li>
