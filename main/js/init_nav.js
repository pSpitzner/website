var prevpage = 'undefined';

// find out what's the navigation target site / id from the browser url
function get_id_from_current_url() {

    url = window.location.href;
    urlparts = url.split('/');

    last = urlparts[urlparts.length - 1];
    llast = urlparts[urlparts.length - 2];

    if (llast == "blog") {
        // we have suburls but want to keep the nav on blog
        return "blog";
    }

    last = last.split('#')[0].split('&')[0]; // get rid of in page links
    last = last.split('.php')[0];
    last = last.split('.html')[0];

    last = last.toLowerCase(); // lowercase everything
    if (last == "index" || last =="") {
        last = "home";
    }
    return last
}


function set_breadcrumb(to) {
    if (typeof to == 'undefined') {
        to = get_id_from_current_url();
    }
    if (to == 'cv') {
        // fully upper case if its 'cv'
        to = 'CV';
    } else {
        // capitalize first letter
        to = to.charAt(0).toUpperCase() + to.slice(1);
    }
    document.getElementById("thebreadcrumb").textContent = to
}

function set_navbar_active(to) {
    if (typeof to == 'undefined') {
        to = get_id_from_current_url();
    }
    document.querySelectorAll('.id' + to).forEach(element => element.classList.add('active'));
    // console.log("set navbar active to .id"+to)
}

function display_copy(el) {
    var old = "";
    for (var i = el.length - 1; i >= 0; i--) {
        old = el[i].innerHTML;
        if (!el[i].getAttribute("data-copying")) {
            el[i].setAttribute("data-text-original", el[i].innerHTML);
            el[i].setAttribute("data-copying", true);

        }
        brheight = el[i].clientHeight;
        brs = (old.match(/<br\s*[\/]?>/g) || []).length;
        // console.log("elbrs: "+brs+" "+brheight);
        // needs to match sidebar.less and somehow 1.2 doesnt work.
        // safari also not compatible
        const lh = 1.1;
        brs = (brs+1)*lh;
        // if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
            // brs+=0.1;
        // }
        // tar = '<span style="line-height: '+((brs)) + 'em;';
        // console.log(brheight);
        // swp-fix sets height so we can use it relyably
        tar = '<span style="line-height: '+((brheight)) + 'px;';
        tar += 'overflow: hidden';
        // tar += 'padding-top: 25px; display:block';
        // tar += 'vertical-align: middle;';
        // tar += 'height: '+brheight+'px;';
        tar += '">copied!</span>';
        // tar = '<span style="line-height: '+(brheight)+'px;';
        // tar += 'height: '+(brheight)+'px;';
        // tar += '">copied!</span>';
        el[i].innerHTML = tar;
    }
    return old;
}

function contact_copy(id) {
    // xl stuff is copied to clipboard
    // md only visually updated
    const md = document.getElementsByClassName(id+'md');
    const xl = document.getElementsByClassName(id+'xl');

    display_copy(md);
    var xlold = display_copy(xl);

    // console.log(xlold);
    copyTextToClipboard(xlold.replace(/<br\s*[\/]?>/gi, '\n'));
    // console.log(xlold.replace(/<br\s*[\/]?>/gi, '\n'));

    setTimeout(function() {
        for (var i = md.length - 1; i >= 0; i--) {
            md[i].innerHTML = md[i].getAttribute("data-text-original");
            md[i].setAttribute("data-copying", false);
        }
        for (var i = xl.length - 1; i >= 0; i--) {
            xl[i].innerHTML = xl[i].getAttribute("data-text-original");
            xl[i].setAttribute("data-copying", false);
        }
    }, 750)
}

