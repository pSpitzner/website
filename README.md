
# Code behind my website

## Dependencies and packages I use
- php
- [bootstrap 5.1.3](https://github.com/twbs/bootstrap/releases/download/v5.1.3/bootstrap-5.1.3-dist.zip), for column layout and collapse. download and place in `/main/bootstrap-5.1.3-dist`.
- [swup4](https://github.com/swup/swup) for page transitions and preloading.
- [pdf.js 2.16.105](https://github.com/mozilla/pdf.js/) for rendering the cv from pdf.
- [feather icons](https://feathericons.com)
- [less](https://lesscss.org/) for css preprocessing
- [php composer](https://getcomposer.org/) to get some php packages below
- [php frontyaml](https://github.com/mnapoli/FrontYAML) for parsing markdown and yaml
- [php smartypants](https://github.com/michelf/php-smartypants) for unifying typography
- [php markdown blog by Cristy94](https://github.com/Cristy94/markdown-blog) to create the blog structure from essentially a folder of markdown files.
- [python script to parse bibtex](https://github.com/pSpitzner/publicationlist_bibtex_to_html)


The composer packages are only needed in the blog for markdown parsing.

```
cd /blog/src  composer require mnapoli/front-yaml michelf/php-smartypants
```

To get the css from my less files, run

```
lessc /main/css/_main.less /main/css/combined_less.css
```
