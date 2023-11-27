// dont forget to include the scripts before importing this!
// <script src="https://unpkg.com/swup@3"></script>
// <script src="https://unpkg.com/@swup/preload-plugin@2"></script>
// <script src="https://unpkg.com/@swup/route-name-plugin@3"></script>
// <script src="https://unpkg.com/@swup/scroll-plugin@2"></script>


// < !--Matomo -->


var _paq = window._paq = window._paq || [];
_paq.push(['disableCookies']);
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
var u="//makeitso.one/matomo/";
_paq.push(['setTrackerUrl', u+'matomo.php']);
_paq.push(['setSiteId', '1']);
var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
})();

// End Matomo Code *

const swup = new Swup({
    cache: true,
    animateHistoryBrowsing: false,
    debugMode: false,
    // i got a console error because swup fails to preload external links. this is a workaround.
    linkSelector: 'a[href^="/"]:not([data-no-swup]), a[href^="' + window.location.origin + '"]:not([data-no-swup]), a[href^="#"]:not([data-no-swup]), a:not([href^="/"]):not([href^="http"]):not([data-no-swup])',
    plugins: [
        // preload on hover
        new SwupPreloadPlugin(),
        new SwupMatomoPlugin()
    ]
});

swup.hooks.on('animation:in:start', (visit) => {
    set_nav();
});

swup.hooks.on('animation:in:end', (visit) => {
    // on small screens, collapse the nav bar after a transition
    if (window.innerWidth <= 768) {
        var navbar = document.getElementById('idnavbar');
        var bsCollapse = new bootstrap.Collapse(navbar, { toggle: false });
        bsCollapse.hide();
    }
});

swup.hooks.on('page:view', (visit) => {
    set_nav();
    try {
        url = visit.to.url;
        page = url.substring(url.lastIndexOf('/') + 1);
        folder = url.split('/')[url.split('/').length - 2];

        // some pages need feather icons
        if (['cv'].includes(page) || ['blog'].includes(folder)) {
            feather.replace();
        }

        // other special inits
        if (page == 'publications') {
            // that is their api call
            // https://badge-docs.altmetric.com/getting-started.html#quick-start
            _altmetric_embed_init();
        }
        else if (page == 'cv') {
            init_pdf_viewer('cv-pdf-viewer-wrapper', 'main/media/cv_spitzner.pdf');
        }
        else if (page == 'index') {
            // if swup gets us 'home', we are returning from elsewhere, thus, remove the `onlanding` class
            // to hide the enter keyboard.
            document.getElementById('engage-wrapper').classList.remove('onlanding');
        }

    } catch (e) {
        console.log(e);
    }
});

// helps developing
function keep_fresh(interval) {
    setInterval(function() {
        let currentUrl = window.location.href;
        swup.navigate(currentUrl);
    }, interval);
}