// https://stackoverflow.com/questions/400212/how-do-i-copy-to-the-clipboard-in-javascript
function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    // Place in top-left corner of screen regardless of scroll position.
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;

    // Ensure it has a small width and height. Setting to 1px / 1em
    // doesn't work as this gives a negative w/h on some browsers.
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    // large font Size so no zoom occurs
    textArea.style.fontSize = '16px';
    // Set to readonly to prevent mobile devices opening a keyboard when
    // text is .select()'ed.
    textArea.setAttribute('readonly', true);

    // We don't need padding, reducing the size if it does flash render.
    textArea.style.padding = 0;

    // Clean up any borders.
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';

    // Avoid flash of white box if rendered for any reason.
    textArea.style.background = 'transparent';

    textArea.value = text;
    document.body.appendChild(textArea);

    var range;
    var selection;

        if (navigator.userAgent.match(/ipad|iphone/i)) {
            range = document.createRange();
            range.selectNodeContents(textArea);
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        // console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
        // console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
}
function copyTextToClipboard(text) {
    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        return;
    }
    navigator.clipboard.writeText(text).then(function() {
        // console.log('Async: Copying to clipboard was successful!');
    }, function(err) {
        console.error('Async: Could not copy text: ', err);
    });
}

// what are collapsable panels we want to remember?
var candidates = ['.idcontact', '#idnavbar', '.idlinks'];
var panels = []
function collapse_state_to_local_storage() {
    panels = new Array();
    for (var c in candidates) {
        var elements = document.querySelectorAll(candidates[c]);
        elements.forEach(element => {
            if (element.classList.contains('show')) {
                panels.push(candidates[c]);
            }
        });
    }
    // console.log(panels);
    // localStorage.panels=JSON.stringify(panels);
}

function set_panels() {
    for (var c in candidates) {
        var elements = document.querySelectorAll(candidates[c]);
        if (panels.includes(candidates[c])) {
            elements.forEach(element => element.classList.add('show'));
        } else {
            elements.forEach(element => element.classList.remove('show'));
        }
    }
}

try {
    // save collapsed state of panels to local storage
    document.querySelectorAll('.navbar .navbar-collapse').forEach(element => {
        element.addEventListener('shown.bs.collapse', collapse_state_to_local_storage);
        element.addEventListener('hidden.bs.collapse', collapse_state_to_local_storage);
    });
} catch (e) {
    // console.log(e);
}

function set_nav() {
    // remove the active class from all idtoggles
    // be fast with this!
    document.querySelectorAll('.idtoggle').forEach(element => element.classList.remove('active'));
    set_navbar_active();
    set_breadcrumb();
    set_panels();
}

function leave_landing() {

    var sbouter = document.getElementById('sbouter');
    var nbtop = document.getElementById('nbtop');

    if (sbouter.classList.contains('onlanding') || nbtop.classList.contains('onlanding')) {
        // get rid of the backgrounds quickly!
        document.querySelectorAll('.idtoggle').forEach(element => element.classList.remove('active'));
        setTimeout(function () {
            set_nav();
        }, 200);
    }

    // add timout so this is done after the page animation finishes
    nbtop.classList.remove('onlanding');
    sbouter.classList.remove('onlanding');


}

function toggle_menubar() {
    // unfold the menubar when we hit enter, using a bootstrap collapse
    var collapseElement = document.getElementById('idnavbar');
    var bsCollapse = new bootstrap.Collapse(collapseElement, { toggle: false });
    bsCollapse.toggle();
}

function engage() {
    leave_landing();
    toggle_menubar();
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        engage();
    }
});

document.getElementById('sbouter').addEventListener('click', function () {
    leave_landing();
    // we only need this once, so remove the event listener
    document.getElementById('sbouter').removeEventListener('click', arguments.callee);
});

// try to set the nav items as soon as possible
try {
    set_nav();
} catch (e) {
    // console.log(e);
}

// any click on a sidebar element should go to non-minimal mode

// limit repetition rate of func
function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        // enable hover
        // firefox doesnt support @media (hover: hover)
        const canHover = !(matchMedia('(hover: none)').matches);
        if(canHover) {
            document.body.classList.add('can-hover');
        }

        'use strict';

        set_nav();
    }
};


