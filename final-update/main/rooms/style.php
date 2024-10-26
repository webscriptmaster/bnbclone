<style>
  .calendar-container {
    display: flex;
    flex-direction: row;
    padding: 0px 0px 0px 72px !important;
    justify-content: center;
    font-size: 0.8rem;
}
        .modal {
            overflow: auto;
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;    scrollbar-gutter: auto;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }
        .modal-content {
    padding: 20px;
    margin-top: 68px !important;
}
        /* Body CSS */
        body {
            line-break: strict;
            overflow: auto; /* Default mein scroll allowed hai */
        }
    </style>

    <!-- phly -->

    <style>
       .show-all-button {
    position: absolute;
    bottom: 25px;
    right: 24px;
    z-index: 3;
    border: 1px solid #222222;
    margin: 0;
    font-size: 0.875rem;
    line-height: 1.125rem;
    text-align: center;
    font-family: 'Airbnb Cereal VF', 'Circular', -apple-system, 'BlinkMacSystemFont', 'Roboto', 'Helvetica Neue', sans-serif;
    background-color: white;
    color: black;
    padding: 7px 15px;
    outline: none;
    touch-action: manipulation;
    touch-action: manipulation;
    -webkit-tap-highlight-color: transparent;
    width: auto;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: box-shadow 0.2s cubic-bezier(0.2,0,0,1);
    display: flex;
    align-items: center;
}
            </style>         <style>
        .modal-content {
            padding: 20px;
            margin-top: 20px;
        }
        .top-image {
            margin-bottom: 5px;
        }
        .top-image img {
            width: 100%;
            height: auto;
        }
        .bottom-images {
            display: flex;
            width: 50%;
            gap: 7px;
        }
      


        .show-all-button {
          
    -webkit-box-align: center !important;
    display: flex !important;
    align-items: center !important;
}
        .show-all-button i {
            margin-right: 5px;
        }
        .show-all-button svg {
    height: 16px;
    width: 51px;
}s

.image-gallery {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 7px;
    min-height: 100% !important;
    min-width: 100% !important;
    align-items: center;
}


@media (min-width: 1128px) {
    /* .image-gallery {
        max-height: -webkit-calc(60vh - 64px) !important;
        max-height: -moz-calc(60vh - 64px) !important;
        max-height: calc(60vh - 64px) !important;
    } */
}
.main{
    height: 99% !important;
}
.main-image {
    grid-column: 1 / span 1;
    height: 100%;
}

.thumbnail-gallery {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
    margin-top: 2px;
}

.image-item1 {
    width: 100%;
    object-fit: cover;
    height: 275px !important;

    /* border-radius: 8px; */
    /* cursor: pointer; */
}
._mqdoygn {
    overflow-y: hidden !important;
    max-height: -webkit-calc(100vh - 144px) !important;
    max-height: -moz-calc(100vh - 144px) !important;
    max-height: calc(100vh - 44px) !important;
    position: relative !important;
    min-height: 300px !important;
    height: 100% !important;
}
.image-item {
    width: 100%;
    object-fit: cover;
    height: 100% !important;

    /* border-radius: 8px; */
    cursor: pointer;
}

.main {
    height: 300px;
    object-fit: cover;
    cursor: pointer;

    /* border-radius: 10px; */
}

.show-all-container {
    position: relative;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: default !important;
}
.pso {
    position: fixed;
    display: flex;
    justify-content: space-between;
    top: 14px;
    width: 98%;
    align-items: center;
}
.highlight {
    border: 2px solid blue; /* Change this to any color you want for the highlight */
    transition: border 0.3s; /* Smooth transition for the border */
}
.image-gallery img {
    width: 100%;
    height: 100%;
    transition: 0.3s ease; /* Smooth transition */
}

.image-gallery img:hover {
    filter: brightness(70%); /* Darken the image */
}
.close {
    display: inline-block; 
    position: relative; 
}

.top-image img { 
    width: 100%;
    height: 100%;
    transition: 0.3s ease; /* Smooth transition */
}

.top-image img:hover { 
    filter: brightness(70%); /* Darken the image on hover */
}

.bottom-images img { 
    width: 100%;
    height: 100%;
    transition: 0.3s ease; /* Smooth transition */
}

.bottom-images img:hover { 
    filter: brightness(70%); /* Darken the image on hover */
}

.close1 {
    cursor: pointer; 
    transition: transform 0.2s;
    position: relative; 
    z-index: 1; 
}

.close1:hover {
    transform: scale(1.1);
}

/* .close::before {
    content: "";
    position: absolute;
    top: -9px;
    left: -2px;
    right: -12px;
    bottom: -9px;
    background-color: white;
    border-radius: 50%;
    z-index: 0;
    transition: background-color 0.2s;
} */

.close:hover::before {
    background-color: #DDDDDD;
}

</style>

<style>
                                                      .nn{
                                                          border:1px
                                                      }
                                                      .image-gallery {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 7px;
background: white !important;
/* margin: 20px; */
align-items: center;
}
._uhxsfg {
margin-left: 8px !important;
}

.image-gallery .main-image {
grid-row: span 2;
}

.image-gallery img {
width: 100%;
height: 100%;


}
.modal {
display: none;
position: fixed;
z-index: 1000;
left: 0;
top: 0;
width: 100%;
height: 100%;
background-color: rgba(0,0,0,0.9);
}

.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
border: 0px !important;
}

.modal-content img {
width: 100%;
}

.close {
margin-top: 10px;
margin-left: 30px;
color: black;
font-size: 40px;
font-weight: bold;
cursor: pointer;
}

</style><style>
.LGLeeN-keyboard-shortcuts-view{display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex}.LGLeeN-keyboard-shortcuts-view table,.LGLeeN-keyboard-shortcuts-view tbody,.LGLeeN-keyboard-shortcuts-view td,.LGLeeN-keyboard-shortcuts-view tr{background:inherit;border:none;margin:0;padding:0}.LGLeeN-keyboard-shortcuts-view table{display:table}.LGLeeN-keyboard-shortcuts-view tr{display:table-row}.LGLeeN-keyboard-shortcuts-view td{-moz-box-sizing:border-box;box-sizing:border-box;display:table-cell;color:#000;padding:6px;vertical-align:middle;white-space:nowrap}.LGLeeN-keyboard-shortcuts-view td:first-child{text-align:end}.LGLeeN-keyboard-shortcuts-view td kbd{background-color:#e8eaed;border-radius:2px;border:none;-moz-box-sizing:border-box;box-sizing:border-box;color:inherit;display:inline-block;font-family:Google Sans Text,Roboto,Arial,sans-serif;line-height:16px;margin:0 2px;min-height:20px;min-width:20px;padding:2px 4px;position:relative;text-align:center}
</style>
<style>
.gm-control-active>img{-webkit-box-sizing:content-box;box-sizing:content-box;display:none;left:50%;pointer-events:none;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.gm-control-active>img:nth-child(1){display:block}.gm-control-active:focus>img:nth-child(1),.gm-control-active:hover>img:nth-child(1),.gm-control-active:active>img:nth-child(1),.gm-control-active:disabled>img:nth-child(1){display:none}.gm-control-active:focus>img:nth-child(2),.gm-control-active:hover>img:nth-child(2){display:block}.gm-control-active:active>img:nth-child(3){display:block}.gm-control-active:disabled>img:nth-child(4){display:block}
</style>
<style>
/* .gm-ui-hover-effect{opacity:.6}.gm-ui-hover-effect:hover{opacity:1}.gm-ui-hover-effect>span{background-color:#000}@media (forced-colors:active),(prefers-contrast:more){.gm-ui-hover-effect>span{background-color:ButtonText}} */
</style>
<style>
.gm-style .gm-style-cc a,.gm-style .gm-style-cc button,.gm-style .gm-style-cc span,.gm-style .gm-style-mtc div{font-size:10px;-webkit-box-sizing:border-box;box-sizing:border-box}.gm-style .gm-style-cc a,.gm-style .gm-style-cc button,.gm-style .gm-style-cc span{outline-offset:3px}
</style>
<style>
@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}
</style>
<style>
.gm-style-moc{background-color:rgba(0,0,0,.45);pointer-events:none;text-align:center;-webkit-transition:opacity ease-in-out;-o-transition:opacity ease-in-out;transition:opacity ease-in-out}.gm-style-mot{color:white;font-family:Roboto,Arial,sans-serif;font-size:22px;margin:0;position:relative;top:50%;-o-transform:translateY(-50%);transform:translateY(-50%);-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%)}



</style>
<style>
.gm-style img{max-width: none;}.gm-style {font: 400 11px Roboto, Arial, sans-serif; text-decoration: none;}
</style>
<style data-linaria-css-reset="true" id="linariaCssReset" type="text/css">
/* stylelint-disable */

html {
/* stylelint-disable property-no-vendor-prefix */
-ms-text-size-adjust: 100%;
-moz-text-size-adjust: 100%;
-webkit-text-size-adjust: 100%;
/* stylelint-enable property-no-vendor-prefix */
}

/* Normalize */
*,
*::before,
*::after {
box-sizing: border-box; /* normalize box-sizing */
/* stylelint-disable property-no-vendor-prefix */
-ms-flex: 0 1 auto; /* to normalize flex */
/* stylelint-enable property-no-vendor-prefix */
}

body {
font-family: 'Airbnb Cereal VF', 'Circular', -apple-system, 'BlinkMacSystemFont', 'Roboto', 'Helvetica Neue', sans-serif;
font-size: 0.875rem; /* font-size should be 16px, but there are styles that rely on "em" */
line-height: 1.43;
color: #222222;
background-color: #fff;
margin: 0;
/* stylelint-disable property-no-vendor-prefix */
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
/* stylelint-enable property-no-vendor-prefix */
}

body {
/* Ensure line breaking rules for CJK languages are followed. No effect on non-CJK content
* e.g. in Japanese, prevent breaking before long-tone symbol or small characters
* instead of
* パラリンピ
* ック
* we will break
* パラリン
* ピック
*/
line-break: strict;
/* In Korean, prohibit word breaks between pairs of letters except where opportunities exist due
* to dictionary-based breaking.
* e.g. for 다 같이 캐나다에 가자 instead of breaking
* 다 같이 캐나     (break between syllables)
* 다에 가자
* we will break
* 다 같이         (break only at spaces)
* 캐나다에 가자
*/
[lang='ko'] & {
word-break: keep-all;
}
}

/* Cursor on buttons */
button,
html input[type='button'],
input[type='reset'],
input[type='submit'] {
-webkit-appearance: button;
cursor: pointer;
}

/* Form elements should inherit font-family */
input,
textarea,
select,
button,
a {
font-family: inherit;
font-size: 100%;
}

/* Links should not have special styling. DLS components should do the styling. */
a,
a:hover,
a:focus {
color: inherit;
text-decoration: none;
}

/* Default spacing between headers */
h1,
h2,
h3,
h4,
h5,
h6 {
margin-top: 25px;
margin-bottom: 15px;

&:first-child {
margin-top: 0;
}
}

/* Remove the outline from non-interactive focusable elements
This should be handled with a custom focus */
[tabindex='-1']:focus:not(:focus-visible) {
outline: 0;
}

.screen-reader-only {
border: 0;
clip: rect(0, 0, 0, 0);
height: 1px;
margin: -1px;
overflow: hidden;
padding: 0;
position: absolute;
width: 1px;
}
.screen-reader-only-focusable:active,
.screen-reader-only-focusable:focus {
clip: auto;
height: auto;
margin: 0;
overflow: visible;
position: static;
width: auto;
}
.skip-to-content:focus {
background-color: white;
font-size: 18px;
padding: 0 24px;
position: absolute;
left: 3px;
line-height: 64px;
top: 3px;
z-index: 10000;
}

/* stylelint-enable */
</style>
<style data-aphrodite="true" id="aphrodite" type="text/css">
._1r60w8{color:#222222 !important;font-family:Cereal,Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif !important;font-weight:400 !important;font-size:1rem !important;line-height:1.25rem !important;--gp-section-compact-padding:32px !important;--gp-section-compact-padding-condensed:16px !important;--gp-section-standard-padding:48px !important;--gp-section-standard-padding-condensed:24px !important;}._1k81gub{position:relative !important;}@supports (height: 1dvh){._1k81gub{min-height:100dvh !important;}}@supports not (height: 1dvh){._1k81gub{min-height:-webkit-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;min-height:-moz-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;min-height:calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;}}._siy8gh{display:none !important;}@media (min-width: 744px){._siy8gh{display:block !important;}}._vuzcgs{-webkit-box-pack:end !important;-ms-flex-pack:end !important;-webkit-box-align:center !important;-ms-flex-align:center !important;position:relative !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-align-items:center !important;align-items:center !important;-webkit-justify-content:flex-end !important;justify-content:flex-end !important;height:80px !important;}._176ugpa{-webkit-box-pack:end !important;-ms-flex-pack:end !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-flex:auto !important;-ms-flex:1 1 auto !important;flex:auto !important;-webkit-justify-content:flex-end !important;justify-content:flex-end !important;margin-right:8px !important;}._pvfq6t{position:relative !important;display:inline-block !important;vertical-align:middle !important;margin-top:auto !important;margin-bottom:auto !important;}._z5mecy{-webkit-box-align:center !important;-ms-flex-align:center !important;-webkit-align-items:center !important;align-items:center !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;height:18px !important;position:relative !important;z-index:1 !important;}._167wsvl{display:inline !important;position:relative !important;}._88xxct{display:none !important;}@media print{._88xxct{display:block !important;}}@media (min-width: 744px){._88xxct{display:block !important;}}._1a6d9c4{-webkit-box-lines:multiple !important;-webkit-box-pack:start !important;-ms-flex-pack:start !important;-webkit-box-align:stretch !important;-ms-flex-align:stretch !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-align-items:stretch !important;align-items:stretch !important;-webkit-justify-content:flex-start !important;justify-content:flex-start !important;-webkit-flex-wrap:wrap !important;-ms-flex-wrap:wrap !important;flex-wrap:wrap !important;width:100% !important;padding-left:var(--gp-padding-xsmallAndAbove, 24px) !important;padding-right:var(--gp-padding-xsmallAndAbove, 24px) !important;margin-left:0px !important;margin-right:0px !important;}@media (min-width: 375px){._1a6d9c4{padding-left:var(--gp-padding-smallAndAbove, 24px) !important;padding-right:var(--gp-padding-smallAndAbove, 24px) !important;}}@media (min-width: 744px){._1a6d9c4{padding-left:var(--gp-padding-mediumAndAbove, 40px) !important;padding-right:var(--gp-padding-mediumAndAbove, 40px) !important;}}@media (min-width: 950px){._1a6d9c4{padding-left:var(--gp-padding-mediumPlusAndAbove, 40px) !important;padding-right:var(--gp-padding-mediumPlusAndAbove, 40px) !important;}}@media (min-width: 1128px){._1a6d9c4{padding-left:var(--gp-padding-largeAndAbove, 80px) !important;padding-right:var(--gp-padding-largeAndAbove, 80px) !important;}}@media (min-width: 1440px){._1a6d9c4{max-width:none !important;padding-left:var(--gp-padding-xlargeAndAbove, 80px) !important;padding-right:var(--gp-padding-xlargeAndAbove, 80px) !important;}}@media print{._1a6d9c4{max-width:100% !important;padding-left:0 !important;padding-right:0 !important;}}._1e9g34tc{padding-top:24px !important;padding-bottom:16px !important;}@media (min-width: 744px){._1e9g34tc{padding-bottom:0px !important;}}._1875dx{padding-bottom:16px !important;}@media (min-width: 744px){._1875dx{padding-bottom:0px !important;}}._5ltqju{height:100% !important;width:50% !important;left:0px !important;top:0px !important;position:absolute !important;}._13sj9hk{height:100% !important;width:100% !important;max-height:-webkit-calc(100vh - 144px) !important;max-height:-moz-calc(100vh - 144px) !important;max-height:calc(100vh - 144px) !important;min-height:300px !important;}@media (min-height: 700px){._13sj9hk{max-height:-webkit-calc(60vh - 64px) !important;max-height:-moz-calc(60vh - 64px) !important;max-height:calc(60vh - 64px) !important;}}@media (min-width: 1128px){._13sj9hk{max-height:-webkit-calc(60vh - 64px) !important;max-height:-moz-calc(60vh - 64px) !important;max-height:calc(60vh - 64px) !important;}}._178t1g5{-webkit-box-direction:normal !important;-webkit-box-orient:vertical !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-flex-direction:column !important;-ms-flex-direction:column !important;flex-direction:column !important;height:100% !important;width:25% !important;padding-left:8px !important;left:50% !important;top:0px !important;position:absolute !important;}._1l7oqbd{height:100% !important;}@media (min-height: 450px){._1l7oqbd{height:50% !important;}}._924zz4g{display:none !important;height:50% !important;padding-top:8px !important;}@media (min-height: 450px){._924zz4g{height:50% !important;display:block !important;}}._1827gf2{-webkit-box-direction:normal !important;-webkit-box-orient:vertical !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-flex-direction:column !important;-ms-flex-direction:column !important;flex-direction:column !important;height:100% !important;width:25% !important;padding-left:8px !important;right:0px !important;top:0px !important;position:absolute !important;}._z80d2i{overflow-y:hidden !important;}@media (min-width: 744px){._z80d2i{border-radius:12px !important;}}._mqdoygn{overflow-y:hidden !important;max-height:-webkit-calc(100vh - 144px) !important;max-height:-moz-calc(100vh - 144px) !important;max-height:calc(100vh - 144px) !important;position:relative !important;min-height:300px !important;height:100% !important;}@media (min-height: 700px){._mqdoygn{max-height:-webkit-calc(60vh - 64px) !important;max-height:-moz-calc(60vh - 64px) !important;max-height:calc(60vh - 64px) !important;}}@media (min-width: 1128px){._mqdoygn{max-height:-webkit-calc(60vh - 64px) !important;max-height:-moz-calc(60vh - 64px) !important;max-height:calc(60vh - 64px) !important;}}._168ht2w{height:0 !important;min-height:100% !important;min-width:100% !important;position:relative !important;padding-top:50% !important;}._skzmvy{position:absolute !important;top:0 !important;left:0 !important;width:100% !important;height:100% !important;}._100fji8{background-color:rgba(34, 34, 34, 0.1) !important;height:100% !important;width:100% !important;}._1y6nk17h{font-size:inherit !important;font-family:inherit !important;font-weight:inherit !important;font-style:inherit !important;font-variant:inherit !important;line-height:inherit !important;color:inherit !important;text-decoration:underline !important;-webkit-appearance:none !important;-moz-appearance:none !important;appearance:none !important;background:transparent !important;border:none !important;
cursor:pointer !important;margin:-2px !important;padding:0 !important;-webkit-user-select:auto !important;-moz-user-select:auto !important;-ms-user-select:auto !important;user-select:auto !important;display:block !important;height:100% !important;position:relative !important;width:100% !important;-webkit-tap-highlight-color:transparent !important;outline:none !important;text-align:left !important;}@media (hover: hover){._1y6nk17h:hover{cursor:pointer !important;color:inherit !important;text-decoration:underline !important;}}._1y6nk17h:disabled{cursor:not-allowed !important;}@media (hover: hover){._1y6nk17h:disabled:hover{text-decoration:none !important;}}._1y6nk17h:after{border:0 solid #000000 !important;content:"" !important;display:block !important;pointer-events:none !important;position:absolute !important;left:0 !important;top:0 !important;height:100% !important;width:100% !important;}._1y6nk17h:focus{color:inherit !important;text-decoration:underline !important;outline:none !important;}._1y6nk17h:focus::-moz-focus-inner{border:none !important;padding:0px !important;margin:0px !important;}._1y6nk17h:focus:focus::-moz-focus-inner{border:none !important;}._1y6nk17h:focus:-moz-focusring{outline:none !important;}._1y6nk17h:focus:after{border-width:2px !important;}._10qud2i{-webkit-box-lines:multiple !important;-webkit-box-pack:start !important;-ms-flex-pack:start !important;-webkit-box-align:stretch !important;-ms-flex-align:stretch !important;display:-webkit-box !important;display:-moz-box !important;display:-ms-flexbox !important;display:-webkit-flex !important;display:flex !important;-webkit-align-items:stretch !important;align-items:stretch !important;-webkit-justify-content:flex-start !important;justify-content:flex-start !important;-webkit-flex-wrap:wrap !important;-ms-flex-wrap:wrap !important;flex-wrap:wrap !important;width:100% !important;padding-left:var(--linaria-theme_spacing-micro24px) !important;padding-right:var(--linaria-theme_spacing-micro24px) !important;margin-left:auto !important;margin-right:auto !important;}@media (min-width: 375px){._10qud2i{padding-left:var(--linaria-theme_spacing-micro24px) !important;padding-right:var(--linaria-theme_spacing-micro24px) !important;}}@media (min-width: 744px){._10qud2i{padding-left:var(--linaria-theme_spacing-macro40px) !important;padding-right:var(--linaria-theme_spacing-macro40px) !important;}}@media (min-width: 950px){._10qud2i{padding-left:var(--linaria-theme_spacing-macro40px) !important;padding-right:var(--linaria-theme_spacing-macro40px) !important;}}@media (min-width: 1128px){._10qud2i{padding-left:var(--linaria-theme_spacing-macro80px) !important;padding-right:var(--linaria-theme_spacing-macro80px) !important;max-width:var(--gp-bounded-column-container-max-width, 1280px) !important;}}@media (min-width: 1440px){._10qud2i{max-width:var(--gp-bounded-column-container-max-width, 1280px) !important;padding-left:var(--linaria-theme_spacing-macro80px) !important;padding-right:var(--linaria-theme_spacing-macro80px) !important;}}@media print{._10qud2i{max-width:100% !important;padding-left:0 !important;padding-right:0 !important;}}._16e70jgn{position:relative !important;width:58.333333333333336% !important;margin-left:0% !important;margin-right:0% !important;}._1s21a6e2{position:relative !important;width:33.33333333333333% !important;margin-left:8.333333333333332% !important;margin-right:0% !important;}._mubbvpq{position:-webkit-sticky !important;position:sticky !important;top:var(--navigation-bar-offset, 80px) !important;z-index:1 !important;width:100% !important;display:inline-block !important;padding-right:1px !important;}._1uqdgrn{height:32px !important;margin-bottom:16px !important;margin-top:48px !important;width:128px !important;}._y0sism{height:48px !important;width:100% !important;}
</style>
<style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:'lucida grande', tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_dialog_advanced{border-radius:8px;padding:10px}.fb_dialog_content{background:#fff;color:#373737}.fb_dialog_close_icon{background:url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{left:5px;right:auto;top:5px}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{height:100%;left:0;margin:0;overflow:visible;position:absolute;top:-10000px;transform:none;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{background:none;height:auto;min-height:initial;min-width:initial;width:auto}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{clear:both;color:#fff;display:block;font-size:18px;padding-top:20px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .4);bottom:0;left:0;min-height:100%;position:absolute;right:0;top:0;width:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_mobile .fb_dialog_iframe{position:sticky;top:0}.fb_dialog_content .dialog_header{background:linear-gradient(from(#738aba), to(#2c4987));border-bottom:1px solid;border-color:#043b87;box-shadow:white 0 1px 1px -1px inset;color:#fff;font:bold 14px Helvetica, sans-serif;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:linear-gradient(from(#4267B2), to(#2a4887));background-clip:padding-box;border:1px solid #29487d;border-radius:3px;display:inline-block;line-height:18px;margin-top:3px;max-width:85px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{background:none;border:none;color:#fff;font:bold 12px Helvetica, sans-serif;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #4a4a4a;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f5f6f7;border:1px solid #4a4a4a;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-position:50% 50%;background-repeat:no-repeat;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}
.fb_mpn_mobile_landing_page_slide_out{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_out_from_left{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out_from_left;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_up{animation-duration:500ms;animation-name:fb_mpn_landing_page_slide_up;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_in{animation-duration:300ms;animation-name:fb_mpn_bounce_in;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out{animation-duration:300ms;animation-name:fb_mpn_bounce_out;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out_v2{animation-duration:300ms;animation-name:fb_mpn_fade_out;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_v2{animation-duration:300ms;animation-name:fb_bounce_in_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_from_left{animation-duration:300ms;animation-name:fb_bounce_in_from_left;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_v2{animation-duration:300ms;animation-name:fb_bounce_out_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_from_left{animation-duration:300ms;animation-name:fb_bounce_out_from_left;transition-timing-function:ease-in}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}@keyframes fb_mpn_landing_page_slide_out{0%{margin:0 12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;margin:0 24px;width:60px}}@keyframes fb_mpn_landing_page_slide_out_from_left{0%{left:12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;left:12px;width:60px}}@keyframes fb_mpn_landing_page_slide_up{0%{bottom:0;opacity:0}100%{bottom:24px;opacity:1}}@keyframes fb_mpn_bounce_in{0%{opacity:.5;top:100%}100%{opacity:1;top:0}}@keyframes fb_mpn_fade_out{0%{bottom:30px;opacity:1}100%{bottom:0;opacity:0}}@keyframes fb_mpn_bounce_out{0%{opacity:1;top:0}100%{opacity:.5;top:100%}}@keyframes fb_bounce_in_v2{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}50%{transform:scale(1.03, 1.03);transform-origin:bottom right}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}}@keyframes fb_bounce_in_from_left{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}50%{transform:scale(1.03, 1.03);transform-origin:bottom left}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}}@keyframes fb_bounce_out_v2{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}}@keyframes fb_bounce_out_from_left{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}}@keyframes slideInFromBottom{0%{opacity:.1;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}@keyframes slideInFromBottomDelay{0%{opacity:0;transform:translateY(100%)}97%{opacity:0;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}
</style>
<style type="text/css" id="google-map-pegmman-button-customizer">
.gm-svpc { box-shadow : 0px 6px 16px rgba(0, 0, 0, 0.12) !important; display : inline-flex !important; background : rgb(255, 255, 255) !important; border-radius : 8px !important; top : 13px !important; right : -26px !important; left : inherit !important; }
</style>

<style>
@media (min-width: 744px) {
._88xxct {
display: block !important;
}
}
@media (min-width: 744px) {
._1a6d9c4 {
padding-left: var(--gp-padding-mediumAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
}
}
@media (min-width: 375px) {
._1a6d9c4 {
padding-left: var(--gp-padding-smallAndAbove, 24px) !important;
padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
}
}
@media (min-width: 744px) {
._1e9g34tc {
padding-bottom: 0px !important;
}
}
._1e9g34tc {
padding-top: 24px !important;
padding-bottom: 16px !important;
}
._1qdp1ym {
-webkit-box-pack: justify !important;
-webkit-box-align: end !important;
align-items: flex-end !important;
display: flex !important;
justify-content: space-between !important;
}
@supports (--custom: properties) {
._1xxgv6l {
font-size: var(--dls19-pdp-listing-title-size, 26) !important;
line-height: var(--dls19-pdp-listing-title-line-height, 30px) !important;
font-weight: var(--dls19-pdp-listing-title-weight, 600) !important;
}
}
._1xxgv6l {
font-size: 1.625rem !important;
line-height: 1.875rem !important;
font-weight: 600 !important;
word-break: break-word !important;
}@media (min-width: 744px) {
._88xxct {
display: block !important;
}
}
._88xxct {
display: none !important;
}
._y4w03w {
height: 28px !important;
}
._1jdtwz4 {
-webkit-box-pack: end !important;
display: flex !important;
justify-content: flex-end !important;
}
._c2acbp {
margin-right: 20px !important;
}
._5kaapu {
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
}
._14tkmhr {
margin-right: 8px !important;
}
._5kaapu {
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
}
._14tkmhr {
margin-right: 8px !important;
}
</style>
<style data-aphrodite="true" id="aphrodite" type="text/css">
._1r60w8 {
color: #222222 !important;
font-family: Cereal,Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
--gp-section-compact-padding: 32px !important;
--gp-section-compact-padding-condensed: 16px !important;
--gp-section-standard-padding: 48px !important;
--gp-section-standard-padding-condensed: 24px !important;
}

._1k81gub {
position: relative !important;
}

@supports (height: 1dvh) {
    ._1k81gub {
    min-height: 34dvh !important;
}
}

@supports not (height: 1dvh) {
._1k81gub {
min-height:-webkit-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
min-height: -moz-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
min-height: calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
}
}

._siy8gh {
display: none !important;
}

@media (min-width: 744px) {
._siy8gh {
display:block !important;
}
}

._vuzcgs {
-webkit-box-pack: end !important;
-ms-flex-pack: end !important;
-webkit-box-align: center !important;
-ms-flex-align: center !important;
position: relative !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-align-items: center !important;
align-items: center !important;
-webkit-justify-content: flex-end !important;
justify-content: flex-end !important;
height: 80px !important;
}

._176ugpa {
-webkit-box-pack: end !important;
-ms-flex-pack: end !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-flex: auto !important;
-ms-flex: 1 1 auto !important;
flex: auto !important;
-webkit-justify-content: flex-end !important;
justify-content: flex-end !important;
margin-right: 8px !important;
}

._pvfq6t {
position: relative !important;
display: inline-block !important;
vertical-align: middle !important;
margin-top: auto !important;
margin-bottom: auto !important;
}

._z5mecy {
-webkit-box-align: center !important;
-ms-flex-align: center !important;
-webkit-align-items: center !important;
align-items: center !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
height: 18px !important;
position: relative !important;
z-index: 1 !important;
}

._167wsvl {
display: inline !important;
position: relative !important;
}

._88xxct {
display: none !important;
}

@media print {
._88xxct {
display: block !important;
}
}

@media (min-width: 744px) {
._88xxct {
display:block !important;
}
}

._1a6d9c4 {
-webkit-box-lines: multiple !important;
-webkit-box-pack: start !important;
-ms-flex-pack: start !important;
-webkit-box-align: stretch !important;
-ms-flex-align: stretch !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-align-items: stretch !important;
align-items: stretch !important;
-webkit-justify-content: flex-start !important;
justify-content: flex-start !important;
-webkit-flex-wrap: wrap !important;
-ms-flex-wrap: wrap !important;
flex-wrap: wrap !important;
width: 100% !important;
padding-left: var(--gp-padding-xsmallAndAbove, 24px) !important;
padding-right: var(--gp-padding-xsmallAndAbove, 24px) !important;
margin-left: 0px !important;
margin-right: 0px !important;
}

@media (min-width: 375px) {
._1a6d9c4 {
padding-left:var(--gp-padding-smallAndAbove, 24px) !important;
padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
}
}

@media (min-width: 744px) {
._1a6d9c4 {
padding-left:var(--gp-padding-mediumAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
}
}

@media (min-width: 950px) {
._1a6d9c4 {
padding-left:var(--gp-padding-mediumPlusAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
}
}

@media (min-width: 1128px) {
._1a6d9c4 {
padding-left:var(--gp-padding-largeAndAbove, 80px) !important;
padding-right: var(--gp-padding-largeAndAbove, 80px) !important;
}
}

@media (min-width: 1440px) {
._1a6d9c4 {
max-width:none !important;
padding-left: var(--gp-padding-xlargeAndAbove, 80px) !important;
padding-right: var(--gp-padding-xlargeAndAbove, 80px) !important;
}
}

@media print {
._1a6d9c4 {
max-width: 100% !important;
padding-left: 0 !important;
padding-right: 0 !important;
}
}

._1e9g34tc {
padding-top: 24px !important;
padding-bottom: 16px !important;
}

@media (min-width: 744px) {
._1e9g34tc {
padding-bottom:0px !important;
}
}

._1875dx {
padding-bottom: 16px !important;
}

@media (min-width: 744px) {
._1875dx {
padding-bottom:0px !important;
}
}

._5ltqju {
height: 100% !important;
width: 50% !important;
left: 0px !important;
top: 0px !important;
position: absolute !important;
}

._13sj9hk {
height: 100% !important;
width: 100% !important;
max-height: -webkit-calc(100vh - 144px) !important;
max-height: -moz-calc(100vh - 144px) !important;
max-height: calc(100vh - 144px) !important;
min-height: 300px !important;
}

@media (min-height: 700px) {
._13sj9hk {
max-height:-webkit-calc(60vh - 64px) !important;
max-height: -moz-calc(60vh - 64px) !important;
max-height: calc(60vh - 64px) !important;
}
}

@media (min-width: 1128px) {
._13sj9hk {
max-height:-webkit-calc(60vh - 64px) !important;
max-height: -moz-calc(60vh - 64px) !important;
max-height: calc(60vh - 64px) !important;
}
}

._178t1g5 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-flex-direction: column !important;
-ms-flex-direction: column !important;
flex-direction: column !important;
height: 100% !important;
width: 25% !important;
padding-left: 8px !important;
left: 50% !important;
top: 0px !important;
position: absolute !important;
}

._1l7oqbd {
height: 100% !important;
}

@media (min-height: 450px) {
._1l7oqbd {
height:50% !important;
}
}

._924zz4g {
display: none !important;
height: 50% !important;
padding-top: 8px !important;
}

@media (min-height: 450px) {
._924zz4g {
height:50% !important;
display: block !important;
}
}

._1827gf2 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-flex-direction: column !important;
-ms-flex-direction: column !important;
flex-direction: column !important;
height: 100% !important;
width: 25% !important;
padding-left: 8px !important;
right: 0px !important;
top: 0px !important;
position: absolute !important;
}

._z80d2i {
overflow-y: hidden !important;
}

@media (min-width: 744px) {
._z80d2i {
border-radius:20px !important;
}
}

._mqdoygn {
overflow-y: hidden !important;
/* max-height: -webkit-calc(100vh - 144px) !important; */
/* max-height: -moz-calc(100vh - 144px) !important; */
/* max-height: calc(100vh - 144px) !important; */
position: relative !important;
min-height: 300px !important;
height: 100% !important;
}

@media (min-height: 700px) {
._mqdoygn {
max-height:-webkit-calc(60vh - 64px) !important;
max-height: -moz-calc(60vh - 64px) !important;
max-height: calc(60vh - 64px) !important;
}
}
._1r60w8 {
color: #222222 !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
--gp-section-compact-padding: 32px !important;
--gp-section-compact-padding-condensed: 16px !important;
--gp-section-standard-padding: 48px !important;
--gp-section-standard-padding-condensed: 24px !important;
}

._e7hn5 {
display: block !important;
position: relative !important;
}
._1t82b7sc {
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
line-height: inherit !important;
color: inherit !important;
text-decoration: underline !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
display: block !important;
height: 100% !important;
position: relative !important;
width: 100% !important;
-webkit-tap-highlight-color: transparent !important;
outline: none !important;
border-radius: 50% !important;
}
._1c81x67 {
background: rgb(221, 221, 221) !important;
overflow: hidden !important;
position: relative !important;
}
._1t82b7sc::after {
border: 0px solid rgb(0, 0, 0) !important;
content: "" !important;
display: block !important;
pointer-events: none !important;
position: absolute !important;
left: 0px !important;
top: 0px !important;
height: 100% !important;
width: 100% !important;
border-radius: 50% !important;
}
.atm_92_1yyfdc7_9in345::after {
content: '';
}
.atm_9s_1txwivl_9in345::after {
display: flex;
}
*, *::before, *::after {
box-sizing: border-box;
-ms-flex: 0 1 auto;
}
*, *:before, *:after {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
-ms-flex: 0 1 auto;
}
._npr0qi {
border-top-width: 1px !important;
border-top-style: solid !important;
}
._npr0qi {
border-top-width: 1px !important;
border-top-style: solid !important;
}
._1r60w8 {
color: #222222 !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
--gp-section-compact-padding: 32px !important;
--gp-section-compact-padding-condensed: 16px !important;
--gp-section-standard-padding: 48px !important;
--gp-section-standard-padding-condensed: 24px !important;
}
@media (min-width: 744px) {
._wlu9uw {
gap: 24px !important;
}
}
._wlu9uw {
display: flex !important;
gap: 16px !important;
}
._1wiczqm {
-webkit-box-pack: center !important;
flex-shrink: 0 !important;
width: 40px !important;
display: flex !important;
justify-content: center !important;
}
._lz7v9 {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
margin-bottom: 4px !important;
}
._1s21a6e2 {
position: relative !important;
width: 33.33333333333333% !important;
margin-left: 8.333333333333332% !important;
margin-right: 0% !important;
}
._mubbvpq {
position: -webkit-sticky !important;
position: sticky !important;
top: var(--navigation-bar-offset, 80px) !important;
z-index: 1 !important;
width: 100% !important;
display: inline-block !important;
padding-right: 1px !important;
}
._crg2uc {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
}
.image-item1 {
    width: 100%;
    object-fit: cover;
    height: 284px !important;
}
._wgmchy {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
display: flex !important;
flex-direction: column !important;
}
._1k1ce2w {
-webkit-box-align: baseline !important;
-webkit-box-pack: justify !important;
-webkit-box-direction: normal !important;
-webkit-box-orient: horizontal !important;
display: flex !important;
flex-flow: wrap !important;
justify-content: space-between !important;
align-items: baseline !important;
margin-bottom: 24px !important;
column-gap: 8px !important;
}
._ati8ih {
-webkit-box-align: flex-start !important;
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
display: flex !important;
flex-direction: column !important;
align-items: flex-start !important;
}
._14y1gc {
font-size: 1.375rem !important;
line-height: 1.625rem !important;
overflow: var(--pricing-guest-primary-line-overflow, initial) !important;
white-space: var(--pricing-guest-primary-line-white-space, inherit) !important;
}
._1jo4hgw {
-webkit-box-pack: var(--pricing-guest-display-price-alignment, flex-start) !important;
-webkit-box-align: baseline !important;
align-items: baseline !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
font-weight: 400 !important;
justify-content: var(--pricing-guest-display-price-alignment, flex-start) !important;
flex-wrap: var(--pricing-guest-display-price-flex-wrap, wrap) !important;
}
._1l85cgq {
color: rgb(106, 106, 106) !important;
text-decoration: line-through !important;
font-weight: var(--pricing-guest-primary-line-strikethrough-price-font-weight, 600) !important;
}
._1y74zjx {
color: rgb(34, 34, 34) !important;
font-weight: var(--pricing-guest-primary-line-unit-price-font-weight, 800) !important;
}
._ni9jsr {
color: rgb(34, 34, 34) !important;
font-weight: 400 !important;
font-size: var(--pricing-guest-primary-line-qualifier-font-size, 0.875rem) !important;
line-height: var(--pricing-guest-primary-line-qualifier-line-height, 1.125rem) !important;
}
._p03egf {
margin-bottom: 16px !important;
}
.atm_mk_h2mmj6 {
position: relative;
}
.atm_9s_1txwivl {
display: flex;
}
._zdxht7 {
width: 100% !important;
}._16l1qv1 {
position: relative !important;
display: flex !important;
width: 100% !important;
margin: 0px !important;
border: none transparent !important;
color: black !important;
background-color: transparent !important;
border-radius: 0px !important;
box-shadow: none !important;
cursor: pointer !important;
padding: 0px !important;
text-align: left !important;
}
._19y8o0j {
position: relative !important;
flex: 1 1 0% !important;
padding: 0px !important;
overflow: hidden !important;
}._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}
._tekaj0 {
min-height: 56px !important;
width: 100% !important;
border: none !important;
outline: none !important;
margin: 0px !important;
padding: 26px 12px 10px !important;
background-color: transparent !important;
color: inherit !important;
font-family: inherit !important;
font-size: 0.875rem !important;
font-weight: inherit !important;
line-height: 1.125rem !important;
appearance: none !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}
._48vms8s {
position: relative !important;
flex: 1 1 0% !important;
padding: 0px !important;
overflow: hidden !important;
border-left: 1px solid rgb(176, 176, 176) !important;
}
._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}

._tekaj0 {
min-height: 56px !important;
width: 100% !important;
border: none !important;
outline: none !important;
margin: 0px !important;
padding: 26px 12px 10px !important;
background-color: transparent !important;
color: inherit !important;
font-family: inherit !important;
font-size: 0.875rem !important;
font-weight: inherit !important;
line-height: 1.125rem !important;
appearance: none !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}
._1wvvj01 {
position: relative !important;
display: flex !important;
width: 100% !important;
margin: 0px !important;
border: none transparent !important;
color: var(--linaria-theme_palette-text-primary) !important;
background-color: transparent !important;
border-radius: 0px !important;
box-shadow: none !important;
font-family: var(--linaria-theme_typography-font-family-cereal-font-family) !important;
font-size: var(--linaria-theme_typography-base-large16px-font-size) !important;
line-height: var(--linaria-theme_typography-base-large16px-line-height) !important;
letter-spacing: var(--linaria-theme_typography-base-large16px-letter-spacing) !important;
font-weight: var(--linaria-theme_typography-weight-book400) !important;
outline: 0px !important;
}

._13kgb0p {
position: relative !important;
flex: 1 1 auto !important;
padding: 0px !important;
width: 100% !important;
overflow: hidden !important;
}
._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}
._7pspom {
min-height: 56px !important;
width: 100% !important;
border: none !important;
outline: none !important;
margin: 0px !important;
padding: 26px 36px 10px 12px !important;
background-color: transparent !important;
color: inherit !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
appearance: none !important;
cursor: pointer !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: normal !important;
}
._1e5z145 {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
}
._j1kt73 {
white-space: nowrap !important;
}
._qjsg98 {
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
position: absolute !important;
right: 0px !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
height: 100% !important;
max-width: 50% !important;
min-width: 36px !important;
padding-right: 12px !important;
pointer-events: none !important;
color: var(--linaria-theme_palette-text-primary) !important;
}
.atm_9s_1txwivl {
display: flex;
}._bp34sw {
position: relative !important;
width: 100% !important;
}
._go9n13 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-align: center !important;
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
align-items: center !important;
display: flex !important;
flex-direction: column !important;
list-style-type: none !important;
margin: 8px 0px 0px !important;
padding: 0px !important;
text-align: center !important;
}
._qqc9rm {
margin-top: 8px !important;
white-space: normal !important;
}
._1cvivhm {
margin-top: 24px !important;
}
._m495dq {
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
font-weight: 400 !important;
white-space: normal !important;
}
._1kqz0lj:first-child {
padding-top: 0px !important;
}
._1kqz0lj {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(106, 106, 106) !important;
font-weight: 400 !important;
padding-top: 16px !important;
}
._tr4owt:first-child {
padding-top: 0px !important;
}
._tr4owt {
-webkit-box-pack: justify !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
font-weight: 400 !important;
padding-top: 16px !important;
display: flex !important;
flex-wrap: nowrap !important;
justify-content: space-between !important;
}
._18x3iiu {
order: 1 !important;
}
._10d7v0r {
display: inline-flex !important;
position: relative !important;
}
._12wl7g09 {
font-size: inherit !important;
font-family: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
line-height: inherit !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
color: rgb(106, 106, 106) !important;
text-decoration: underline 1px !important;
border-radius: 4px !important;
font-weight: 400 !important;
outline: none !important;
}

._1k4xcdh {
order: 2 !important;
white-space: nowrap !important;
}
._tr4owt {
-webkit-box-pack: justify !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
font-weight: 400 !important;
padding-top: 16px !important;
display: flex !important;
flex-wrap: nowrap !important;
justify-content: space-between !important;
}
._1wuq8gie {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(106, 106, 106) !important;
font-weight: 400 !important;
border-top: 1px solid rgb(221, 221, 221) !important;
margin-top: 24px !important;
padding-top: 24px !important;
}
._3u0me7:first-child {
padding-top: 0px !important;
}
._3u0me7 {
-webkit-box-pack: justify !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
font-weight: 600 !important;
padding-top: 16px !important;
display: flex !important;
flex-wrap: nowrap !important;
justify-content: space-between !important;
}
._18x3iiu {
order: 1 !important;
}
._1qs94rc {
-webkit-box-align: baseline !important;
order: 2 !important;
align-items: baseline !important;
display: flex !important;
}

._j1kt73 {
white-space: nowrap !important;
}._1xbshc6 {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
display: flex !important;
gap: 16px !important;
animation-name: keyframe_1b8bzh6 !important;
animation-duration: 300ms !important;
}
@media (min-width: 744px) {
._wbvmo0 {
background-size: 32px !important;
height: 32px !important;
width: 32px !important;
margin: 0px !important;
}
}
._wbvmo0 {
background-color: rgb(255, 255, 255) !important;
background-position: left top !important;
background-repeat: no-repeat !important;
border-radius: 50% !important;
display: inline-block !important;
flex-shrink: 0 !important;
background-size: 36px !important;
height: 36px !important;
width: 36px !important;
margin: 2px !important;
}
._1sifw {
-webkit-box-pack: center !important;
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-align: start !important;
min-height: 40px !important;
display: flex !important;
align-items: flex-start !important;
flex-direction: column !important;
justify-content: center !important;
}
._psmgei {
display: inline-block !important;
width: 100% !important;
}
._1icb58yb {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
margin-bottom: 0px !important;
margin-right: 8px !important;
display: inline !important;
}
._18nkwp9 {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(106, 106, 106) !important;
margin-top: 4px !important;
}._1iebf75 {
color: var(--parsed-html-color, #222222) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
margin-bottom: 16px !important;
}
._npr0qi {
border-top-width: 1px !important;
border-top-style: solid !important;
}
@media (min-width: 950px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 744px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 375px) {
._19xnuo97 {
padding-left: 6px !important;
padding-right: 6px !important;
}
}
._19xnuo97 {
position: relative !important;
width: 100% !important;
margin-left: 0% !important;
margin-right: 0% !important;
padding-left: 6px !important;
padding-right: 6px !important;
}
._1lek07d {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
font-size: 1.375rem !important;
line-height: 1.625rem !important;
margin-bottom: 32px !important;
}._11jhslp {
margin-top: -16px !important;
margin-bottom: 48px !important;
}
._57xvvg6 {
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
font-size: 1.125rem !important;
line-height: 1.375rem !important;
margin-bottom: 0px !important;
padding-bottom: 16px !important;
padding-top: 16px !important;
}
._2f5j8p {
list-style: none !important;
margin: 0px !important;
padding: 0px !important;
}
._1wadwfl {
height: 1px !important;
background-color: rgb(221, 221, 221) !important;
}
._1lplc7 {
-webkit-box-flex: 0 !important;
flex: 0 0 72px !important;
position: sticky !important;
text-align: left !important;
top: 0px !important;
z-index: -1 !important;
}
@media (min-width: 1128px) {
._19xnuo97 {
width: 50% !important;
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 950px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 744px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 375px) {
._19xnuo97 {
padding-left: 6px !important;
padding-right: 6px !important;
}
}
._19xnuo97 {
position: relative !important;
width: 100% !important;
margin-left: 0% !important;
margin-right: 0% !important;
padding-left: 6px !important;
padding-right: 6px !important;
}

@media (min-width: 1128px) {
._19xnuo97 {
width: 50% !important;
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 950px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 744px) {
._19xnuo97 {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 375px) {
._19xnuo97 {
padding-left: 6px !important;
padding-right: 6px !important;
}
}
._19xnuo97 {
position: relative !important;
width: 100% !important;
margin-left: 0% !important;
margin-right: 0% !important;
padding-left: 6px !important;
padding-right: 6px !important;
}
@supports (overflow: clip) {
._16j7g3i {
overflow: clip !important;
}
}
._16j7g3i {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
display: -webkit-box !important;
-webkit-line-clamp: 2 !important;
-webkit-box-orient: vertical !important;
height: 2.25rem !important;
}@media (min-width: 744px) {
._sk02b4 {
overflow: visible !important;
margin-left: 0px !important;
margin-right: 0px !important;
}
}
._sk02b4 {
display: flex !important;
height: 100% !important;
overflow: hidden !important;
margin-left: -24px !important;
margin-right: -24px !important;
}

@media (min-width: 744px) {
._sk02b4 {
overflow: visible !important;
margin-left: 0px !important;
margin-right: 0px !important;
}
}
._sk02b4 {
display: flex !important;
height: 100% !important;
overflow: hidden !important;
margin-left: -24px !important;
margin-right: -24px !important;
}
@media (min-width: 744px) {
._16bq4jy {
margin-left: -24px !important;
margin-top: -12px !important;
}
}
._16bq4jy {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
position: relative !important;
display: flex !important;
flex-direction: column !important;
margin-left: auto !important;
margin-right: auto !important;
}
._g2s11rv {
position: relative !important;
text-align: left !important;
background: rgb(255, 255, 255) !important;
}
._1x76l5m3 {
position: relative !important;
margin-left: 9px !important;
}
._14676s3 {
outline: none !important;
}
._5neba7a {
position: relative !important;
z-index: 1 !important;
height: 0px !important;
}
._1foj6yps {
position: relative !important;
overflow: hidden !important;
border-radius: 3px !important;
transition: height 0.2s ease-in-out 0s !important;
}
._2hyui6e {
background: transparent !important;
text-align: left !important;
z-index: 0 !important;
position: absolute !important;
left: 9px !important;
}
._fdp53bg {
display: inline-block !important;
vertical-align: top !important;
min-height: 100% !important;
position: absolute !important;
z-index: -1 !important;
opacity: 0 !important;
pointer-events: none !important;
visibility: hidden !important;
}
._ytfarf {
background: transparent !important;
text-align: center !important;
vertical-align: top !important;
user-select: none !important;
}
._ji8coy {
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
text-align: center !important;
padding-top: 22px !important;
padding-bottom: 49px !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
}
._cvkwaj {
border-collapse: separate !important;
}
._ljh58aj {
box-sizing: border-box !important;
text-align: center !important;
position: relative !important;
cursor: default !important;
border: 0px !important;
color: rgb(34, 34, 34) !important;
padding: 0px !important;
background: rgb(255, 255, 255) !important;
}
._1e30wwz7 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
margin-left: 1px !important;
margin-right: 1px !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
flex-direction: column !important;
border-radius: 100% !important;
position: relative !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
border: 1.5px solid rgb(255, 255, 255) !important;
color: rgb(176, 176, 176) !important;
font-weight: 400 !important;
text-decoration: line-through !important;
}
._1lds9wb {
display: inline-block !important;
vertical-align: top !important;
min-height: 100% !important;
}
._ytfarf {
background: transparent !important;
text-align: center !important;
vertical-align: top !important;
user-select: none !important;
}
._ji8coy {
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
text-align: center !important;
padding-top: 22px !important;
padding-bottom: 49px !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
}
._18307s1u {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
margin-left: 1px !important;
margin-right: 1px !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
flex-direction: column !important;
border-radius: 100% !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
font-weight: 600 !important;
background: rgb(34, 34, 34) !important;
border: 1.5px solid rgb(34, 34, 34) !important;
color: rgb(255, 255, 255) !important;
position: relative !important;
}
@media (min-width: 744px) {
._rut4we {
padding-left: 34px !important;
padding-right: 34px !important;
}
}
._rut4we {
-webkit-box-align: center !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: center !important;
padding-left: 26px !important;
}
._swrqca {
font-size: 0.75rem !important;
line-height: 1rem !important;
color: rgb(106, 106, 106) !important;
}
._1sl8tba {
-webkit-box-align: center !important;
padding-left: 8px !important;
display: flex !important;
align-items: center !important;
flex: 0 0 auto !important;
z-index: 1 !important;
}
@media (min-width: 1128px) {
._1a6d9c4 {
padding-left: var(--gp-padding-largeAndAbove, 80px) !important;
padding-right: var(--gp-padding-largeAndAbove, 80px) !important;
}
}
@media (min-width: 950px) {
._1a6d9c4 {
padding-left: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
}
}
@media (min-width: 744px) {
._1a6d9c4 {
padding-left: var(--gp-padding-mediumAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
}
}
@media (min-width: 375px) {
._1a6d9c4 {
padding-left: var(--gp-padding-smallAndAbove, 24px) !important;
padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
}
}
._1a6d9c4 {
-webkit-box-lines: multiple !important;
-webkit-box-pack: start !important;
-ms-flex-pack: start !important;
-webkit-box-align: stretch !important;
-ms-flex-align: stretch !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-align-items: stretch !important;
align-items: stretch !important;
-webkit-justify-content: flex-start !important;
justify-content: flex-start !important;
-webkit-flex-wrap: wrap !important;
-ms-flex-wrap: wrap !important;
flex-wrap: wrap !important;
width: 100% !important;
padding-left: var(--gp-padding-xsmallAndAbove, 24px) !important;
padding-right: var(--gp-padding-xsmallAndAbove, 24px) !important;
margin-left: 0px !important;
margin-right: 0px !important;
}._npr0qi {
border-top-width: 1px !important;
border-top-style: solid !important;
}
@media (min-width: 744px) {
._88xxct {
display: block !important;
}
}
@media (min-width: 1128px) {
._b7zir4z {
width: 41.6667% !important;
margin-right: 8.33333% !important;
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 950px) {
._b7zir4z {
width: 41.6667% !important;
margin-right: 8.33333% !important;
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 744px) {
._b7zir4z {
padding-left: 8px !important;
padding-right: 8px !important;
}
}
@media (min-width: 375px) {
._b7zir4z {
padding-left: 6px !important;
padding-right: 6px !important;
}
}
._b7zir4z {
position: relative !important;
width: 100% !important;
margin-left: 0% !important;
margin-right: 0% !important;
padding-left: 6px !important;
padding-right: 6px !important;
}
.row {
display: flex;
flex-direction: row;
justify-content: space-between; /* or space-around, center, etc. */
align-items: center; /* or start, end, etc. */
margin: 10px 0; /* Add margins for spacing */
padding: 10px; /* Add padding for inner spacing */
border-radius: 5px; /* Rounded corners */
}
@media (min-width: 1128px) {
._ar9stc {
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
}
}
@media (min-width: 1128px) {
._pd8gea {
text-align: left !important;
}
}
@media (min-width: 744px) {
._pd8gea {
text-align: center !important;
}
}
@media (min-width: 1128px) {
._1fx0lfx {
overflow: hidden !important;
padding: 4px !important;
margin: -4px !important;
}
}
@media (min-width: 1128px) {
._lldyhy {
margin-bottom: 0px !important;
}
}
._lldyhy {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
display: inline-block !important;
margin-bottom: 2px !important;
}
@media (min-width: 1128px) {
._zlfm26 {
display: inline-block !important;
}
}
@media (min-width: 1128px) {
._j8ldew {
display: inline-block !important;
}
}
._j8ldew {
display: none !important;
}
._1sbp7g1 {
display: inline-block !important;
text-align: center !important;
width: 19px !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
}

element.style {
}
@media (min-width: 744px) {
.dir.atm_h3_n7od8j__oggzyc[class][class] {
margin-top: unset;
}
}
@media (min-width: 0) {
.dir.atm_h3_yh40bf__1i7fo8i[class][class] {
margin-top: 2px;
}
}
@media (min-width: 744px) {
.atm_g3_n7od8j__oggzyc[class][class] {
line-height: unset;
}
}
@media (min-width: 0) {
.atm_g3_1ou6n1d__1i7fo8i[class][class] {
line-height: 26px;
line-height: 1.625rem;
}
}
@media (min-width: 744px) {
.atm_9s_n7od8j__oggzyc[class] {
display: unset;
}
}
@media (min-width: 0) {
.atm_9s_1o8liyq__1i7fo8i[class] {
display: inline-block;
}
}
._1p4noobx {
font-family: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
position: relative !important;
text-decoration: none !important;
color: rgb(34, 34, 34) !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
font-weight: 400 !important;
outline: none !important;
}

._1sbp7g1 {
display: inline-block !important;
text-align: center !important;
width: 19px !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
}._jro6t0 {
display: flex !important;
}
._jro6t0 {
display: flex !important;
}
._sovp2k:not(:last-child) {
margin-right: 24px !important;
}

._xmk1z0p {
-webkit-box-align: center !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
align-items: center !important;
white-space: nowrap !important;
text-decoration: none !important;
outline: none !important;
}
._xmk1z0p {
-webkit-box-align: center !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
align-items: center !important;
white-space: nowrap !important;
text-decoration: none !important;
outline: none !important;
}
._115qwnm {
list-style: none !important;
margin: 0px !important;
padding: 0px !important;
display: flex !important;
}
._1xbvnt9:not(:last-child) {
margin-right: 16px !important;
}

._j7hlqym {
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
line-height: inherit !important;
display: block !important;
width: fit-content !important;
color: rgb(34, 34, 34) !important;
text-decoration: none !important;
outline: none !important;
}._1xbvnt9:not(:last-child) {
margin-right: 16px !important;
}
._j7hlqym {
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
line-height: inherit !important;
display: block !important;
width: fit-content !important;
color: rgb(34, 34, 34) !important;
text-decoration: none !important;
outline: none !important;
}
._jro6t0 {
display: flex !important;
}
._jro6t0 {
display: flex !important;
}
._sovp2k:not(:last-child) {
margin-right: 24px !important;
}
._xmk1z0p {
-webkit-box-align: center !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
align-items: center !important;
white-space: nowrap !important;
text-decoration: none !important;
outline: none !important;
}
._xmk1z0p {
-webkit-box-align: center !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
appearance: none !important;
background: transparent !important;
border: 0px !important;
cursor: pointer !important;
margin: 0px !important;
padding: 0px !important;
user-select: auto !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
align-items: center !important;
white-space: nowrap !important;
text-decoration: none !important;
outline: none !important;
}
._3qymq {
margin-left: 24px !important;
}
._115qwnm {
list-style: none !important;
margin: 0px !important;
padding: 0px !important;
display: flex !important;
}
._1xbvnt9:not(:last-child) {
margin-right: 16px !important;
}
._j7hlqym {
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
font-style: inherit !important;
font-variant: inherit !important;
line-height: inherit !important;
display: block !important;
width: fit-content !important;
color: rgb(34, 34, 34) !important;
text-decoration: none !important;
outline: none !important;
}
@media (min-width: 744px) {
._1f22edh {
height: var(--navigation-bar-offset, 80px) !important;
}
}
._1f22edh {
box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 0px !important;
background-color: rgb(255, 255, 255) !important;
position: fixed !important;
left: 0px !important;
right: 0px !important;
top: 0px !important;
z-index: 3 !important;
width: calc(100% - var(--scrollbar-gutter, 0%)) !important;
animation-name: keyframe_1b8bzh6 !important;
animation-duration: 100ms !important;
}
@media (min-width: 1128px) {
._1a6d9c4 {
padding-left: var(--gp-padding-largeAndAbove, 80px) !important;
padding-right: var(--gp-padding-largeAndAbove, 80px) !important;
}
}

@media (min-width: 950px) {
._1a6d9c4 {
padding-left: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
}
}
@media (min-width: 744px) {
._1a6d9c4 {
padding-left: var(--gp-padding-mediumAndAbove, 40px) !important;
padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
}
}
@media (min-width: 375px) {
._1a6d9c4 {
padding-left: var(--gp-padding-smallAndAbove, 24px) !important;
padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
}
}
._1a6d9c4 {
-webkit-box-lines: multiple !important;
-webkit-box-pack: start !important;
-ms-flex-pack: start !important;
-webkit-box-align: stretch !important;
-ms-flex-align: stretch !important;
display: -webkit-box !important;
display: -moz-box !important;
display: -ms-flexbox !important;
display: -webkit-flex !important;
display: flex !important;
-webkit-align-items: stretch !important;
align-items: stretch !important;
-webkit-justify-content: flex-start !important;
justify-content: flex-start !important;
-webkit-flex-wrap: wrap !important;
-ms-flex-wrap: wrap !important;
flex-wrap: wrap !important;
width: 100% !important;
padding-left: var(--gp-padding-xsmallAndAbove, 24px) !important;
padding-right: var(--gp-padding-xsmallAndAbove, 24px) !important;
margin-left: 0px !important;
margin-right: 0px !important;
}
._dmn8hc {
-webkit-box-align: center !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: center !important;
}
@media (min-width: 744px) {
._ybsj8b {
white-space: nowrap !important;
overflow: hidden !important;
}
}
._ybsj8b {
color: rgb(106, 106, 106) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
font-size: 0.875rem !important;
line-height: 1.25rem !important;
}
._yauuy6 {
display: inline-block !important;
white-space: nowrap !important;
}._14f4nnk {
display: inline-block !important;
margin-right: 24px !important;
}
._11g6x33 {
color: rgb(34, 34, 34) !important;
font-weight: 600 !important;
padding: 30px 0px !important;
display: inline-block !important;
text-decoration: none !important;
position: relative !important;
}
._11g6x33::after {
background-color: rgb(34, 34, 34) !important;
content: "" !important;
display: block !important;
bottom: 0px !important;
height: 4px !important;
opacity: 0 !important;
position: absolute !important;
transition: opacity 0.15s ease 0s !important;
width: 100% !important;
}
._14f4nnk {
display: inline-block !important;
margin-right: 24px !important;
}

._11g6x33 {
color: rgb(34, 34, 34) !important;
font-weight: 600 !important;
padding: 30px 0px !important;
display: inline-block !important;
text-decoration: none !important;
position: relative !important;
}._11g6x33::after {
background-color: rgb(34, 34, 34) !important;
content: "" !important;
display: block !important;
bottom: 0px !important;
height: 4px !important;
opacity: 0 !important;
position: absolute !important;
transition: opacity 0.15s ease 0s !important;
width: 100% !important;
}
._14f4nnk {
display: inline-block !important;
margin-right: 24px !important;
}
._e296pg {
position: relative !important;
}
._xkkzkj {
-webkit-box-align: center !important;
align-items: center !important;
display: flex !important;
position: absolute !important;
right: 0px !important;
transform: translateY(-50%) !important;
background-color: rgb(255, 255, 255) !important;
}
._14ukjft {
display: none !important;
white-space: nowrap !important;
}
._ps3vih {
-webkit-box-align: center !important;
color: rgb(34, 34, 34) !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
font-size: 1rem !important;
line-height: 1.25rem !important;
display: flex !important;
align-items: center !important;
}
._ixddx0 {
-webkit-box-pack: center !important;
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-align: start !important;
align-items: flex-start !important;
display: flex !important;
flex-direction: column !important;
justify-content: center !important;
margin-right: 16px !important;
}
._ati8ih {
-webkit-box-align: var(--pricing-guest-display-price-alignment, flex-start) !important;
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
display: flex !important;
flex-direction: column !important;
align-items: var(--pricing-guest-display-price-alignment, flex-start) !important;
}
._14y1gc {
font-size: var(--pricing-guest-primary-line-font-size, 16px) !important;
line-height: var(--pricing-guest-primary-line-line-height, 20px) !important;
overflow: var(--pricing-guest-primary-line-overflow, initial) !important;
white-space: var(--pricing-guest-primary-line-white-space, inherit) !important;
}
._1jo4hgw {
-webkit-box-pack: var(--pricing-guest-display-price-alignment, flex-start) !important;
-webkit-box-align: baseline !important;
align-items: baseline !important;
color: rgb(34, 34, 34) !important;
display: flex !important;
font-weight: 400 !important;
justify-content: var(--pricing-guest-display-price-alignment, flex-start) !important;
flex-wrap: var(--pricing-guest-display-price-flex-wrap, wrap) !important;
}
._1l85cgq {
color: rgb(106, 106, 106) !important;
text-decoration: line-through !important;
font-weight: var(--pricing-guest-primary-line-strikethrough-price-font-weight, 600) !important;
}
._1y74zjx {
color: rgb(34, 34, 34) !important;
font-weight: var(--pricing-guest-primary-line-unit-price-font-weight, 800) !important;
}
._1y74zjx {
color: rgb(34, 34, 34) !important;
font-weight: var(--pricing-guest-primary-line-unit-price-font-weight, 800) !important;
}
._176k0ns {
margin-top: 4px !important;
}
._19wll60c {
-webkit-box-align: baseline !important;
align-items: baseline !important;
display: flex !important;
font-size: 0.75rem !important;
line-height: 1rem !important;
}._y10azs {
margin-left: 4px !important;
}
._17qqrnq {
color: rgb(106, 106, 106) !important;
font-weight: 600 !important;
text-decoration: underline !important;
padding-left: 0px !important;
}
._1m3wf7g {
flex-shrink: 0 !important;
min-width: 148px !important;
}
._13ah4vr {
background: rgb(255, 255, 255) !important;
border-radius: 16px !important;
box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 20px !important;
display: inline-block !important;
padding: 24px 32px 16px !important;
position: absolute !important;
top: -24px !important;
right: -32px !important;
width: 661px !important;
z-index: 1 !important;
min-height: 460px !important;
}
._1aa8ytq {
-webkit-box-align: start !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: flex-start !important;
padding-bottom: 16px !important;
white-space: nowrap;
}
.month {
    padding: 10px;
    margin-top: -9px;
    border-top: 1px solid #ccc;
}#monthSelectionContainer {
    position: relative;
    margin-top: 10px;
}

#month-dropdown {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    appearance: none;
    background-color: white;
}

.close-button2 {
    position: absolute;
    top: -38px;
    right: 10px;
    cursor: pointer;
    display: inline-block;
}
.close-button2 svg {
    height: 12px;
    width: 12px;
    stroke: currentcolor;
    stroke-width: 4;
}

#month-dropdown {
    width: 100%;
    padding: 6px;
    margin-top: -12px;
}
.month1{

    position: absolute !important;
    top: 53px !important;
    left: 9px !important;
    right: 12px !important;
    margin: 0px !important;
    padding: 0px !important;
    pointer-events: none !important;
    font-size: 0.625rem !important;
    line-height: 0.75rem !important;
    color: rgb(34, 34, 34) !important;
    text-transform: uppercase !important;
    font-weight: 800 !important;
    max-width: 100% !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;


}
/* . */
._1yw7hpv {
position: relative !important;
flex: 1 1 0% !important;
padding: 0px !important;
}
._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}

._18kjxjb1 {
display: flex !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
opacity: 1 !important;
}
._1xh2232u {
width: 100% !important;
border: none !important;
outline: none !important;
padding: 0px !important;
margin: 26px 12px 6px !important;
color: inherit !important;
background-color: transparent !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
appearance: none !important;
text-overflow: ellipsis !important;
}
._129y4gf {
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
max-width: 50% !important;
min-width: 36px !important;
overflow: visible !important;
white-space: nowrap !important;
padding-left: 0px !important;
padding-right: 12px !important;
}
._1tx8jlr {
position: relative !important;
cursor: text !important;
display: flex !important;
min-height: 56px !important;
width: 100% !important;
margin: 0px !important;
border: none transparent !important;
color: var(--linaria-theme_palette-text-primary) !important;
background-color: transparent !important;
border-radius: var(--linaria-theme_corner-radius-small8px-border-radius) !important;
box-shadow: none !important;
font-family: var(--linaria-theme_typography-font-family-cereal-font-family) !important;
font-size: var(--linaria-theme_typography-base-large16px-font-size) !important;
line-height: var(--linaria-theme_typography-base-large16px-line-height) !important;
letter-spacing: var(--linaria-theme_typography-base-large16px-letter-spacing) !important;
font-weight: var(--linaria-theme_typography-weight-book400) !important;
transition: box-shadow 150ms var(--linaria-theme_motion-enter-curve--webkit-animation-timing-function), box-shadow 150ms var(--linaria-theme_motion-enter-curve--webkit-animation-timing-function), box-shadow 150ms var(--linaria-theme_motion-enter-curve-animation-timing-function) !important;
flex: 1 1 0% !important;
}
._1yw7hpv {
position: relative !important;
flex: 1 1 0% !important;
padding: 0px !important;
}
._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}
._18kjxjb1 {
display: flex !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
opacity: 1 !important;
}
._1xh2232u {
width: 100% !important;
border: none !important;
outline: none !important;
padding: 0px !important;
margin: 26px 12px 6px !important;
color: inherit !important;
background-color: transparent !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
appearance: none !important;
text-overflow: ellipsis !important;
}
._129y4gf {
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
max-width: 50% !important;
min-width: 36px !important;
overflow: visible !important;
white-space: nowrap !important;
padding-left: 0px !important;
padding-right: 12px !important;
}._18x3iiu {
order: 1 !important;
}
@supports (overflow: clip) {
._16j7g3i {
overflow: clip !important;
}
}
._16j7g3i {
font-size: 0.875rem !important;
line-height: 1.125rem !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
display: -webkit-box !important;
-webkit-line-clamp: 2 !important;
-webkit-box-orient: vertical !important;
height: 2.25rem !important;
}
@media (min-width: 744px) {
._1v2vhdve {
overflow: visible !important;
margin-right: 0px !important;
margin-left: -8px !important;
}
}
._1v2vhdve {
display: flex !important;
height: 100% !important;
overflow: hidden !important;
margin-left: -24px !important;
margin-right: -24px !important;
}
@media (min-width: 744px) {
._16bq4jy {
margin-left: -24px !important;
margin-top: -12px !important;
}
}
._16bq4jy {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
position: relative !important;
display: flex !important;
flex-direction: column !important;
margin-left: auto !important;
margin-right: auto !important;
}
._g2s11rv {
position: relative !important;
text-align: left !important;
background: rgb(255, 255, 255) !important;
}
._1x76l5m3 {
position: relative !important;
margin-left: 9px !important;
}
._2cafln {
color: rgb(34, 34, 34) !important;
position: absolute !important;
top: 62px !important;
text-align: left !important;
}
._1wt1to6 {
list-style: none !important;
margin: 1px 0px !important;
padding-left: 0px !important;
padding-right: 0px !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
}
@media (min-width: 744px) {
._1g3qfxe {
margin-bottom: 0px !important;
}
}
._1g3qfxe {
display: inline-block !important;
text-align: center !important;
font-size: 0.75rem !important;
line-height: 1rem !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
color: rgb(106, 106, 106) !important;
margin-bottom: 6px !important;
}
._2cafln {
color: rgb(34, 34, 34) !important;
position: absolute !important;
top: 62px !important;
text-align: left !important;
}
._1wt1to6 {
list-style: none !important;
margin: 1px 0px !important;
padding-left: 0px !important;
padding-right: 0px !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
}
._14676s3 {
outline: none !important;
}
._5neba7a {
position: relative !important;
z-index: 1 !important;
height: 0px !important;
}
._1d1qzab {
position: absolute !important;
bottom: -43px !important;
left: 37px !important;
}
._qz9x4fc {
position: absolute !important;
bottom: -43px !important;
right: 37px !important;
}
._1foj6yps {
position: relative !important;
overflow: hidden !important;
border-radius: 3px !important;
}
._2hyui6e {
background: transparent !important;
text-align: left !important;
z-index: 0 !important;
position: absolute !important;
left: 9px !important;
}
._fdp53bg {
display: inline-block !important;
vertical-align: top !important;
min-height: 100% !important;
position: absolute !important;
z-index: -1 !important;
opacity: 0 !important;
pointer-events: none !important;
visibility: hidden !important;
}
._ytfarf {
background: transparent !important;
text-align: center !important;
vertical-align: top !important;
user-select: none !important;
}
._ji8coy {
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
text-align: center !important;
padding-top: 22px !important;
padding-bottom: 49px !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
}
._cvkwaj {
border-collapse: separate !important;
}
._ljh58aj {
box-sizing: border-box !important;
text-align: center !important;
position: relative !important;
cursor: default !important;
border: 0px !important;
color: rgb(34, 34, 34) !important;
padding: 0px !important;
background: rgb(255, 255, 255) !important;
}
._1e30wwz7 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
margin-left: 1px !important;
margin-right: 1px !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
flex-direction: column !important;
border-radius: 100% !important;
position: relative !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
border: 1.5px solid rgb(255, 255, 255) !important;
color: rgb(176, 176, 176) !important;
font-weight: 400 !important;
text-decoration: line-through !important;
}
._xj7hjth {
box-sizing: border-box !important;
text-align: center !important;
position: relative !important;
cursor: default !important;
border: 0px !important;
color: rgb(34, 34, 34) !important;
padding: 0px !important;
background: rgb(255, 255, 255) !important;
}
._7fcxeo5 {
-webkit-box-direction: normal !important;
-webkit-box-orient: vertical !important;
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
margin-left: 1px !important;
margin-right: 1px !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
flex-direction: column !important;
border-radius: 100% !important;
position: relative !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
border: 1.5px solid rgb(255, 255, 255) !important;
color: rgb(176, 176, 176) !important;
font-weight: 400 !important;
text-decoration: line-through !important;
}
._1lds9wb {
display: inline-block !important;
vertical-align: top !important;
min-height: 100% !important;
}
._ytfarf {
background: transparent !important;
text-align: center !important;
vertical-align: top !important;
user-select: none !important;
}
._ji8coy {
font-size: 1rem !important;
line-height: 1.25rem !important;
color: rgb(34, 34, 34) !important;
text-align: center !important;
padding-top: 22px !important;
padding-bottom: 49px !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 600 !important;
}._cvkwaj {
border-collapse: separate !important;
}
@media (min-width: 744px) {
._rut4we {
padding-left: 34px !important;
padding-right: 34px !important;
}
}
._rut4we {
-webkit-box-align: center !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: center !important;
padding-left: 26px !important;
}
._swrqca {
font-size: 0.75rem !important;
line-height: 1rem !important;
color: rgb(106, 106, 106) !important;
margin-left:-5%;
}
._1sl8tba {
-webkit-box-align: center !important;
padding-left: 8px !important;
display: flex !important;
align-items: center !important;
flex: 0 0 auto !important;
z-index: 1 !important;
}
._sbaj1v {
margin-left: 16px !important;
}
._13ah4vr {
background: rgb(255, 255, 255) !important;
border-radius: 16px !important;
box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 20px !important;
display: inline-block !important;
padding: 24px 32px 16px !important;
position: absolute !important;
top: -24px !important;
right: -32px !important;
width: 661px !important;
z-index: 1 !important;
min-height: 460px !important;
}._1aa8ytq {
-webkit-box-align: start !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: flex-start !important;
padding-bottom: 16px !important;
}
._enjuap {
-webkit-box-flex: 0 !important;
order: 2 !important;
/*flex: 0 0 calc(-90.6667px + 41.6667vw) !important;*/
margin-left: 24px !important;
min-width: 270px !important;
display: block !important;
}
._6e5x1y {
display: flex !important;
border-radius: 8px !important;
box-shadow: rgb(176, 176, 176) 0px 0px 0px 1px inset !important;
}._1ie8utng {
position: relative !important;
cursor: text !important;
display: flex !important;
min-height: 56px !important;
width: 100% !important;
margin: 0px !important;
border: none transparent !important;
color: var(--linaria-theme_palette-text-primary) !important;
border-radius: var(--linaria-theme_corner-radius-small8px-border-radius) !important;
font-family: var(--linaria-theme_typography-font-family-cereal-font-family) !important;
font-size: var(--linaria-theme_typography-base-large16px-font-size) !important;
line-height: var(--linaria-theme_typography-base-large16px-line-height) !important;
letter-spacing: var(--linaria-theme_typography-base-large16px-letter-spacing) !important;
font-weight: var(--linaria-theme_typography-weight-book400) !important;
transition: box-shadow 150ms var(--linaria-theme_motion-enter-curve--webkit-animation-timing-function), box-shadow 150ms var(--linaria-theme_motion-enter-curve--webkit-animation-timing-function), box-shadow 150ms var(--linaria-theme_motion-enter-curve-animation-timing-function) !important;
flex: 1 1 0% !important;
outline: none !important;
box-shadow: inset 0 0 0 2px var(--linaria-theme_palette-border-primary) !important;
background-color: rgb(255, 255, 255) !important;
}
._1yw7hpv {
position: relative !important;
flex: 1 1 0% !important;
padding: 0px !important;
}
._w149nr {
position: absolute !important;
top: 12px !important;
left: 12px !important;
right: 12px !important;
margin: 0px !important;
padding: 0px !important;
pointer-events: none !important;
font-size: 0.625rem !important;
line-height: 0.75rem !important;
color: rgb(34, 34, 34) !important;
text-transform: uppercase !important;
font-weight: 800 !important;
max-width: 100% !important;
overflow: hidden !important;
text-overflow: ellipsis !important;
white-space: nowrap !important;
}._18kjxjb1 {
display: flex !important;
font-size: 0.875rem !important;
line-height: 1.125rem !important;
color: rgb(34, 34, 34) !important;
opacity: 1 !important;
}
._1xh2232u {
width: 100% !important;
border: none !important;
outline: none !important;
padding: 0px !important;
margin: 26px 12px 6px !important;
color: inherit !important;
background-color: transparent !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
appearance: none !important;
text-overflow: ellipsis !important;
}._129y4gf {
-webkit-box-pack: center !important;
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
justify-content: center !important;
max-width: 50% !important;
min-width: 36px !important;
overflow: visible !important;
white-space: nowrap !important;
padding-left: 0px !important;
padding-right: 12px !important;
}

._1aa8ytq {
-webkit-box-align: start !important;
-webkit-box-pack: justify !important;
display: flex !important;
justify-content: space-between !important;
align-items: flex-start !important;
padding-bottom: 16px !important;
}@media (min-width: 1128px) {
._enjuap {
flex-basis: calc(-112px + 33.3333vw) !important;
}
}
@media (min-width: 950px) {
._enjuap {
flex-basis: calc(-85.3333px + 33.3333vw) !important;
}
}
._6e5x1y {
display: flex !important;
border-radius: 8px !important;
box-shadow: rgb(176, 176, 176) 0px 0px 0px 1px inset !important;
-webkit-box-flex: 0 !important;
float: right;
/*margin-left:4rem;*/
}
@media (min-width: 1440px) {
._enjuap {
flex-basis: 315px !important;
}
}

@media (min-width: 1128px) {
._enjuap {
flex-basis: calc(-112px + 33.3333vw) !important;
}
}
@media (min-width: 950px) {
._enjuap {
flex-basis: calc(-85.3333px + 33.3333vw) !important;
}
}
._enjuap {
-webkit-box-flex: 0 !important;
order: 2 !important;
/*flex: 0 0 calc(-90.6667px + 41.6667vw) !important;*/
margin-left: 24px !important;
min-width: 270px !important;
display: block !important;
}
._i5eb9o {
font-size: 1.375rem !important;
line-height: 1.625rem !important;
color: rgb(34, 34, 34) !important;
font-weight: 600 !important;
margin-bottom: 8px !important;
}
._vvaheb {
margin-top: 8px !important;
color: rgb(34, 34, 34) !important;
font-size: 0.75rem !important;
line-height: 1rem !important;
font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
font-weight: 400 !important;
}
._k3vzc58 {
width: 100% !important;
margin-top: 16px !important;
margin-bottom: 16px !important;
font-weight: 400 !important;
font-size: 0.75rem !important;
line-height: 1rem !important;
}
._16fq9mb {
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
margin: 16px 0px !important;
}
._16fq9mb::before {
content: "" !important;
display: block !important;
width: 100% !important;
height: 1px !important;
background-color: rgb(221, 221, 221) !important;
margin-right: 16px !important;
}
._16fq9mb::after {
content: "" !important;
display: block !important;
width: 100% !important;
height: 1px !important;
background-color: rgb(221, 221, 221) !important;
margin-left: 16px !important;
}
@media (min-width: 744px) {
._88xxct {
display: block !important;
}
}
._88sa87 {
-webkit-box-pack: justify !important;
display: flex !important;
flex-wrap: wrap !important;
justify-content: space-between !important;
}
._jwti9r {
width: 100% !important;
margin-bottom: 16px !important;
}
._sgwzwu {
-webkit-box-align: center !important;
display: flex !important;
align-items: center !important;
font-weight: 600 !important;
font-size: 0.875rem !important;
}
._fvfsqm {
flex: 0 1 0% !important;
}
._bc4egv {
flex: 1 1 0% !important;
}
._fvfsqm {
flex: 0 1 0% !important;
}
.loader {
width: 23px;
height: 23px;
border: 4px solid #FFF;
border-bottom-color: transparent;
margin-top:5px;
border-radius: 50%;
display: inline-block;
box-sizing: border-box;
animation: rotation 1s linear infinite;
}

@keyframes rotation {
0% {
transform: rotate(0deg);
}
100% {
transform: rotate(360deg);
}
} 
.mobile{
	display: none;
}
.desktop{
	display: block;
}
@media only screen and (max-width: 768px) {
 .mobile{
	display: block;
}
.desktop{
	display: none;
}
}

._10yatn4o {
    bottom: 0px !important;
    left: 0px !important;
    position: fixed !important;
    right: 0px !important;
    z-index: 1999 !important;
    width: calc(100% - var(--scrollbar-gutter, 0%)) !important;
    background: white;
}

._ddc6ro {
    color: rgb(34, 34, 34) !important;
    font-family: "Airbnb Cereal VF", Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
    font-weight: 400 !important;
    font-size: 1rem !important;
    line-height: 1.25rem !important;
    padding-top: 16px !important;
    padding-bottom: 16px !important;
}


._19a1rdq {
    -webkit-box-pack: justify !important;
    -webkit-box-direction: normal !important;
    -webkit-box-orient: horizontal !important;
    -webkit-box-align: center !important;
    display: flex !important;
    align-items: center !important;
    flex-direction: row !important;
    justify-content: space-between !important;
}
._1foj6yps {
    position: relative !important;
    overflow: hidden !important;
    border-radius: 3px !important;
    transition: height 0.2s ease-in-out 0s !important;
}
._697u988 {
    -webkit-box-direction: normal !important;
    -webkit-box-orient: vertical !important;
    -webkit-box-pack: center !important;
    -webkit-box-align: center !important;
    margin-left: 1px !important;
    margin-right: 1px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-direction: column !important;
    border-radius: 100% !important;
    position: relative !important;
    font-size: 0.875rem !important;
    line-height: 1.125rem !important;
    font-weight: 500 !important;
    color: rgb(34, 34, 34) !important;
    border: 1.5px solid rgb(255, 255, 255) !important;
}
/* calender */
 /*variables*/
                                                              :root {
                                                                  --white: #fff;
                                                                  --main: #eaedf0;
                                                                  --accent: #222222;
                                                                  --accent-2: #ebedf0;
                                                              }
                                                              
                                                              /*styles*/
                                                              .container {
                                                                  display: inline-block;
                                                                  background-color: var(--white);
                                                                  border-radius: 5px;
                                                                  padding: 0 1em;
                                                                  margin-top: 2em;
                                                                  margin-right: 1em;
                                                                  position: relative;
                                                                  width: 40%;
                                                                  margin-left:-2rem;
                                                              }
                                                              
                                                              .header-display {
                                                                  display: flex;
                                                                  align-items: center;
                                                              }
                                                              
                                                              .header-display p {
                                                                  color: var(--accent);
                                                                  margin: 5px;
                                                                  font-size: 1.2rem;
                                                                  word-spacing: 0.5rem;
                                                              }
                                                              
                                                              pre {
                                                                  padding: 10px;
                                                                  margin: 0;
                                                                  cursor: pointer;
                                                                  font-size: 1.2rem;
                                                                  color: var(--accent);
                                                              }
                                                              
                                                              .days,
                                                              .week {
                                                              display: grid;
                                                              grid-template-columns: repeat(7, 1fr);
                                                              margin: auto;
                                                              padding: 0 20px;
                                                              justify-content: space-between;
                                                              }

                                                              .week div,
                                                              .days div {
                                                              display: flex;
                                                              justify-content: center;
                                                              align-items: center;
                                                              height: 3rem;
                                                              width: 3em;
/*                                                              border-radius: 15%;*/
                                                              color: rgb(106, 106, 106) ;
                                                              }

                                                              .days div:hover {
                                                              background: var(--accent-2);
                                                              color: rgb(25, 25, 201);
                                                              cursor: pointer;
                                                              }

                                                              .week div {
                                                              opacity: 0.5;
                                                              }

                                                              .current-date {
                                                              background-color: black !important;
    color: white !important;
    border-radius: 50% !important;
    /* padding: 0px 15px !important; */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 40px !important;
    height: 40px !important;
    font-weight: bold;
    font-size: 15px;

                                                              }

                                                              .selected {
                                                                  background-color: black !important;
                                                                  color: var(--white);
                                                              }
                                                              .disabled {
    text-decoration: line-through;
    pointer-events: none;
    color: #888;
}


                                                              .in-range {
                                                                  box-sizing: border-box !important;
                                                                  cursor: pointer !important;
                                                                  text-align: center !important;
                                                                  position: relative !important;
                                                                  border: 0px ;
                                                                  color: rgb(34, 34, 34) ;
                                                                
                                                                  background: rgb(247, 247, 247);
                                                              }

                                                              .display-selected {
                                                                  margin-bottom: 10px;
                                                                  padding: 20px 20px;
                                                                  text-align: center;
                                                              }

                                                             .disabled {
    color: #d3d3d3; /* Light gray color */
    pointer-events: none; /* Prevent click events */
    text-decoration: line-through; /* Optional: Line through the text */
}

                                                                
                                                              .display-selected {
                                                                  margin-bottom: 10px;
                                                                  padding: 20px 20px;
                                                                  text-align: center;
                                                              }

                                                              .calendar-container {
                                                                  display: flex;
                                                                  flex-direction: row;
                                                                  justify-content: center;
                                                                  font-size: 0.8rem;
                                                              }
.a{
    margin-bottom: -51px;
}
                                                              .nav {
    display: flex;
    justify-content: space-between;
    width: 88%;
    position: absolute;
    left: 52.5%;
    top: 24.5%;
    z-index: 999999;
    transform: translateX(-53%);
}

                                                              .days {
                                                                  transition: transform 0.1s ease-in-out, opacity 0.1s ease-in-out;
                                                                }
                                                                
                                                              .slide-left {
                                                                  transform: translateX(-10%);
                                                                  opacity: 0;
                                                              }
                                                              
                                                              .slide-right {
                                                                  transform: translateX(10%);
                                                                  opacity: 0;
                                                              }

/* ecdcalender */
</style>   <style type="text/css">
                            	._thqh2f {
    -webkit-box-pack: end !important;
    -webkit-box-align: end !important;
    align-items: flex-end !important;
    inset: 0px !important;
    display: flex !important;
    justify-content: flex-end !important;
    pointer-events: none !important;
    position: absolute !important;
}

._q7sv3m {
    font-size: 0.75rem !important;
    line-height: 1rem !important;
    background-color: rgba(34, 34, 34, 0.66) !important;
    border-radius: 4px !important;
    color: rgb(255, 255, 255) !important;
    font-weight: 500 !important;
    margin-bottom: 16px !important;
    margin-right: 12px !important;
    padding: 3px 10px !important;
}
.dir.atm_l8_idpfg4 {
    padding: 0;
}
.dir.atm_3f_idpfg4 {
    border: 0;
}
.atm_mk_stnw88 {
    position: absolute;
}
.atm_ks_zryt35 {
    overflow: clip;
}
.atm_e2_t94yts {
    height: 1px;
}
.atm_vv_1q9ccgz {
    white-space: nowrap;
}
.atm_vy_t94yts {
    width: 1px;
}
.atm_7i_ysn8ba {
    -webkit-clip-path: inset(100%);
    clip-path: inset(100%);
}
.atm_7h_hxbz6r {
    -webkit-clip: rect(0 0 0 0);
    clip: rect(0 0 0 0);
}
                            </style>   <style>
       
       .overlay {
           position: fixed;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: rgba(0, 0, 0, 0.5);
           display: none;
           justify-content: center;
           align-items: center;
       }

       .overlay.active {
           display: flex;
       }

           @keyframes slide-up {
   0% {
       transform: translateY(100%);
   }
   100% {
       transform: translateY(0);
   }
}


       .date-picker {
           width: 100%;
           background: white;
           border: 1px solid #ccc;
           border-top-left-radius: 10px;
           border-top-right-radius: 10px;
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
           overflow: hidden;
           max-height: 99vh;
           display: flex;
           flex-direction: column;
            transform: translateY(100%);
   transition: transform 0.3s ease;

               bottom: 0px !important;
   left: 0px !important;
   position: fixed !important;
   right: 0px !important;
   z-index: 1999 !important;
   width: calc(100% - var(--scrollbar-gutter, 0%)) !important;
   background: white;
       }

       .date-picker.active {
   animation: slide-up 0.3s forwards;
}

     /*  .date-picker.active {
           transform: scale(1);
       }*/

       .header {
           display: flex;
           justify-content: space-between;
           align-items: center;
           padding: 15px;
           border-bottom: 1px solid #eee;
       }

       .header .close-icon {
           font-size: 20px;
           cursor: pointer;
       }

       .header .title {
           font-size: 16px;
           font-weight: bold;
           text-align: center;
           flex-grow: 1;
       }

       .header .clear-dates {
           color: #007bff;
           cursor: pointer;
           font-size: 14px;
       }

       .subtitle {
           padding: 0 15px;
           font-size: 14px;
           color: #666;
           margin-top: -10px;
           margin-bottom: 10px;
          
       }

       .calendar-container1 {
           overflow-y: scroll;
           flex-grow: 1;
       }

       .month1 {
           padding: 0 15px;
       }

       .month1 .month-year1 {
           font-weight: bold;
           margin: 10px 0;
           text-align: center;
       }

       .calendar-header1 {
           display: flex;
           justify-content: space-between;
           padding: 0 15px;
       }


       .calendar-header1 span {
           width: 14.28%;
           text-align: center;
           font-weight: bold;
           color: #555;
       }

       .calendar1 {
           display: grid;
           grid-template-columns: repeat(7, 1fr);
           gap: 5px;
          
       }

       .calendar1 div {
           padding: 10px;
           border-radius: 50%;
           text-align: center;
           cursor: pointer;
       }

       .calendar1 .disabled {
           color: #ccc;
           cursor: not-allowed;
       }

       .calendar1 .selected {
           background-color: #000;
           color: white;
       }

       .calendar1 .range {
           background-color: #f2f2f2;
           color: black;
       }

       .footer {
           padding: 15px;
           text-align: center;
           border-top: 1px solid #eee;
           display: flex;
           justify-content: space-between;
           align-items: center;
       }

       .footer .info {
           color: #333;
       }

       .footer .rating {
           color: #555;
       }

       .footer .save-btn {
           padding: 10px;
           background-color: #ccc;
           color: white;
           border: none;
           border-radius: 5px;
           cursor: not-allowed;
       }

       .footer .save-btn.active {
           background-color: black;
           cursor: pointer;
       }

       .load-more {
           display: block;
           width: 100%;
           padding: 10px;
           background-color: white;
           color: #007bff;
           border: 1px solid #ccc;
           border-radius: 5px;
           cursor: pointer;
           text-align: center;
           margin-top: 10px;
       }

       
       
   </style><style type="text/css">
/* Adjust the button style to match the desired design */
#checkAvailabilityButton {
   background-image: var(--dls19-brand-gradient-radial, var(--linaria-theme_palette-bg-secondary-core-hover));
       background-position: calc((100 - var(--mouse-x, 0))* 1%) calc((100 - var(--mouse-y, 0))* 1%);
    --mouse-x: 11.192724921073163;
    --mouse-y: 8.359467274712836;
    background-size: 200% 200%; /* Slightly darker gradient on hover */
    border: none; /* Remove border */
    color: #ffffff; /* White text color */
    font-size: 20px; /* Match the font size */
    font-weight: bold; /* Match the font weight */
    text-align: center; /* Center the text */
    padding: 16px 22px; /* Add padding for size */
    border-radius: 8px; /* Rounded corners */
    display: inline-block; /* Inline block for proper alignment */
    cursor: pointer; /* Pointer cursor on hover */
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
    margin-left: 20px; /* Add left margin to align with text */
}

#checkAvailabilityButton:hover {
    background: linear-gradient(90deg, #FF1C68 0%, #FF385C 100%); /* Slightly darker gradient on hover */
}

/* Style for the surrounding text and rating */
.price-section {
    display: flex;
    align-items: center;
}

.price-section span {
    font-size: 14px;
    color: rgb(34, 34, 34) !important;
/*    margin-right: 10px;*/
}

.price-section .rating {
    display: flex;
    align-items: center;
}

.price-section .rating svg {
    height: 10px;
    width: 10px;
    fill: currentcolor;
    margin-right: 5px;
}

.price-section .rating .reviews {
    font-size: 14px;
    color: rgb(34, 34, 34) !important;;
}

</style>  <style>
                                                                #month-dropdown{
                                                                    /* height: 33px;
    margin-top: 27px; */
    width: 100%;
                                                                }
                                                              </style>    <style>
                    
                    .map-container {
width: 100%;
height: 500px;
margin-bottom: 20px;
}

.map-info {
font-size: 16px;
color: #333;
}

.map-info p {
margin: 10px 0;
}

.map-info a {
color: #0056b3;
text-decoration: none;
}

.gm-svpc{
       margin: -15px !important;
   margin-top: -239px !important;
}
.gmnoprint{
   margin-top: -240px !important;
   border-radius: 10px !important;
}

                 </style>
<style>
        .icon-text {
            display: flex;
            align-items: center;
        }
        .icon-text svg {
            margin-right: 5px; /* Adjust the space between the icon and the text */
        }
    </style><style type="text/css">
	._19tmv1q {
    color: rgb(34, 34, 34) !important;
    font-family: "Airbnb Cereal VF", Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
    font-weight: 500 !important;
    font-size: 1.375rem !important;
    line-height: 1.625rem !important;
    margin-bottom: 32px !important;
}
._14li9j3g {
    color: rgb(34, 34, 34) !important;
    font-family: "Airbnb Cereal VF", Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
    font-weight: 500 !important;
    font-size: 1.125rem !important;
    line-height: 1.375rem !important;
    margin-bottom: 0px !important;
    padding-bottom: 16px !important;
    padding-top: 16px !important;
}

._2f5j8p {
    list-style: none !important;
    margin: 0px !important;
    padding: 0px !important;
}
</style>
<style>
                                                          /*variables*/
                                                              :root {
                                                                  --white: #fff;
                                                                  --main: #eaedf0;
                                                                  --accent: #222222;
                                                                  --accent-2: #ebedf0;
                                                              }
                                                              
                                                              /*styles*/
                                                              .container {
                                                                  display: inline-block;
                                                                  background-color: var(--white);
                                                                  border-radius: 5px;
                                                                  padding: 0 1em;
                                                                  margin-top: 2em;
                                                                  margin-right: 1em;
                                                                  position: relative;
                                                                  width: 40%;
                                                                  margin-left:-2rem;
                                                              }
                                                              
                                                              .header-display {
                                                                  display: flex;
                                                                  align-items: center;
                                                              }
                                                              
                                                              .header-display p {
                                                                  color: var(--accent);
                                                                  margin: 5px;
                                                                  font-size: 1.2rem;
                                                                  word-spacing: 0.5rem;
                                                              }
                                                              
                                                              pre {
                                                                  padding: 10px;
                                                                  margin: 0;
                                                                  cursor: pointer;
                                                                  font-size: 1.2rem;
                                                                  color: var(--accent);
                                                              }
                                                              
                                                              .days,
                                                              .week {
                                                              display: grid;
                                                              grid-template-columns: repeat(7, 1fr);
                                                              margin: auto;
                                                              padding: 0 20px;
                                                              justify-content: space-between;
                                                              }

                                                              .week div,
                                                              .days div {
                                                              display: flex;
                                                              justify-content: center;
                                                              align-items: center;
                                                              height: 3rem;
                                                              width: 3em;
/*                                                              border-radius: 15%;*/
                                                              color: rgb(106, 106, 106) ;
                                                              }

                                                              .days div:hover {
                                                              background: var(--accent-2);
                                                              color: rgb(25, 25, 201);
                                                              cursor: pointer;
                                                              }

                                                              .week div {
                                                              opacity: 0.5;
                                                              }

                                                              .current-date {
                                                              background-color: black !important;
    color: white !important;
    border-radius: 50% !important;
    /* padding: 0px 15px !important; */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 40px !important;
    height: 40px !important;
    font-weight: bold;
    font-size: 15px;

                                                              }

                                                              .selected {
                                                                  background-color: black !important;
                                                                  color: var(--white);
                                                              }
                                                              .disabled {
    text-decoration: line-through;
    pointer-events: none;
    color: #888;
}


                                                              .in-range {
                                                                  box-sizing: border-box !important;
                                                                  cursor: pointer !important;
                                                                  text-align: center !important;
                                                                  position: relative !important;
                                                                  border: 0px ;
                                                                  color: rgb(34, 34, 34) ;
                                                                
                                                                  background: rgb(247, 247, 247);
                                                              }

                                                              .display-selected {
                                                                  margin-bottom: 10px;
                                                                  padding: 20px 20px;
                                                                  text-align: center;
                                                              }

                                                             .disabled {
    color: #d3d3d3; /* Light gray color */
    pointer-events: none; /* Prevent click events */
    text-decoration: line-through; /* Optional: Line through the text */
}

                                                                
                                                              .display-selected {
                                                                  margin-bottom: 10px;
                                                                  padding: 20px 20px;
                                                                  text-align: center;
                                                              }

                                                              .calendar-container {
                                                                  display: flex;
                                                                  flex-direction: row;
                                                                  justify-content: center;
                                                                  font-size: 0.8rem;
                                                              }

.nano{
    padding-top: 32px; padding-bottom: 24px;
}
                                                           
                                                              @media screen and (max-width: 600px) {
                                                                .nneww{
    left: 0px !important;
}    .atm_dz_1f32got[class] {
    display: inline !important;

                                                              }
                                                              .pso {
    position: fixed;
    display: flex;
    justify-content: space-between;
    top: -2px !important;
    width: 98%;
    z-index: 99999;
    align-items: center;
    background: white;
    padding: 20px 0px;
}
..atm_vv_1jtmq4{
    white-space: normal !important;
}
.dir-ltr.new {
    left: -30px !important;
}.ok    {
    top: -24px !important;
}
.hostt{
    margin-left: -8px !important;
}
.desktop2 {
    display: none !important;
}
.nano{
    padding-top: 10px !important; padding-bottom: 0px !important;
}
    ._1s21a6e2 {
        width: 86.333333% !important;

    }    
    .calendar-container {
    display: flex;
    flex-direction: column !important;
    justify-content: center;
    font-size: 15px;
}
._13ah4vr {
   
    top: -24px !important;
    right: -47px !important;
    width: 23rem !important;
 
}
.atm_fq_idpfg4 {
    left: -30px !important;
    top: -2rem !;
}
.imagenew{
    left: 47px !important;
}
.ajapm{
    margin-bottom: -122px;
}
.oper{
    margin-top: -96px;
}
.leftkr{
    margin-left: 0px !important;
}
.foteroper{
    margin-top: -96px;
}
.amenties{
    flex-wrap: wrap !important;
}
.gzon5f2  {
    margin-top: 7rem;
}
.nnn{    margin-left: -34px;}
._1aa8ytq {
    -webkit-box-align: start !important;
    -webkit-box-pack: justify !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: flex-start !important;
    padding-bottom: 16px !important;
    flex-direction: column;
}._enjuap {
    -webkit-box-flex: 0 !important;
    order: 2 !important;
    /* flex: 0 0 calc(-90.6667px + 41.6667vw) !important; */
    margin-left: 1px !important;
    min-width: 270px !important;
    display: block !important;
}
.nav {
  
    top: 21.5% !important;
  
}
.week div, .days div {
   
    font-size: 13px !important;
  
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    --bs-gutter-x: -0.5rem;
 
    margin-left: auto;
}
._rut4we {
    -webkit-box-align: center !important;
    -webkit-box-pack: justify !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding-left: 0px !important;
    padding-bottom: 2rem;
    width: 138px;
}
.dir-ltr.atm_gz_1bs0ed2[class] {
    margin-left: -114px !important;
}
.new22{
    margin-left: -5rem;
    margin-top: -84px;
}
.atm_be_1g80g66[class] {
    flex-wrap: inherit !important;
}
.atm_k4_kb7nvz_1o5j5ji {
    margin-left: -1rem !important;
}

._vd6w38n,._1vk19cb,.newfooter {
    display: none;
}
.s1l7gi0l {
    margin-top: 2px;
}

}
@media screen and (min-width: 1300px) {

    .laptop{
        display: none;
    }
}
                </style>






<!-- kyc ki css -->
