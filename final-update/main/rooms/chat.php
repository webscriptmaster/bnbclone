<?php

include '../include/global.php';


$id = $_GET['id'] ?? null;

// if(!$id) redirect('../../');
$offer = fetch_data("SELECT * FROM offers WHERE id = '$id'");


if (!$offer)
    redirect('../../');

$fetch_host = fetch_data("SELECT * FROM hosts WHERE id = '$offer[host_id]'");

$fetch_property = fetch_data("SELECT * FROM property WHERE id = '$offer[property_id]'");



?>

<head>
    <meta charset="utf-8">


    <title>chat app - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="192x192"
        href="https://a0.muscache.com/airbnb/static/icons/android-icon-192x192-c0465f9f0380893768972a31a614b670.png">
    <link rel="shortcut icon" sizes="76x76" type="image/x-icon"
        href="https://a0.muscache.com/airbnb/static/logotype_favicon-21cc8e6c6a2cca43f061d2dcabdf6e58.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans:400,500,700|Google+Sans+Text:400&amp;lang=en">
    <link type="text/css" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Google+Sans+Text:400&amp;text=%E2%86%90%E2%86%92%E2%86%91%E2%86%93&amp;lang=en">
    <style>
        .LGLeeN-keyboard-shortcuts-view {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex
        }

        .LGLeeN-keyboard-shortcuts-view table,
        .LGLeeN-keyboard-shortcuts-view tbody,
        .LGLeeN-keyboard-shortcuts-view td,
        .LGLeeN-keyboard-shortcuts-view tr {
            background: inherit;
            border: none;
            margin: 0;
            padding: 0
        }

        .LGLeeN-keyboard-shortcuts-view table {
            display: table
        }

        .LGLeeN-keyboard-shortcuts-view tr {
            display: table-row
        }

        .LGLeeN-keyboard-shortcuts-view td {
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            display: table-cell;
            color: #000;
            padding: 6px;
            vertical-align: middle;
            white-space: nowrap
        }

        .LGLeeN-keyboard-shortcuts-view td:first-child {
            text-align: end
        }

        .LGLeeN-keyboard-shortcuts-view td kbd {
            background-color: #e8eaed;
            border-radius: 2px;
            border: none;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            color: inherit;
            display: inline-block;
            font-family: Google Sans Text, Roboto, Arial, sans-serif;
            line-height: 16px;
            margin: 0 2px;
            min-height: 20px;
            min-width: 20px;
            padding: 2px 4px;
            position: relative;
            text-align: center
        }
    </style>
    <style>
        .gm-control-active>img {
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            display: none;
            left: 50%;
            pointer-events: none;
            position: absolute;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .gm-control-active>img:nth-child(1) {
            display: block
        }

        .gm-control-active:focus>img:nth-child(1),
        .gm-control-active:hover>img:nth-child(1),
        .gm-control-active:active>img:nth-child(1),
        .gm-control-active:disabled>img:nth-child(1) {
            display: none
        }

        .gm-control-active:focus>img:nth-child(2),
        .gm-control-active:hover>img:nth-child(2) {
            display: block
        }

        .gm-control-active:active>img:nth-child(3) {
            display: block
        }

        .gm-control-active:disabled>img:nth-child(4) {
            display: block
        }
    </style>
    <style>
        .gm-ui-hover-effect {
            opacity: .6
        }

        .gm-ui-hover-effect:hover {
            opacity: 1
        }

        .gm-ui-hover-effect>span {
            background-color: #000
        }

        @media (forced-colors:active),
        (prefers-contrast:more) {
            .gm-ui-hover-effect>span {
                background-color: ButtonText
            }
        }
    </style>
    <style>
        .gm-style .gm-style-cc a,
        .gm-style .gm-style-cc button,
        .gm-style .gm-style-cc span,
        .gm-style .gm-style-mtc div {
            font-size: 10px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        .gm-style .gm-style-cc a,
        .gm-style .gm-style-cc button,
        .gm-style .gm-style-cc span {
            outline-offset: 3px
        }
    </style>
    <style>
        @media print {

            .gm-style .gmnoprint,
            .gmnoprint {
                display: none
            }
        }

        @media screen {

            .gm-style .gmnoscreen,
            .gmnoscreen {
                display: none
            }
        }
    </style>
    <style>
        .gm-style-moc {
            background-color: rgba(0, 0, 0, .45);
            pointer-events: none;
            text-align: center;
            -webkit-transition: opacity ease-in-out;
            -o-transition: opacity ease-in-out;
            transition: opacity ease-in-out
        }

        .gm-style-mot {
            color: white;
            font-family: Roboto, Arial, sans-serif;
            font-size: 22px;
            margin: 0;
            position: relative;
            top: 50%;
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%)
        }
    </style>
    <style>
        .gm-style img {
            max-width: none;
        }

        .gm-style {
            font: 400 11px Roboto, Arial, sans-serif;
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="assets/client.3118b58aef.css" type="text/css" crossorigin="anonymous" media="all">
    <link rel="stylesheet" href="assets/test.css" type="text/css" crossorigin="anonymous" media="all">
    <link rel="apple-touch-icon"
        href="https://a0.muscache.com/airbnb/static/icons/apple-touch-icon-76x76-3b313d93b1b5823293524b9764352ac9.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://a0.muscache.com/airbnb/static/icons/apple-touch-icon-76x76-3b313d93b1b5823293524b9764352ac9.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="https://a0.muscache.com/airbnb/static/icons/apple-touch-icon-120x120-52b1adb4fe3a8f825fc4b143de12ea4b.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="https://a0.muscache.com/airbnb/static/icons/apple-touch-icon-152x152-7b7c6444b63d8b6ebad9dae7169e5ed6.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://a0.muscache.com/airbnb/static/icons/apple-touch-icon-180x180-bcbe0e3960cd084eb8eaf1353cf3c730.png">
    <link rel="icon" sizes="192x192"
        href="https://a0.muscache.com/airbnb/static/icons/android-icon-192x192-c0465f9f0380893768972a31a614b670.png">
    <link rel="shortcut icon" sizes="76x76" type="image/x-icon"
        href="https://a0.muscache.com/airbnb/static/logotype_favicon-21cc8e6c6a2cca43f061d2dcabdf6e58.ico">
    <link rel="mask-icon" href="https://a0.muscache.com/airbnb/static/icons/airbnb-0611901eac33ccfa5e93d793a2e21f09.svg"
        color="#FF5A5F">
    <link href="assets/dls-lite_cereal-47d27fa833e062fe3413637eb751001f.css" rel="stylesheet" type="text/css"
        media="all" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1, viewport-fit=cover" name="viewport">
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
            box-sizing: border-box;
            /* normalize box-sizing */
            /* stylelint-disable property-no-vendor-prefix */
            -ms-flex: 0 1 auto;
            /* to normalize flex */
            /* stylelint-enable property-no-vendor-prefix */
        }

        body {
            font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue,
                sans-serif;
            font-size: 0.875rem;
            /* font-size should be 16px, but there are styles that rely on "em" */
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

        ._1k81gub {
            position: relative !important;
        }

        @supports (height: 1dvh) {
            ._1k81gub {
                min-height: 100dvh !important;
            }
        }

        @supports not (height: 1dvh) {
            ._1k81gub {
                min-height: -webkit-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
                min-height: -moz-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
                min-height: calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
            }
        }

        ._siy8gh {
            display: none !important;
        }

        @media (min-width: 744px) {
            ._siy8gh {
                display: block !important;
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
                display: block !important;
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
                padding-left: var(--gp-padding-smallAndAbove, 24px) !important;
                padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
            }
        }

        @media (min-width: 744px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-mediumAndAbove, 40px) !important;
                padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
            }
        }

        @media (min-width: 950px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
                padding-right: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-largeAndAbove, 80px) !important;
                padding-right: var(--gp-padding-largeAndAbove, 80px) !important;
            }
        }

        @media (min-width: 1440px) {
            ._1a6d9c4 {
                max-width: none !important;
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
                padding-bottom: 0px !important;
            }
        }

        ._1875dx {
            padding-bottom: 16px !important;
        }

        @media (min-width: 744px) {
            ._1875dx {
                padding-bottom: 0px !important;
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
                max-height: -webkit-calc(60vh - 64px) !important;
                max-height: -moz-calc(60vh - 64px) !important;
                max-height: calc(60vh - 64px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._13sj9hk {
                max-height: -webkit-calc(60vh - 64px) !important;
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
                height: 50% !important;
            }
        }

        ._924zz4g {
            display: none !important;
            height: 50% !important;
            padding-top: 8px !important;
        }

        @media (min-height: 450px) {
            ._924zz4g {
                height: 50% !important;
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
                border-radius: 12px !important;
            }
        }

        ._mqdoygn {
            overflow-y: hidden !important;
            max-height: -webkit-calc(100vh - 144px) !important;
            max-height: -moz-calc(100vh - 144px) !important;
            max-height: calc(100vh - 144px) !important;
            position: relative !important;
            min-height: 300px !important;
            height: 100% !important;
        }

        @media (min-height: 700px) {
            ._mqdoygn {
                max-height: -webkit-calc(60vh - 64px) !important;
                max-height: -moz-calc(60vh - 64px) !important;
                max-height: calc(60vh - 64px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._mqdoygn {
                max-height: -webkit-calc(60vh - 64px) !important;
                max-height: -moz-calc(60vh - 64px) !important;
                max-height: calc(60vh - 64px) !important;
            }
        }

        ._168ht2w {
            height: 0 !important;
            min-height: 100% !important;
            min-width: 100% !important;
            position: relative !important;
            padding-top: 50% !important;
        }

        ._skzmvy {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }

        ._100fji8 {
            background-color: rgba(34, 34, 34, 0.1) !important;
            height: 100% !important;
            width: 100% !important;
        }

        ._1y6nk17h {
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            font-style: inherit !important;
            font-variant: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: underline !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            background: transparent !important;
            border: 0 !important;
            cursor: pointer !important;
            margin: 0 !important;
            padding: 0 !important;
            -webkit-user-select: auto !important;
            -moz-user-select: auto !important;
            -ms-user-select: auto !important;
            user-select: auto !important;
            display: block !important;
            height: 100% !important;
            position: relative !important;
            width: 100% !important;
            -webkit-tap-highlight-color: transparent !important;
            outline: none !important;
            text-align: left !important;
        }

        @media (hover: hover) {
            ._1y6nk17h:hover {
                cursor: pointer !important;
                color: inherit !important;
                text-decoration: underline !important;
            }
        }

        ._1y6nk17h:disabled {
            cursor: not-allowed !important;
        }

        @media (hover: hover) {
            ._1y6nk17h:disabled:hover {
                text-decoration: none !important;
            }
        }

        ._1y6nk17h:after {
            border: 0 solid #000000 !important;
            content: "" !important;
            display: block !important;
            pointer-events: none !important;
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        ._1y6nk17h:focus {
            color: inherit !important;
            text-decoration: underline !important;
            outline: none !important;
        }

        ._1y6nk17h:focus::-moz-focus-inner {
            border: none !important;
            padding: 0px !important;
            margin: 0px !important;
        }

        ._1y6nk17h:focus:focus::-moz-focus-inner {
            border: none !important;
        }

        ._1y6nk17h:focus:-moz-focusring {
            outline: none !important;
        }

        ._1y6nk17h:focus:after {
            border-width: 2px !important;
        }

        ._10qud2i {
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
            padding-left: var(--linaria-theme_spacing-micro24px) !important;
            padding-right: var(--linaria-theme_spacing-micro24px) !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        @media (min-width: 375px) {
            ._10qud2i {
                padding-left: var(--linaria-theme_spacing-micro24px) !important;
                padding-right: var(--linaria-theme_spacing-micro24px) !important;
            }
        }

        @media (min-width: 744px) {
            ._10qud2i {
                padding-left: var(--linaria-theme_spacing-macro40px) !important;
                padding-right: var(--linaria-theme_spacing-macro40px) !important;
            }
        }

        @media (min-width: 950px) {
            ._10qud2i {
                padding-left: var(--linaria-theme_spacing-macro40px) !important;
                padding-right: var(--linaria-theme_spacing-macro40px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._10qud2i {
                padding-left: var(--linaria-theme_spacing-macro80px) !important;
                padding-right: var(--linaria-theme_spacing-macro80px) !important;
                max-width: var(--gp-bounded-column-container-max-width, 1280px) !important;
            }
        }

        @media (min-width: 1440px) {
            ._10qud2i {
                max-width: var(--gp-bounded-column-container-max-width, 1280px) !important;
                padding-left: var(--linaria-theme_spacing-macro80px) !important;
                padding-right: var(--linaria-theme_spacing-macro80px) !important;
            }
        }

        @media print {
            ._10qud2i {
                max-width: 100% !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

        ._16e70jgn {
            position: relative !important;
            width: 58.333333333333336% !important;
            margin-left: 0% !important;
            margin-right: 0% !important;
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

        ._1uqdgrn {
            height: 32px !important;
            margin-bottom: 16px !important;
            margin-top: 48px !important;
            width: 128px !important;
        }

        ._y0sism {
            height: 48px !important;
            width: 100% !important;
        }
    </style>
    <meta name="robots" content="noindex, nofollow, noimageindex">
    <title><?= $fetch_property['property_name'] ?> | <?= $fetch_property['property_type'] ?> |
        <?= $fetch_property['address'] ?>
    </title>
    <style type="text/css"
        data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title>span {
            background: url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop,
        .fb_iframe_widget_fluid_desktop span,
        .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_mpn_mobile_landing_page_slide_out {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_out_from_left {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_up {
            animation-duration: 500ms;
            animation-name: fb_mpn_landing_page_slide_up;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_in {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_in;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_mpn_fade_out;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_from_left;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_invisible_flow {
            display: inherit;
            height: 0;
            overflow-x: hidden;
            width: 0
        }

        @keyframes fb_mpn_landing_page_slide_out {
            0% {
                margin: 0 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                margin: 0 24px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_out_from_left {
            0% {
                left: 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                left: 12px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_up {
            0% {
                bottom: 0;
                opacity: 0
            }

            100% {
                bottom: 24px;
                opacity: 1
            }
        }

        @keyframes fb_mpn_bounce_in {
            0% {
                opacity: .5;
                top: 100%
            }

            100% {
                opacity: 1;
                top: 0
            }
        }

        @keyframes fb_mpn_fade_out {
            0% {
                bottom: 30px;
                opacity: 1
            }

            100% {
                bottom: 0;
                opacity: 0
            }
        }

        @keyframes fb_mpn_bounce_out {
            0% {
                opacity: 1;
                top: 0
            }

            100% {
                opacity: .5;
                top: 100%
            }
        }

        @keyframes fb_bounce_in_v2 {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom right
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_in_from_left {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom left
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }
        }

        @keyframes fb_bounce_out_v2 {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_out_from_left {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }
        }

        @keyframes slideInFromBottom {
            0% {
                opacity: .1;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideInFromBottomDelay {
            0% {
                opacity: 0;
                transform: translateY(100%)
            }

            97% {
                opacity: 0;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
    <style type="text/css" id="google-map-pegmman-button-customizer">
        .gm-svpc {
            box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.12) !important;
            display: inline-flex !important;
            background: rgb(255, 255, 255) !important;
            border-radius: 8px !important;
            top: 13px !important;
            right: -26px !important;
            left: inherit !important;
        }
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
        }

        @media (min-width: 744px) {
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
            font-family: Cereal, Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif !important;
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
                min-height: 100dvh !important;
            }
        }

        @supports not (height: 1dvh) {
            ._1k81gub {
                min-height: -webkit-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
                min-height: -moz-calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
                min-height: calc(100 * var(--vh) - env(safe-area-inset-bottom, 0px)) !important;
            }
        }

        ._siy8gh {
            display: none !important;
        }

        @media (min-width: 744px) {
            ._siy8gh {
                display: block !important;
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
                display: block !important;
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
                padding-left: var(--gp-padding-smallAndAbove, 24px) !important;
                padding-right: var(--gp-padding-smallAndAbove, 24px) !important;
            }
        }

        @media (min-width: 744px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-mediumAndAbove, 40px) !important;
                padding-right: var(--gp-padding-mediumAndAbove, 40px) !important;
            }
        }

        @media (min-width: 950px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
                padding-right: var(--gp-padding-mediumPlusAndAbove, 40px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._1a6d9c4 {
                padding-left: var(--gp-padding-largeAndAbove, 80px) !important;
                padding-right: var(--gp-padding-largeAndAbove, 80px) !important;
            }
        }

        @media (min-width: 1440px) {
            ._1a6d9c4 {
                max-width: none !important;
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
                padding-bottom: 0px !important;
            }
        }

        ._1875dx {
            padding-bottom: 16px !important;
        }

        @media (min-width: 744px) {
            ._1875dx {
                padding-bottom: 0px !important;
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
                max-height: -webkit-calc(60vh - 64px) !important;
                max-height: -moz-calc(60vh - 64px) !important;
                max-height: calc(60vh - 64px) !important;
            }
        }

        @media (min-width: 1128px) {
            ._13sj9hk {
                max-height: -webkit-calc(60vh - 64px) !important;
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
                height: 50% !important;
            }
        }

        ._924zz4g {
            display: none !important;
            height: 50% !important;
            padding-top: 8px !important;
        }

        @media (min-height: 450px) {
            ._924zz4g {
                height: 50% !important;
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
                border-radius: 12px !important;
            }
        }

        ._mqdoygn {
            overflow-y: hidden !important;
            max-height: -webkit-calc(100vh - 144px) !important;
            max-height: -moz-calc(100vh - 144px) !important;
            max-height: calc(100vh - 144px) !important;
            position: relative !important;
            min-height: 300px !important;
            height: 100% !important;
        }

        @media (min-height: 700px) {
            ._mqdoygn {
                max-height: -webkit-calc(60vh - 64px) !important;
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

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            -ms-flex: 0 1 auto;
        }

        *,
        *:before,
        *:after {
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
        }

        .atm_mk_h2mmj6 {
            position: relative;
        }

        ._16l1qv1 {
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
        }

        ._bp34sw {
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
        }

        ._1xbshc6 {
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
        }

        ._1iebf75 {
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
        }

        ._11jhslp {
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
        }

        ._npr0qi {
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
    justify-content: space-between;
    align-items: center;
    margin: 4px 0px 0px 0px;
    padding: 10px;
    border-radius: 5px;
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

        element.style {}

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
        }

        ._y10azs {
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

        ._1ie8utng {
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
        }

        ._18x3iiu {
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
        }

        ._cvkwaj {
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
            margin-left: -5%;
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
        }

        ._1aa8ytq {
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
        }

        ._1ie8utng {
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

        ._1aa8ytq {
            -webkit-box-align: start !important;
            -webkit-box-pack: justify !important;
            display: flex !important;
            justify-content: space-between !important;
            align-items: flex-start !important;
            padding-bottom: 16px !important;
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
            margin-top: 5px;
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

        .mobile {
            display: none;
        }

        .desktop {
            display: block;
        }

        @media only screen and (max-width: 768px) {
            .mobile {
                display: block;
            }

            .desktop {
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
            color: rgb(106, 106, 106);
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
            border: 0px;
            color: rgb(34, 34, 34);

            background: rgb(247, 247, 247);
        }

        .display-selected {
            margin-bottom: 10px;
            padding: 20px 20px;
            text-align: center;
        }

        .disabled {
            color: #d3d3d3;
            /* Light gray color */
            pointer-events: none;
            /* Prevent click events */
            text-decoration: line-through;
            /* Optional: Line through the text */
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

        .nav {
            display: flex;
            justify-content: space-between;
            width: 85%;
            position: absolute;
            left: 47.5%;
            top: 23.5%;
            transform: translateX(-50%);
        }

        .days {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .slide-left {
            transform: translateX(-100%);
            opacity: 0;
        }

        .slide-right {
            transform: translateX(100%);
            opacity: 0;
        }
        

        /* ecdcalender */
    </style>
</head>
<style type="text/css">
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
</style>
<!-- mere csss -->
<style>
    .new1 {
        position: relative;
        border: 1px solid #ccc;
        border-radius: 20px;
        /* Rounded corners */
        padding-left: 35px;
        /* Space for the search icon */
    }

    .new2 {
        position: absolute;
        left: 202px;
        top: 23%;
        transform: translateY(-50%);
        color: #888;
    }

    #search-input {
        display: flex;
        align-items: center;
        /* Center items vertically */
    }

    #cancel-icon {
        margin-left: 10px;
        /* Space between input and cancel button */
    }
</style>

<body>
    <header
        class="c15gdd3h atm_e2_u29brm atm_fq_idpfg4 atm_vy_1osqo2v atm_wq_b4wlg atm_a2e10m_r0d14n atm_2g_1z11bz7_vmtskl atm_92_1yyfdc7_vmtskl atm_e2_1pv1u40_vmtskl atm_fq_idpfg4_vmtskl atm_k4_idpfg4_vmtskl atm_mj_glywfm_vmtskl atm_mk_stnw88_vmtskl atm_tk_idpfg4_vmtskl atm_vy_1osqo2v_vmtskl atm_wq_idpfg4_vmtskl atm_uc_19sx4ta_vmtskl atm_uc_glywfm_vmtskl_1rrf6b5 atm_tw_quts3p_9in345 atm_26_1p8m8iw_9in345 atm_92_1yyfdc7_9in345 atm_fq_idpfg4_9in345 atm_mk_stnw88_9in345 atm_tk_idpfg4_9in345 atm_vy_1osqo2v_9in345 atm_wq_idpfg4_9in345 atm_70_nhsz5a_9in345 cx8czm6 atm_e2_1osqo2v_9in345 atm_k4_kb7nvz_9in345 atm_tr_18uv5lq_9in345 atm_uc_x5qxja_9in345 c1gfe7sj atm_mk_stnw88 dir dir-ltr"
        data-reactroot="">
        <div
            class="c1y90419 atm_fc_1yb4nlp atm_h_1h6ojuz atm_9s_1txwivl atm_e2_1osqo2v atm_mk_h2mmj6 atm_vy_1osqo2v atm_wq_kb7nvz ctl0wgq atm_j3_a1as8099lt atm_lk_1ph3nq8 atm_ll_1ph3nq8 atm_gi_xjk4d9 atm_j3_s3e5vz__6ldadd atm_lk_1ph3nq8__kgj4qw atm_ll_1ph3nq8__kgj4qw atm_lk_1od0ugv__oggzyc atm_ll_1od0ugv__oggzyc atm_lk_1od0ugv__1v156lz atm_ll_1od0ugv__1v156lz atm_lk_119q328__qky54b atm_ll_119q328__qky54b atm_lk_119q328__jx8car atm_ll_119q328__jx8car dir dir-ltr">
            <div class="c1b5mviy atm_am_12336oc atm_am_1hvxjc4__1v156lz dir dir-ltr">
                <a class="c13cw3wj atm_kd_glywfm atm_h_1h6ojuz atm_9s_116y0ak atm_e2_u29brm atm_mk_h2mmj6 atm_vh_nkobfv atm_wq_kb7nvz atm_uc_fg9k26 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_5j_kitwna_vmtskl atm_6i_ftgil2_vmtskl atm_92_1yyfdc7_vmtskl atm_fq_1bs0ed2_vmtskl atm_mk_stnw88_vmtskl atm_n3_1bs0ed2_vmtskl atm_tk_ftgil2_vmtskl atm_uc_aaiy6o_9xuho3 atm_70_lgq2mu_9xuho3 atm_uc_glywfm_9xuho3_1rrf6b5 atm_uc_aaiy6o_1buez3b_1oszvuo atm_70_lgq2mu_1buez3b_1oszvuo atm_uc_glywfm_1buez3b_1o31aam cbavvlr atm_7l_r0d14n atm_7l_r0d14n_1nos8r dir dir-ltr"
                    aria-label="Airbnb Homepage" href="https://www.airbnb.com/">
                    <div class="l10sdlqs atm_9s_glywfm atm_9s_1ulexfb__qky54b dir dir-ltr">
                        <svg width="102" height="32" style="display:block">
                            <path
                                d="M29.3864 22.7101C29.2429 22.3073 29.0752 21.9176 28.9157 21.5565C28.6701 21.0011 28.4129 20.4446 28.1641 19.9067L28.1444 19.864C25.9255 15.0589 23.5439 10.1881 21.0659 5.38701L20.9607 5.18316C20.7079 4.69289 20.4466 4.18596 20.1784 3.68786C19.8604 3.0575 19.4745 2.4636 19.0276 1.91668C18.5245 1.31651 17.8956 0.833822 17.1853 0.502654C16.475 0.171486 15.7005 -9.83959e-05 14.9165 4.23317e-08C14.1325 9.84805e-05 13.3581 0.171877 12.6478 0.503224C11.9376 0.834571 11.3088 1.31742 10.8059 1.91771C10.3595 2.46476 9.97383 3.05853 9.65572 3.68858C9.38521 4.19115 9.12145 4.70278 8.8664 5.19757L8.76872 5.38696C6.29061 10.1884 3.90903 15.0592 1.69015 19.8639L1.65782 19.9338C1.41334 20.463 1.16057 21.0102 0.919073 21.5563C0.75949 21.9171 0.592009 22.3065 0.448355 22.7103C0.0369063 23.8104 -0.094204 24.9953 0.0668098 26.1585C0.237562 27.334 0.713008 28.4447 1.44606 29.3804C2.17911 30.3161 3.14434 31.0444 4.24614 31.4932C5.07835 31.8299 5.96818 32.002 6.86616 32C7.14824 31.9999 7.43008 31.9835 7.71027 31.9509C8.846 31.8062 9.94136 31.4366 10.9321 30.8639C12.2317 30.1338 13.5152 29.0638 14.9173 27.5348C16.3194 29.0638 17.6029 30.1338 18.9025 30.8639C19.8932 31.4367 20.9886 31.8062 22.1243 31.9509C22.4045 31.9835 22.6864 31.9999 22.9685 32C23.8664 32.002 24.7561 31.8299 25.5883 31.4932C26.6901 31.0444 27.6554 30.3161 28.3885 29.3804C29.1216 28.4447 29.5971 27.3341 29.7679 26.1585C29.9287 24.9952 29.7976 23.8103 29.3864 22.7101ZM14.9173 24.377C13.1816 22.1769 12.0678 20.1338 11.677 18.421C11.5169 17.7792 11.4791 17.1131 11.5656 16.4573C11.6339 15.9766 11.8105 15.5176 12.0821 15.1148C12.4163 14.6814 12.8458 14.3304 13.3374 14.0889C13.829 13.8475 14.3696 13.7219 14.9175 13.7219C15.4655 13.722 16.006 13.8476 16.4976 14.0892C16.9892 14.3307 17.4186 14.6817 17.7528 15.1151C18.0244 15.5181 18.201 15.9771 18.2693 16.4579C18.3556 17.114 18.3177 17.7803 18.1573 18.4223C17.7661 20.1349 16.6526 22.1774 14.9173 24.377ZM27.7406 25.8689C27.6212 26.6908 27.2887 27.4674 26.7762 28.1216C26.2636 28.7759 25.5887 29.2852 24.8183 29.599C24.0393 29.9111 23.1939 30.0217 22.3607 29.9205C21.4946 29.8089 20.6599 29.5239 19.9069 29.0824C18.7501 28.4325 17.5791 27.4348 16.2614 25.9712C18.3591 23.3846 19.669 21.0005 20.154 18.877C20.3723 17.984 20.4196 17.0579 20.2935 16.1475C20.1791 15.3632 19.8879 14.615 19.4419 13.9593C18.9194 13.2519 18.2378 12.6768 17.452 12.2805C16.6661 11.8842 15.798 11.6777 14.9175 11.6777C14.0371 11.6777 13.1689 11.8841 12.383 12.2803C11.5971 12.6765 10.9155 13.2515 10.393 13.9589C9.94707 14.6144 9.65591 15.3624 9.5414 16.1465C9.41524 17.0566 9.4623 17.9822 9.68011 18.8749C10.1648 20.9993 11.4748 23.384 13.5732 25.9714C12.2555 27.4348 11.0845 28.4325 9.92769 29.0825C9.17468 29.5239 8.34007 29.809 7.47395 29.9205C6.64065 30.0217 5.79525 29.9111 5.0162 29.599C4.24581 29.2852 3.57092 28.7759 3.05838 28.1217C2.54585 27.4674 2.21345 26.6908 2.09411 25.8689C1.97932 25.0334 2.07701 24.1825 2.37818 23.3946C2.49266 23.0728 2.62663 22.757 2.7926 22.3818C3.0274 21.851 3.27657 21.3115 3.51759 20.7898L3.54996 20.7197C5.75643 15.9419 8.12481 11.0982 10.5894 6.32294L10.6875 6.13283C10.9384 5.64601 11.1979 5.14267 11.4597 4.6563C11.7101 4.15501 12.0132 3.68171 12.3639 3.2444C12.6746 2.86903 13.0646 2.56681 13.5059 2.35934C13.9473 2.15186 14.4291 2.04426 14.9169 2.04422C15.4047 2.04418 15.8866 2.15171 16.3279 2.35911C16.7693 2.56651 17.1593 2.86867 17.4701 3.24399C17.821 3.68097 18.1242 4.15411 18.3744 4.65538C18.6338 5.13742 18.891 5.63623 19.1398 6.11858L19.2452 6.32315C21.7097 11.0979 24.078 15.9415 26.2847 20.7201L26.3046 20.7631C26.5498 21.2936 26.8033 21.8419 27.042 22.382C27.2082 22.7577 27.3424 23.0738 27.4566 23.3944C27.7576 24.1824 27.8553 25.0333 27.7406 25.8689Z"
                                fill="currentcolor"></path>
                            <path
                                d="M41.6847 24.1196C40.8856 24.1196 40.1505 23.9594 39.4792 23.6391C38.808 23.3188 38.2327 22.8703 37.7212 22.2937C37.2098 21.7172 36.8263 21.0445 36.5386 20.3078C36.2509 19.539 36.123 18.7062 36.123 17.8093C36.123 16.9124 36.2829 16.0475 36.5705 15.2787C36.8582 14.51 37.2737 13.8373 37.7852 13.2287C38.2966 12.6521 38.9039 12.1716 39.6071 11.8513C40.3103 11.531 41.0455 11.3708 41.8765 11.3708C42.6756 11.3708 43.3788 11.531 44.0181 11.8833C44.6574 12.2037 45.1688 12.6841 45.5843 13.2927L45.6802 11.7232H48.6209V23.7992H45.6802L45.5843 22.0375C45.1688 22.6781 44.6254 23.1906 43.9222 23.575C43.2829 23.9274 42.5158 24.1196 41.6847 24.1196ZM42.4519 21.2367C43.0272 21.2367 43.5386 21.0765 44.0181 20.7882C44.4656 20.4679 44.8172 20.0515 45.1049 19.539C45.3606 19.0265 45.4884 18.4179 45.4884 17.7452C45.4884 17.0725 45.3606 16.4639 45.1049 15.9514C44.8492 15.4389 44.4656 15.0225 44.0181 14.7022C43.5706 14.3818 43.0272 14.2537 42.4519 14.2537C41.8765 14.2537 41.3651 14.4139 40.8856 14.7022C40.4382 15.0225 40.0866 15.4389 39.7989 15.9514C39.5432 16.4639 39.4153 17.0725 39.4153 17.7452C39.4153 18.4179 39.5432 19.0265 39.7989 19.539C40.0546 20.0515 40.4382 20.4679 40.8856 20.7882C41.3651 21.0765 41.8765 21.2367 42.4519 21.2367ZM53.6392 8.4559C53.6392 8.80825 53.5753 9.12858 53.4154 9.38483C53.2556 9.64109 53.0319 9.86531 52.7442 10.0255C52.4565 10.1856 52.1369 10.2497 51.8173 10.2497C51.4976 10.2497 51.178 10.1856 50.8903 10.0255C50.6026 9.86531 50.3789 9.64109 50.2191 9.38483C50.0592 9.09654 49.9953 8.80825 49.9953 8.4559C49.9953 8.10355 50.0592 7.78323 50.2191 7.52697C50.3789 7.23868 50.6026 7.04649 50.8903 6.88633C51.178 6.72617 51.4976 6.66211 51.8173 6.66211C52.1369 6.66211 52.4565 6.72617 52.7442 6.88633C53.0319 7.04649 53.2556 7.27072 53.4154 7.52697C53.5433 7.78323 53.6392 8.07152 53.6392 8.4559ZM50.2191 23.7672V11.6911H53.4154V23.7672H50.2191V23.7672ZM61.9498 14.8623V14.8943C61.79 14.8303 61.5982 14.7982 61.4383 14.7662C61.2466 14.7342 61.0867 14.7342 60.895 14.7342C60 14.7342 59.3287 14.9904 58.8812 15.535C58.4018 16.0795 58.178 16.8483 58.178 17.8413V23.7672H54.9817V11.6911H57.9223L58.0182 13.517C58.3379 12.8763 58.7214 12.3958 59.2648 12.0435C59.7762 11.6911 60.3835 11.531 61.0867 11.531C61.3105 11.531 61.5342 11.563 61.726 11.595C61.8219 11.6271 61.8858 11.6271 61.9498 11.6591V14.8623ZM63.2283 23.7672V6.72617H66.4247V13.2287C66.8722 12.6521 67.3836 12.2036 68.0229 11.8513C68.6622 11.531 69.3654 11.3388 70.1645 11.3388C70.9635 11.3388 71.6987 11.4989 72.3699 11.8193C73.0412 12.1396 73.6165 12.588 74.128 13.1646C74.6394 13.7412 75.0229 14.4139 75.3106 15.1506C75.5983 15.9194 75.7261 16.7522 75.7261 17.6491C75.7261 18.546 75.5663 19.4109 75.2787 20.1796C74.991 20.9484 74.5755 21.6211 74.064 22.2297C73.5526 22.8063 72.9453 23.2867 72.2421 23.6071C71.5389 23.9274 70.8037 24.0875 69.9727 24.0875C69.1736 24.0875 68.4704 23.9274 67.8311 23.575C67.1918 23.2547 66.6804 22.7742 66.2649 22.1656L66.169 23.7352L63.2283 23.7672ZM69.3973 21.2367C69.9727 21.2367 70.4841 21.0765 70.9635 20.7882C71.411 20.4679 71.7626 20.0515 72.0503 19.539C72.306 19.0265 72.4339 18.4179 72.4339 17.7452C72.4339 17.0725 72.306 16.4639 72.0503 15.9514C71.7626 15.4389 71.411 15.0225 70.9635 14.7022C70.5161 14.3818 69.9727 14.2537 69.3973 14.2537C68.822 14.2537 68.3106 14.4139 67.8311 14.7022C67.3836 15.0225 67.032 15.4389 66.7443 15.9514C66.4886 16.4639 66.3608 17.0725 66.3608 17.7452C66.3608 18.4179 66.4886 19.0265 66.7443 19.539C67 20.0515 67.3836 20.4679 67.8311 20.7882C68.3106 21.0765 68.822 21.2367 69.3973 21.2367ZM76.9408 23.7672V11.6911H79.8814L79.9773 13.2607C80.3289 12.6841 80.8084 12.2357 81.4157 11.8833C82.023 11.531 82.7262 11.3708 83.5253 11.3708C84.4203 11.3708 85.1874 11.595 85.8267 12.0115C86.4979 12.4279 87.0094 13.0365 87.361 13.8053C87.7126 14.574 87.9043 15.5029 87.9043 16.56V23.7992H84.708V16.9764C84.708 16.1436 84.5162 15.4709 84.1326 14.9904C83.7491 14.51 83.2376 14.2537 82.5664 14.2537C82.0869 14.2537 81.6714 14.3498 81.2878 14.574C80.9362 14.7982 80.6486 15.0865 80.4248 15.503C80.2011 15.8873 80.1052 16.3678 80.1052 16.8483V23.7672H76.9408V23.7672ZM89.5025 23.7672V6.72617H92.6989V13.2287C93.1464 12.6521 93.6578 12.2036 94.2971 11.8513C94.9364 11.531 95.6396 11.3388 96.4387 11.3388C97.2378 11.3388 97.9729 11.4989 98.6442 11.8193C99.3154 12.1396 99.8907 12.588 100.402 13.1646C100.914 13.7412 101.297 14.4139 101.585 15.1506C101.873 15.9194 102 16.7522 102 17.6491C102 18.546 101.841 19.4109 101.553 20.1796C101.265 20.9484 100.85 21.6211 100.338 22.2297C99.8268 22.8063 99.2195 23.2867 98.5163 23.6071C97.8131 23.9274 97.0779 24.0875 96.2469 24.0875C95.4478 24.0875 94.7446 23.9274 94.1053 23.575C93.466 23.2547 92.9546 22.7742 92.5391 22.1656L92.4432 23.7352L89.5025 23.7672ZM95.7035 21.2367C96.2788 21.2367 96.7903 21.0765 97.2697 20.7882C97.7172 20.4679 98.0688 20.0515 98.3565 19.539C98.6122 19.0265 98.7401 18.4179 98.7401 17.7452C98.7401 17.0725 98.6122 16.4639 98.3565 15.9514C98.1008 15.4389 97.7172 15.0225 97.2697 14.7022C96.8222 14.3818 96.2788 14.2537 95.7035 14.2537C95.1281 14.2537 94.6167 14.4139 94.1373 14.7022C93.6898 15.0225 93.3382 15.4389 93.0505 15.9514C92.7628 16.4639 92.6669 17.0725 92.6669 17.7452C92.6669 18.4179 92.7948 19.0265 93.0505 19.539C93.3062 20.0515 93.6898 20.4679 94.1373 20.7882C94.6167 21.0765 95.0962 21.2367 95.7035 21.2367Z"
                                fill="currentcolor"></path>
                        </svg>
                    </div>
                    <div class="bpe4snb atm_9s_glywfm__qky54b dir dir-ltr">
                        <svg width="30" height="32" style="display:block">
                            <path
                                d="M29.3864 22.7101C29.2429 22.3073 29.0752 21.9176 28.9157 21.5565C28.6701 21.0011 28.4129 20.4446 28.1641 19.9067L28.1444 19.864C25.9255 15.0589 23.5439 10.1881 21.0659 5.38701L20.9607 5.18316C20.7079 4.69289 20.4466 4.18596 20.1784 3.68786C19.8604 3.0575 19.4745 2.4636 19.0276 1.91668C18.5245 1.31651 17.8956 0.833822 17.1853 0.502654C16.475 0.171486 15.7005 -9.83959e-05 14.9165 4.23317e-08C14.1325 9.84805e-05 13.3581 0.171877 12.6478 0.503224C11.9376 0.834571 11.3088 1.31742 10.8059 1.91771C10.3595 2.46476 9.97383 3.05853 9.65572 3.68858C9.38521 4.19115 9.12145 4.70278 8.8664 5.19757L8.76872 5.38696C6.29061 10.1884 3.90903 15.0592 1.69015 19.8639L1.65782 19.9338C1.41334 20.463 1.16057 21.0102 0.919073 21.5563C0.75949 21.9171 0.592009 22.3065 0.448355 22.7103C0.0369063 23.8104 -0.094204 24.9953 0.0668098 26.1585C0.237562 27.334 0.713008 28.4447 1.44606 29.3804C2.17911 30.3161 3.14434 31.0444 4.24614 31.4932C5.07835 31.8299 5.96818 32.002 6.86616 32C7.14824 31.9999 7.43008 31.9835 7.71027 31.9509C8.846 31.8062 9.94136 31.4366 10.9321 30.8639C12.2317 30.1338 13.5152 29.0638 14.9173 27.5348C16.3194 29.0638 17.6029 30.1338 18.9025 30.8639C19.8932 31.4367 20.9886 31.8062 22.1243 31.9509C22.4045 31.9835 22.6864 31.9999 22.9685 32C23.8664 32.002 24.7561 31.8299 25.5883 31.4932C26.6901 31.0444 27.6554 30.3161 28.3885 29.3804C29.1216 28.4447 29.5971 27.3341 29.7679 26.1585C29.9287 24.9952 29.7976 23.8103 29.3864 22.7101ZM14.9173 24.377C13.1816 22.1769 12.0678 20.1338 11.677 18.421C11.5169 17.7792 11.4791 17.1131 11.5656 16.4573C11.6339 15.9766 11.8105 15.5176 12.0821 15.1148C12.4163 14.6814 12.8458 14.3304 13.3374 14.0889C13.829 13.8475 14.3696 13.7219 14.9175 13.7219C15.4655 13.722 16.006 13.8476 16.4976 14.0892C16.9892 14.3307 17.4186 14.6817 17.7528 15.1151C18.0244 15.5181 18.201 15.9771 18.2693 16.4579C18.3556 17.114 18.3177 17.7803 18.1573 18.4223C17.7661 20.1349 16.6526 22.1774 14.9173 24.377ZM27.7406 25.8689C27.6212 26.6908 27.2887 27.4674 26.7762 28.1216C26.2636 28.7759 25.5887 29.2852 24.8183 29.599C24.0393 29.9111 23.1939 30.0217 22.3607 29.9205C21.4946 29.8089 20.6599 29.5239 19.9069 29.0824C18.7501 28.4325 17.5791 27.4348 16.2614 25.9712C18.3591 23.3846 19.669 21.0005 20.154 18.877C20.3723 17.984 20.4196 17.0579 20.2935 16.1475C20.1791 15.3632 19.8879 14.615 19.4419 13.9593C18.9194 13.2519 18.2378 12.6768 17.452 12.2805C16.6661 11.8842 15.798 11.6777 14.9175 11.6777C14.0371 11.6777 13.1689 11.8841 12.383 12.2803C11.5971 12.6765 10.9155 13.2515 10.393 13.9589C9.94707 14.6144 9.65591 15.3624 9.5414 16.1465C9.41524 17.0566 9.4623 17.9822 9.68011 18.8749C10.1648 20.9993 11.4748 23.384 13.5732 25.9714C12.2555 27.4348 11.0845 28.4325 9.92769 29.0825C9.17468 29.5239 8.34007 29.809 7.47395 29.9205C6.64065 30.0217 5.79525 29.9111 5.0162 29.599C4.24581 29.2852 3.57092 28.7759 3.05838 28.1217C2.54585 27.4674 2.21345 26.6908 2.09411 25.8689C1.97932 25.0334 2.07701 24.1825 2.37818 23.3946C2.49266 23.0728 2.62663 22.757 2.7926 22.3818C3.0274 21.851 3.27657 21.3115 3.51759 20.7898L3.54996 20.7197C5.75643 15.9419 8.12481 11.0982 10.5894 6.32294L10.6875 6.13283C10.9384 5.64601 11.1979 5.14267 11.4597 4.6563C11.7101 4.15501 12.0132 3.68171 12.3639 3.2444C12.6746 2.86903 13.0646 2.56681 13.5059 2.35934C13.9473 2.15186 14.4291 2.04426 14.9169 2.04422C15.4047 2.04418 15.8866 2.15171 16.3279 2.35911C16.7693 2.56651 17.1593 2.86867 17.4701 3.24399C17.821 3.68097 18.1242 4.15411 18.3744 4.65538C18.6338 5.13742 18.891 5.63623 19.1398 6.11858L19.2452 6.32315C21.7097 11.0979 24.078 15.9415 26.2847 20.7201L26.3046 20.7631C26.5498 21.2936 26.8033 21.8419 27.042 22.382C27.2082 22.7577 27.3424 23.0738 27.4566 23.3944C27.7576 24.1824 27.8553 25.0333 27.7406 25.8689Z"
                                fill="currentcolor"></path>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="cqvtwb5 atm_am_1pywi5l atm_jb_p59q1q atm_l8_vqrj7l atm_r3_1h6ojuz__1v156lz dir dir-ltr">
                <div data-searchbar-open="false"
                    class="l1sjr04j atm_9s_1o8liyq atm_vh_nkobfv atm_r3_1e5hqsa atm_gi_xjk4d9__1v156lz l1x4ovsg atm_tw_xchc94 atm_tw_1qred53__1v156lz llb1jct atm_vy_1osqo2v atm_tr_wkersm atm_vl_ewfl5b lc9d3st atm_uc_1vossl dir dir-ltr">
                    <div class="chgx2vp atm_ymjvfd_8tjzot atm_cjn97f_u29brm atm_mk_h2mmj6 atm_h_1h6ojuz atm_2d_1p8m8iw atm_3f_1vlbu9m atm_5j_1ylpe5n atm_70_3to2mm atm_7l_dezgoh atm_9s_116y0ak atm_j3_1osqo2v atm_r3_1e5hqsa atm_uc_aaiy6o atm_vh_nkobfv atm_uc_glywfm__1rrf6b5 atm_70_1p8xsmn_1nos8r dir dir-ltr"
                        data-testid="little-search" role="search" aria-labelledby="littleSearchLabel"><span
                            class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr"
                            id="littleSearchLabel">Start your search</span>
                        <span class="ieg7dag atm_j3_1osqo2v atm_9s_116y0ak atm_h_1h6ojuz dir dir-ltr">
                            <button
                                class="ffgcxut atm_1s_glywfm atm_26_1j28jx2 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_ks_ewfl5b atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_h_1h6ojuz atm_3f_okh77k atm_5j_1y44olf atm_9s_1txwivl atm_am_1pywi5l atm_e2_fyhuej atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_lk_ftgil2_n9iw0w atm_6a_1kw7nm4_n9iw0w atm_43_1kw7nm4_n9iw0w atm_6c_1kw7nm4_1eiowux atm_45_1kw7nm4_1eiowux atm_70_lgq2mu_1w3cfyq atm_70_lgq2mu_pfnrn2_1oszvuo dir dir-ltr"
                                data-index="0" data-testid="little-search-location" type="button"><span
                                    class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Location</span>
                                <div
                                    class="f16sug5q atm_c8_1cw7z3g atm_g3_qslrf5 atm_cs_9dzvea atm_l8_1mni9fk atm_sq_1l2sidv atm_vv_1q9ccgz atm_ks_15vqwwr atm_am_ggq5uc atm_jb_1xtcb10 dir dir-ltr">
                                    Anywhere</div>
                            </button><span
                                class="d242rgr atm_2d_1oqmvsg atm_am_9h6r71 atm_e2_1tcgj5g atm_vy_t94yts dir dir-ltr"></span>
                            <button
                                class="ffgcxut atm_1s_glywfm atm_26_1j28jx2 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_ks_ewfl5b atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_h_1h6ojuz atm_3f_okh77k atm_5j_1y44olf atm_9s_1txwivl atm_am_1pywi5l atm_e2_fyhuej atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_lk_ftgil2_n9iw0w atm_6a_1kw7nm4_n9iw0w atm_43_1kw7nm4_n9iw0w atm_6c_1kw7nm4_1eiowux atm_45_1kw7nm4_1eiowux atm_70_lgq2mu_1w3cfyq atm_70_lgq2mu_pfnrn2_1oszvuo dir dir-ltr"
                                data-index="1" data-testid="little-search-anytime" type="button"><span
                                    class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Check
                                    in / Check out</span>
                                <div
                                    class="f16sug5q atm_c8_1cw7z3g atm_g3_qslrf5 atm_cs_9dzvea atm_l8_1mni9fk atm_sq_1l2sidv atm_vv_1q9ccgz atm_ks_15vqwwr atm_am_ggq5uc atm_jb_1xtcb10 dir dir-ltr">
                                    Any week</div>
                            </button><span
                                class="d242rgr atm_2d_1oqmvsg atm_am_9h6r71 atm_e2_1tcgj5g atm_vy_t94yts dir dir-ltr"></span>
                            <button
                                class="ffgcxut atm_1s_glywfm atm_26_1j28jx2 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_ks_ewfl5b atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_h_1h6ojuz atm_3f_okh77k atm_5j_1y44olf atm_9s_1txwivl atm_am_1pywi5l atm_e2_fyhuej atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_lk_ftgil2_n9iw0w atm_6a_1kw7nm4_n9iw0w atm_43_1kw7nm4_n9iw0w atm_6c_1kw7nm4_1eiowux atm_45_1kw7nm4_1eiowux atm_70_lgq2mu_1w3cfyq atm_70_lgq2mu_pfnrn2_1oszvuo dir dir-ltr"
                                data-index="2" data-testid="little-search-guests" type="button"><span
                                    class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Guests</span>
                                <div
                                    class="f16sug5q atm_c8_1cw7z3g atm_g3_qslrf5 atm_l8_1mni9fk atm_sq_1l2sidv atm_vv_1q9ccgz atm_ks_15vqwwr atm_am_ggq5uc atm_jb_1xtcb10 f1m1t62k atm_7l_1esdqks atm_cs_6adqpa dir dir-ltr">
                                    Add guests</div>
                                <div class="svys41v atm_2d_r0d14n atm_5j_1ssbidh atm_7l_1p8m8iw atm_e2_1vi7ecw atm_gi_15yaty4 atm_l8_19bvopo atm_vy_1vi7ecw atm_2d_wl3mcu__6ldadd dir dir-ltr"
                                    data-testid="little-search-icon" data-icon="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                        role="presentation" focusable="false"
                                        style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333; overflow: visible;">
                                        <path fill="none" d="M13 24a11 11 0 1 0 0-22 11 11 0 0 0 0 22zm8-3 9 9"></path>
                                    </svg>
                                </div>
                            </button>
                        </span>
                        <div
                            class="f1j1034u atm_lo_1gxk9pd atm_vy_1osqo2v atm_mk_stnw88 atm_fq_1ssbidh atm_gz_qkx992 atm_mj_glywfm atm_k4_idpfg4 dir dir-ltr">
                        </div>
                    </div>
                </div>
                <div
                    class="bdypfvo atm_lk_1ph3nq8 atm_ll_1ph3nq8 atm_fq_idpfg4 atm_mk_stnw88 atm_r3_1e5hqsa atm_vy_1osqo2v atm_wq_cs5v99 atm_lk_1ph3nq8__kgj4qw atm_ll_1ph3nq8__kgj4qw atm_lk_1od0ugv__oggzyc atm_ll_1od0ugv__oggzyc atm_lk_1od0ugv__1v156lz atm_ll_1od0ugv__1v156lz atm_lk_119q328__qky54b atm_ll_119q328__qky54b atm_lk_119q328__jx8car atm_ll_119q328__jx8car bfxfvmm atm_tk_1fwpi09 atm_tw_zxe83o atm_tk_idpfg4__1v156lz atm_tw_quts3p__1v156lz b1wmkqeh atm_k4_idpfg4 atm_tr_dn759h atm_mj_glywfm atm_vl_15vqwwr atm_vz_acu4iy atm_uoiimy_15vqwwr atm_1g2dg5n_glywfm atm_tr_1if45lh__1v156lz b13hn6dm atm_uc_19sixak dir dir-ltr">
                    <div class="_1pjgueh" data-nosnippet="true">
                        <form class="f114qjlg atm_gi_xjk4d9 atm_j3_1an8f3t dir dir-ltr"
                            action="https://www.airbnb.com/s/homes" method="get" role="search">
                            <div class="t1oltn9l atm_h_1h6ojuz atm_9s_1txwivl atm_e2_u29brm atm_fc_1h6ojuz dir dir-ltr">
                                <div role="tablist" aria-label="What can we help you find?">
                                    <div
                                        class="c1qkg4ju atm_c8_2x1prs atm_g3_1jbyh58 atm_fr_11a07z3 atm_9j_tlke0l atm_9s_1o8liyq atm_cs_6adqpa atm_mj_1wugsn5 atm_mk_h2mmj6 atm_r3_1h6ojuz atm_wq_idpfg4 atm_l8_idpfg4 atm_c8_km0zk7__1v156lz atm_g3_18khvle__1v156lz atm_fr_1m9t47k__1v156lz atm_cs_9dzvea__1v156lz atm_c8_2x1prs__qky54b atm_g3_1jbyh58__qky54b atm_fr_11a07z3__qky54b atm_cs_6adqpa__qky54b atm_rd_glywfm_1nos8r atm_uc_aaiy6o_1w3cfyq atm_70_1kppo7g_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_1kppo7g_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_l8_idpfg4__qky54b ci08q1y atm_9j_73adwj_1nos8r atm_k4_kb7nvz_1nos8r dir dir-ltr">
                                        <button id="search-block-tab-false-STAYS"
                                            data-testid="header-tab-search-block-tab-false-STAYS"
                                            name="refinement_paths[]" role="tab" aria-selected="true" type="button"
                                            class="l1ovpqvx atm_1he2i46_1k8pnbi_10saat9 atm_yxpdqi_1pv6nv4_10saat9 atm_1a0hdzc_w1h1e8_10saat9 atm_2bu6ew_929bqk_10saat9 atm_12oyo1u_73u7pn_10saat9 atm_fiaz40_1etamxe_10saat9 b1isyb64 atm_9j_tlke0l atm_mk_h2mmj6 atm_70_5j5alw atm_tl_1gw4zv3 atm_9j_13gfvf7_1o5j5ji cpy18wl atm_fr_11a07z3 atm_uc_1lizyuv atm_r2_1j28jx2 atm_26_1j28jx2 atm_3f_glywfm atm_7l_1kw7nm4 atm_9s_1ulexfb atm_gi_idpfg4 atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_e2_1osqo2v atm_vy_1osqo2v atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_g3_1kw7nm4 atm_cs_1kw7nm4 atm_kd_glywfm atm_5j_t09oo2 atm_uc_glywfm__1rrf6b5 atm_kd_glywfm_1w3cfyq atm_70_1b8lkes_1w3cfyq atm_3f_glywfm_e4a3ld atm_l8_idpfg4_e4a3ld atm_gi_idpfg4_e4a3ld atm_3f_glywfm_1r4qscq atm_kd_glywfm_6y7yyg atm_kd_glywfm_pfnrn2_1oszvuo atm_70_1b8lkes_pfnrn2_1oszvuo atm_l8_idpfg4_1icshfk_1oszvuo atm_gi_idpfg4_1icshfk_1oszvuo atm_3f_glywfm_b5gff8_1oszvuo atm_kd_glywfm_2by9w9_1oszvuo atm_k4_kb7nvz_1o5j5ji atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_tr_glywfm_csw3t1 dir dir-ltr">
                                            <div
                                                class="t1763h34 atm_gi_1sxbfl9 atm_mk_h2mmj6 atm_c8_1cw7z3g atm_g3_92qb7l atm_fr_1bq7tds atm_gi_acfr1u__qky54b atm_92_1yyfdc7_1v4k0id atm_5j_qslrf5_1v4k0id atm_6i_14idwd0_1v4k0id atm_tk_14idwd0_1v4k0id atm_fq_4h84z3_1v4k0id atm_n3_4h84z3_1v4k0id atm_mk_stnw88_1v4k0id atm_wq_1mrwo0b_1v4k0id atm_7l_dezgoh_1nos8r_uv4tnr trgc5l4 atm_cs_9dzvea atm_76haju_dezgoh atm_26_n7od8j_2tuxlq_uv4tnr dir dir-ltr">
                                                <span
                                                    class="t13onqtt atm_c8_16fp2vl atm_g3_x9fz81 atm_fr_12ckmjc atm_7l_c8dnct atm_9s_116y0ak atm_ar_1bp4okc atm_7l_yn12i_1nos8r_uv4tnr atm_92_1y40vl2_9in345 atm_e2_idpfg4_9in345 atm_vl_15vqwwr_9in345 atm_ks_15vqwwr_9in345 atm_vb_glywfm_9in345 atm_mj_glywfm_9in345 atm_cs_9dzvea_9in345 atm_9s_glywfm_9in345_1pvdnhc dir dir-ltr"
                                                    data-content="Stays">Stays</span>
                                            </div>
                                        </button>
                                        <input type="hidden" name="refinement_paths[]" value="/homes">
                                    </div>
                                    <div
                                        class="c1qkg4ju atm_c8_2x1prs atm_g3_1jbyh58 atm_fr_11a07z3 atm_9j_tlke0l atm_9s_1o8liyq atm_cs_6adqpa atm_mj_1wugsn5 atm_mk_h2mmj6 atm_r3_1h6ojuz atm_wq_idpfg4 atm_l8_idpfg4 atm_c8_km0zk7__1v156lz atm_g3_18khvle__1v156lz atm_fr_1m9t47k__1v156lz atm_cs_9dzvea__1v156lz atm_c8_2x1prs__qky54b atm_g3_1jbyh58__qky54b atm_fr_11a07z3__qky54b atm_cs_6adqpa__qky54b atm_rd_glywfm_1nos8r atm_uc_aaiy6o_1w3cfyq atm_70_1kppo7g_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_1kppo7g_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_l8_idpfg4__qky54b dir dir-ltr">
                                        <button id="search-block-tab-false-EXPERIENCES"
                                            data-testid="header-tab-search-block-tab-false-EXPERIENCES"
                                            name="refinement_paths[]" role="tab" aria-selected="false" type="button"
                                            class="l1ovpqvx atm_1he2i46_1k8pnbi_10saat9 atm_yxpdqi_1pv6nv4_10saat9 atm_1a0hdzc_w1h1e8_10saat9 atm_2bu6ew_929bqk_10saat9 atm_12oyo1u_73u7pn_10saat9 atm_fiaz40_1etamxe_10saat9 b1isyb64 atm_9j_tlke0l atm_mk_h2mmj6 atm_70_5j5alw atm_tl_1gw4zv3 atm_9j_13gfvf7_1o5j5ji cpy18wl atm_fr_11a07z3 atm_uc_1lizyuv atm_r2_1j28jx2 atm_26_1j28jx2 atm_3f_glywfm atm_7l_1kw7nm4 atm_9s_1ulexfb atm_gi_idpfg4 atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_e2_1osqo2v atm_vy_1osqo2v atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_g3_1kw7nm4 atm_cs_1kw7nm4 atm_kd_glywfm atm_5j_t09oo2 atm_uc_glywfm__1rrf6b5 atm_kd_glywfm_1w3cfyq atm_70_1b8lkes_1w3cfyq atm_3f_glywfm_e4a3ld atm_l8_idpfg4_e4a3ld atm_gi_idpfg4_e4a3ld atm_3f_glywfm_1r4qscq atm_kd_glywfm_6y7yyg atm_kd_glywfm_pfnrn2_1oszvuo atm_70_1b8lkes_pfnrn2_1oszvuo atm_l8_idpfg4_1icshfk_1oszvuo atm_gi_idpfg4_1icshfk_1oszvuo atm_3f_glywfm_b5gff8_1oszvuo atm_kd_glywfm_2by9w9_1oszvuo atm_k4_kb7nvz_1o5j5ji atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_tr_glywfm_csw3t1 dir dir-ltr">
                                            <div
                                                class="t1763h34 atm_gi_1sxbfl9 atm_mk_h2mmj6 atm_c8_1cw7z3g atm_g3_92qb7l atm_fr_1bq7tds atm_cs_6adqpa atm_gi_acfr1u__qky54b atm_92_1yyfdc7_1v4k0id atm_5j_qslrf5_1v4k0id atm_6i_14idwd0_1v4k0id atm_tk_14idwd0_1v4k0id atm_fq_4h84z3_1v4k0id atm_n3_4h84z3_1v4k0id atm_mk_stnw88_1v4k0id atm_wq_1mrwo0b_1v4k0id atm_7l_dezgoh_1nos8r_uv4tnr atm_26_116dmco_2tuxlq_uv4tnr dir dir-ltr">
                                                <span
                                                    class="t13onqtt atm_c8_16fp2vl atm_g3_x9fz81 atm_fr_12ckmjc atm_7l_c8dnct atm_9s_116y0ak atm_ar_1bp4okc atm_7l_yn12i_1nos8r_uv4tnr atm_92_1y40vl2_9in345 atm_e2_idpfg4_9in345 atm_vl_15vqwwr_9in345 atm_ks_15vqwwr_9in345 atm_vb_glywfm_9in345 atm_mj_glywfm_9in345 atm_cs_9dzvea_9in345 atm_9s_glywfm_9in345_1pvdnhc dir dir-ltr"
                                                    data-content="Experiences">Experiences</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="wo5dbi6 atm_9s_1o8liyq dir dir-ltr">
                                    <a href="https://www.airbnb.com/s/experiences/online"
                                        class="l1ovpqvx atm_1he2i46_1k8pnbi_10saat9 atm_yxpdqi_1pv6nv4_10saat9 atm_1a0hdzc_w1h1e8_10saat9 atm_2bu6ew_929bqk_10saat9 atm_12oyo1u_73u7pn_10saat9 atm_fiaz40_1etamxe_10saat9 b1isyb64 atm_9j_tlke0l atm_mk_h2mmj6 atm_70_5j5alw atm_tl_1gw4zv3 atm_9j_13gfvf7_1o5j5ji cpy18wl atm_fr_11a07z3 atm_uc_1lizyuv atm_r2_1j28jx2 atm_26_1j28jx2 atm_3f_glywfm atm_7l_1kw7nm4 atm_9s_1ulexfb atm_gi_idpfg4 atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_e2_1osqo2v atm_vy_1osqo2v atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_g3_1kw7nm4 atm_cs_1kw7nm4 atm_kd_glywfm atm_5j_t09oo2 atm_uc_glywfm__1rrf6b5 atm_kd_glywfm_1w3cfyq atm_70_1b8lkes_1w3cfyq atm_3f_glywfm_e4a3ld atm_l8_idpfg4_e4a3ld atm_gi_idpfg4_e4a3ld atm_3f_glywfm_1r4qscq atm_kd_glywfm_6y7yyg atm_kd_glywfm_pfnrn2_1oszvuo atm_70_1b8lkes_pfnrn2_1oszvuo atm_l8_idpfg4_1icshfk_1oszvuo atm_gi_idpfg4_1icshfk_1oszvuo atm_3f_glywfm_b5gff8_1oszvuo atm_kd_glywfm_2by9w9_1oszvuo atm_k4_kb7nvz_1o5j5ji atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_tr_glywfm_csw3t1 dir dir-ltr">
                                        <div
                                            class="c14qz3vc atm_kd_glywfm atm_c8_2x1prs atm_g3_1jbyh58 atm_fr_11a07z3 atm_9j_tlke0l atm_9s_1o8liyq atm_cs_6adqpa atm_mj_1wugsn5 atm_mk_h2mmj6 atm_r3_1h6ojuz atm_wq_idpfg4 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_c8_km0zk7__1v156lz atm_g3_18khvle__1v156lz atm_fr_1m9t47k__1v156lz atm_cs_9dzvea__1v156lz atm_c8_2x1prs__qky54b atm_g3_1jbyh58__qky54b atm_fr_11a07z3__qky54b atm_cs_6adqpa__qky54b atm_rd_glywfm_1nos8r atm_uc_aaiy6o_1w3cfyq atm_70_1kppo7g_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_1kppo7g_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam dir dir-ltr">
                                            <div class="t1fe0agi atm_gi_1sxbfl9 atm_mk_h2mmj6 atm_c8_16fp2vl atm_g3_x9fz81 atm_fr_12ckmjc atm_7l_c8dnct atm_cs_6adqpa atm_9s_116y0ak atm_ar_1bp4okc atm_gi_acfr1u__qky54b atm_7l_dezgoh_1nos8r_uv4tnr atm_92_1y40vl2_9in345 atm_e2_idpfg4_9in345 atm_vl_15vqwwr_9in345 atm_ks_15vqwwr_9in345 atm_vb_glywfm_9in345 atm_mj_glywfm_9in345 atm_cs_9dzvea_9in345 atm_9s_glywfm_9in345_1pvdnhc atm_92_1yyfdc7_1v4k0id atm_5j_qslrf5_1v4k0id atm_6i_14idwd0_1v4k0id atm_tk_14idwd0_1v4k0id atm_fq_4h84z3_1v4k0id atm_n3_4h84z3_1v4k0id atm_mk_stnw88_1v4k0id atm_wq_1mrwo0b_1v4k0id atm_26_116dmco_2tuxlq_uv4tnr dir dir-ltr"
                                                data-content="Online Experiences">Online Experiences</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div id="search-tabpanel" role="tabpanel" tabindex="-1"
                                class="cbb5b2h atm_5j_1vi7ecw atm_7l_dezgoh atm_9s_1txwivl atm_e2_1k4yqc2 atm_mk_h2mmj6 atm_vy_1osqo2v atm_kd_glywfm atm_2d_1qf8lb3 atm_3f_1vlbu9m atm_70_i67ecm c12eo2r8 atm_u5paz6_1p8m8iw atm_mu5wzz_1s7alg2 atm_yo3zfk_1esdqks dir dir-ltr"
                                data-panel-bounds="true">
                                <div
                                    class="ir2ixub atm_9s_1txwivl atm_h_1h6ojuz atm_am_163v1yp atm_e2_1osqo2v atm_jb_idpfg4 atm_mj_1wugsn5 dir dir-ltr">
                                    <div class="_ck1x80">
                                        <div
                                            class="i1iy0ljo atm_mk_h2mmj6 atm_h_1h6ojuz atm_9s_1txwivl atm_am_qk3dho atm_gi_1n1ank9 atm_jb_idpfg4 dir dir-ltr">
                                            <label
                                                class="ihcg2em atm_9j_tlke0l atm_9s_1ulexfb atm_2a_1u8qnfj atm_3f_okh77k atm_5j_1vi7ecw atm_am_qk3dho atm_jb_idpfg4 atm_l8_2zoau0 atm_6h_1s2714j_vmtskl atm_66_nqa18y_vmtskl atm_4b_1egtlkw_vmtskl atm_5e_idpfg4_vmtskl atm_92_1yyfdc7_vmtskl atm_9s_glywfm_vmtskl atm_e2_1vi7ecw_vmtskl atm_h3_4h84z3_vmtskl atm_mk_stnw88_vmtskl atm_n3_idpfg4_vmtskl atm_tk_1ssbidh_vmtskl atm_wq_idpfg4_vmtskl atm_2a_1u8qnfj_9in345 atm_3f_okh77k_9in345 atm_5j_1vi7ecw_9in345 atm_6i_idpfg4_9in345 atm_92_1yyfdc7_9in345 atm_fq_idpfg4_9in345 atm_mk_stnw88_9in345 atm_n3_idpfg4_9in345 atm_tk_idpfg4_9in345 atm_wq_idpfg4_9in345 i1w7syu0 atm_9s_1ulexfb_1rqz0hn atm_h0_yh40bf_9bj8xt atm_2d_um1unu_9bj8xt atm_9s_1ulexfb_1jy6zas atm_2d_1p8m8iw_1joo1sn atm_4b_1p8m8iw_1joo1sn atm_70_d987b7_1joo1sn atm_fq_idpfg4_1joo1sn atm_n3_idpfg4_1joo1sn atm_h0_yh40bf_1joo1sn dir dir-ltr"
                                                for="bigsearch-query-stays_location_inspirations-input">
                                                <div class="i18libcr atm_mk_h2mmj6 atm_wq_kb7nvz dir dir-ltr">
                                                    <div
                                                        class="ikfcax3 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_9dzvea atm_le_yh40bf dir dir-ltr">
                                                        Where</div>
                                                    <input
                                                        class="i18z192n atm_9s_1ulexfb atm_3f_idpfg4 atm_gi_idpfg4 atm_l8_idpfg4 atm_vy_1osqo2v atm_26_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_9dzvea atm_7l_dezgoh atm_sq_1l2sidv atm_c8_km0zk7_17x46du atm_g3_18khvle_17x46du atm_fr_1m9t47k_17x46du atm_cs_6adqpa_17x46du atm_c8_km0zk7_y5ttn9 atm_g3_18khvle_y5ttn9 atm_fr_1m9t47k_y5ttn9 atm_cs_6adqpa_y5ttn9 atm_c8_km0zk7_1k1obal atm_g3_18khvle_1k1obal atm_fr_1m9t47k_1k1obal atm_cs_6adqpa_1k1obal atm_c8_km0zk7_m14rgb atm_g3_18khvle_m14rgb atm_fr_1m9t47k_m14rgb atm_cs_6adqpa_m14rgb atm_c8_km0zk7_3ykvna atm_g3_18khvle_3ykvna atm_fr_1m9t47k_3ykvna atm_cs_6adqpa_3ykvna atm_9s_glywfm_16s2r6p atm_kd_glywfm_pfnrn2 atm_ll_1fwxnve_c2x6ez iupdi7y atm_7l_1jsbn00_17x46du atm_7l_1jsbn00_y5ttn9 atm_7l_1jsbn00_1k1obal atm_7l_1jsbn00_m14rgb atm_7l_1jsbn00_3ykvna dir dir-ltr"
                                                        aria-autocomplete="none" autocomplete="off" autocorrect="off"
                                                        spellcheck="false"
                                                        id="bigsearch-query-stays_location_inspirations-input"
                                                        name="query" type="search"
                                                        aria-describedby="bigsearch-query-stays_location_inspirations-description"
                                                        placeholder="Search destinations"
                                                        data-testid="structured-search-input-field-query" value="">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="coy2xq9 atm_mk_stnw88 atm_tk_1osqo2v atm_26_1p8m8iw atm_5j_1vi7ecw atm_70_z3lat3 atm_gp_1fwxnve atm_iy_1xor2vp atm_l0_15vqwwr atm_l1_1wugsn5 atm_l2_1f51e7f atm_lb_4n2dxu atm_lh_swyrjs l1hvhoo atm_fq_idpfg4 hwzl8dt atm_vl_i-15vqwwr atm_mj_i-glywfm atm_k4_idpfg4 b7815u5 atm_wq_kb7nvz atm_8rg8tq_1ixj6vq atm_5sxl3l_uuw12j atm_5sxl3l_1w81w6r__1v156lz b552ge3 atm_vy_1ssbidh atm_jb_13hw3cp im0ru76 atm_anyfd1_15cdnaj atm_ypb0rd_p5ox87 dir dir-ltr"
                                            data-testid="structured-search-input-field-query-panel">
                                            <div class=" dir dir-ltr" role="radiogroup"
                                                id="locationInspirationsSectionID"
                                                aria-labelledby="locationInspirationsSectionID-DLS-chipGroup-label">
                                                <div class="c1uycpqq atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_1fw03zg atm_go_1ixj6vq atm_gy_1yuitx dir dir-ltr"
                                                    id="locationInspirationsSectionID-DLS-chipGroup-label">Search by
                                                    region</div>
                                                <div
                                                    class="dttmvf5 atm_9s_11p5wf0 atm_n5_i2wt44 atm_d7_idpfg4 atm_ks_15vqwwr atm_dz_zk4kx0 atm_e0_988hr2 dir dir-ltr">
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/f9ec8a23-ed44-420b-83e5-10ff1f071a13.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">I’m
                                                                flexible</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">I’m flexible</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/66355b01-4695-4db9-b292-c149c46fb1ca.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Middle
                                                                East</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">Middle East</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/ea5598d7-2b07-4ed7-84da-d1eabd9f2714.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Italy</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">Italy</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/4e762891-75a3-4fe1-b73a-cd7e673ba915.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">United
                                                                States</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">United States</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/09be1400-6a42-4a4f-90f6-897e50110031.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Greece</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">Greece</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="c1q1697z atm_9s_1txwivl atm_ar_1bp4okc atm_n5_1yuitx atm_l8_1y44olf atm_l8_ftgil2__oggzyc atm_5j_qe0vi4__oggzyc atm_2d_1s7alg2_1nos8r_1jiodmv dir dir-ltr">
                                                        <button
                                                            class="c1y2gkhb atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_l8_idpfg4 atm_gi_idpfg4 atm_4b_rke8ap atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_5j_kitwna atm_e2_1wugsn5 atm_ks_zryt35 atm_vy_1osqo2v atm_1w_gbua2q atm_2d_rke8ap atm_r2_1j28jx2 atm_7l_177r58q_1nos8r_uv4tnr atm_4b_lb1gtz_1nos8r_uv4tnr atm_7l_177r58q_csw3t1 atm_4b_lb1gtz_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_4b_rke8ap_1nos8r_1jiodmv atm_4b_rke8ap_csw3t1_oggzyc dir dir-ltr"
                                                            aria-pressed="false" type="button"><img
                                                                class="i123w48w atm_tl_glywfm atm_e2_1wugsn5 atm_vy_1osqo2v atm_1w_gbua2q atm_jp_1f51e7f dir dir-ltr"
                                                                alt=""
                                                                src="./assets/d77de9f5-5318-4571-88c7-e97d2355d20a.jpg">
                                                            <span
                                                                class="a8jt5op atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts dir dir-ltr">Southeast
                                                                Asia</span>
                                                        </button>
                                                        <div>
                                                            <div class="o18vo2mo atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_gw_1lkvw50 atm_ks_15vqwwr atm_sq_1l2sidv atm_vv_1q9ccgz dir dir-ltr"
                                                                aria-hidden="true">Southeast Asia</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="s1w513da atm_j_1h6ojuz atm_5q_1vlbu9m atm_am_jp9ccn atm_e2_1vi7ecw dir dir-ltr">
                                    </div>
                                    <div class="cwk1mic atm_9s_1txwivl atm_am_eqk4pz atm_jb_idpfg4 dir dir-ltr">
                                        <div
                                            class="c1ddhymz atm_am_16wc86f atm_h_1h6ojuz atm_9s_1txwivl atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_vy_10bmcub dir dir-ltr">
                                            <div class="b1spesa7 atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_9s_1ulexfb atm_am_qk3dho atm_l8_t94yts atm_r3_1e5hqsa atm_vy_idpfg4 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_6h_1s2714j_vmtskl atm_66_nqa18y_vmtskl atm_4b_1egtlkw_vmtskl atm_92_1yyfdc7_vmtskl atm_9s_glywfm_vmtskl atm_e2_1vi7ecw_vmtskl atm_fq_idpfg4_vmtskl atm_h3_4h84z3_vmtskl atm_mk_stnw88_vmtskl atm_n3_idpfg4_vmtskl atm_tk_1ssbidh_vmtskl atm_wq_idpfg4_vmtskl atm_2a_1u8qnfj_9in345 atm_3f_okh77k_9in345 atm_5j_1vi7ecw_9in345 atm_6i_idpfg4_9in345 atm_92_1yyfdc7_9in345 atm_fq_idpfg4_9in345 atm_mk_stnw88_9in345 atm_n3_idpfg4_9in345 atm_tk_idpfg4_9in345 atm_wq_idpfg4_9in345 b1fbhdca atm_9s_1ulexfb_1rqz0hn atm_gi_eflcwz_9bj8xt atm_2d_um1unu_9bj8xt atm_wq_cs5v99_1w3cfyq atm_9s_1ulexfb_9xuho3 atm_uc_aaiy6o_1tasb51 atm_4b_dezgoh_1tasb51 atm_70_1t2bbnk_1tasb51 atm_gi_eflcwz_1tasb51 atm_uc_glywfm_1tasb51_1rrf6b5 atm_wq_cs5v99_pfnrn2_1oszvuo atm_9s_1ulexfb_1buez3b_1oszvuo atm_uc_aaiy6o_1fu4lp4_1oszvuo atm_4b_dezgoh_1fu4lp4_1oszvuo atm_70_1t2bbnk_1fu4lp4_1oszvuo atm_gi_eflcwz_1fu4lp4_1oszvuo atm_uc_glywfm_1fu4lp4_1o31aam dir dir-ltr"
                                                role="button" tabindex="0" aria-expanded="false"
                                                data-testid="structured-search-input-field-split-dates-0">
                                                <div
                                                    class="cz9siyu atm_l8_srw7uq atm_ks_15vqwwr atm_mk_h2mmj6 atm_vv_1q9ccgz atm_vy_1osqo2v atm_wq_kb7nvz dir dir-ltr">
                                                    <div
                                                        class="lk4ruxu atm_c8_1uc0753 atm_g3_lonqig atm_cs_9dzvea atm_fr_idpfg4 atm_le_yh40bf dir dir-ltr">
                                                        Check in</div>
                                                    <div
                                                        class="p1m42al0 atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_6adqpa atm_ks_15vqwwr atm_sq_1l2sidv atm_vy_1osqo2v p1t4vwjw atm_7l_1jsbn00 dir dir-ltr">
                                                        Add dates</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="s1w513da atm_j_1h6ojuz atm_5q_1vlbu9m atm_am_jp9ccn atm_e2_1vi7ecw dir dir-ltr">
                                        </div>
                                        <div
                                            class="c1ddhymz atm_am_16wc86f atm_h_1h6ojuz atm_9s_1txwivl atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_vy_10bmcub dir dir-ltr">
                                            <div class="b1spesa7 atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_9s_1ulexfb atm_am_qk3dho atm_l8_t94yts atm_r3_1e5hqsa atm_vy_idpfg4 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_6h_1s2714j_vmtskl atm_66_nqa18y_vmtskl atm_4b_1egtlkw_vmtskl atm_92_1yyfdc7_vmtskl atm_9s_glywfm_vmtskl atm_e2_1vi7ecw_vmtskl atm_fq_idpfg4_vmtskl atm_h3_4h84z3_vmtskl atm_mk_stnw88_vmtskl atm_n3_idpfg4_vmtskl atm_tk_1ssbidh_vmtskl atm_wq_idpfg4_vmtskl atm_2a_1u8qnfj_9in345 atm_3f_okh77k_9in345 atm_5j_1vi7ecw_9in345 atm_6i_idpfg4_9in345 atm_92_1yyfdc7_9in345 atm_fq_idpfg4_9in345 atm_mk_stnw88_9in345 atm_n3_idpfg4_9in345 atm_tk_idpfg4_9in345 atm_wq_idpfg4_9in345 b1fbhdca atm_9s_1ulexfb_1rqz0hn atm_gi_eflcwz_9bj8xt atm_2d_um1unu_9bj8xt atm_wq_cs5v99_1w3cfyq atm_9s_1ulexfb_9xuho3 atm_uc_aaiy6o_1tasb51 atm_4b_dezgoh_1tasb51 atm_70_1t2bbnk_1tasb51 atm_gi_eflcwz_1tasb51 atm_uc_glywfm_1tasb51_1rrf6b5 atm_wq_cs5v99_pfnrn2_1oszvuo atm_9s_1ulexfb_1buez3b_1oszvuo atm_uc_aaiy6o_1fu4lp4_1oszvuo atm_4b_dezgoh_1fu4lp4_1oszvuo atm_70_1t2bbnk_1fu4lp4_1oszvuo atm_gi_eflcwz_1fu4lp4_1oszvuo atm_uc_glywfm_1fu4lp4_1o31aam dir dir-ltr"
                                                role="button" tabindex="0" aria-expanded="false"
                                                data-testid="structured-search-input-field-split-dates-1">
                                                <div
                                                    class="cz9siyu atm_l8_srw7uq atm_ks_15vqwwr atm_mk_h2mmj6 atm_vv_1q9ccgz atm_vy_1osqo2v atm_wq_kb7nvz dir dir-ltr">
                                                    <div
                                                        class="lk4ruxu atm_c8_1uc0753 atm_g3_lonqig atm_cs_9dzvea atm_fr_idpfg4 atm_le_yh40bf dir dir-ltr">
                                                        Check out</div>
                                                    <div
                                                        class="p1m42al0 atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_6adqpa atm_ks_15vqwwr atm_sq_1l2sidv atm_vy_1osqo2v p1t4vwjw atm_7l_1jsbn00 dir dir-ltr">
                                                        Add dates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="s1w513da atm_j_1h6ojuz atm_5q_1vlbu9m atm_am_jp9ccn atm_e2_1vi7ecw dir dir-ltr">
                                    </div>
                                    <div
                                        class="c111bvlt atm_9s_1txwivl atm_1eltean_1osqo2v c1gh7ier atm_am_1qhqiko dir dir-ltr">
                                        <div
                                            class="c1ddhymz atm_h_1h6ojuz atm_9s_1txwivl atm_gi_1n1ank9 atm_jb_idpfg4 atm_mk_h2mmj6 atm_vy_10bmcub cggll98 atm_am_1qhqiko dir dir-ltr">
                                            <div class="b1spesa7 atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_7l_1kw7nm4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_g3_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_9s_1ulexfb atm_am_qk3dho atm_l8_t94yts atm_r3_1e5hqsa atm_vy_idpfg4 atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_6h_1s2714j_vmtskl atm_66_nqa18y_vmtskl atm_4b_1egtlkw_vmtskl atm_92_1yyfdc7_vmtskl atm_9s_glywfm_vmtskl atm_e2_1vi7ecw_vmtskl atm_fq_idpfg4_vmtskl atm_h3_4h84z3_vmtskl atm_mk_stnw88_vmtskl atm_n3_idpfg4_vmtskl atm_tk_1ssbidh_vmtskl atm_wq_idpfg4_vmtskl atm_2a_1u8qnfj_9in345 atm_3f_okh77k_9in345 atm_5j_1vi7ecw_9in345 atm_6i_idpfg4_9in345 atm_92_1yyfdc7_9in345 atm_fq_idpfg4_9in345 atm_mk_stnw88_9in345 atm_n3_idpfg4_9in345 atm_tk_idpfg4_9in345 atm_wq_idpfg4_9in345 b1fbhdca atm_9s_1ulexfb_1rqz0hn atm_gi_eflcwz_9bj8xt atm_2d_um1unu_9bj8xt atm_wq_cs5v99_1w3cfyq atm_9s_1ulexfb_9xuho3 atm_uc_aaiy6o_1tasb51 atm_4b_dezgoh_1tasb51 atm_70_1t2bbnk_1tasb51 atm_gi_eflcwz_1tasb51 atm_uc_glywfm_1tasb51_1rrf6b5 atm_wq_cs5v99_pfnrn2_1oszvuo atm_9s_1ulexfb_1buez3b_1oszvuo atm_uc_aaiy6o_1fu4lp4_1oszvuo atm_4b_dezgoh_1fu4lp4_1oszvuo atm_70_1t2bbnk_1fu4lp4_1oszvuo atm_gi_eflcwz_1fu4lp4_1oszvuo atm_uc_glywfm_1fu4lp4_1o31aam b1889vka atm_5q_idpfg4_agv9cz atm_h0_idpfg4_1ve49u dir dir-ltr"
                                                role="button" tabindex="0" aria-expanded="false">
                                                <div
                                                    class="cz9siyu atm_l8_srw7uq atm_ks_15vqwwr atm_mk_h2mmj6 atm_vv_1q9ccgz atm_vy_1osqo2v atm_wq_kb7nvz dir dir-ltr">
                                                    <div
                                                        class="lk4ruxu atm_c8_1uc0753 atm_g3_lonqig atm_cs_9dzvea atm_fr_idpfg4 atm_le_yh40bf dir dir-ltr">
                                                        Who</div>
                                                    <div
                                                        class="p1m42al0 atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_6adqpa atm_ks_15vqwwr atm_sq_1l2sidv atm_vy_1osqo2v p1t4vwjw atm_7l_1jsbn00 dir dir-ltr">
                                                        Add guests</div>
                                                </div>
                                            </div>
                                            <div
                                                class="snd2ne0 atm_am_12336oc atm_gz_yjp0fh atm_ll_rdoju8 atm_mk_h2mmj6 atm_wq_qfx8er dir dir-ltr">
                                                <button
                                                    class="bhtghtc atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_9s_1o8liyq atm_bx_1kw7nm4 atm_gi_idpfg4 atm_l8_idpfg4 atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_2d_r0d14n atm_5j_1tcgj5g atm_7l_1p8m8iw atm_c8_2x1prs atm_cs_9dzvea atm_e2_fyhuej atm_g3_exct8b atm_j3_fyhuej atm_ks_15vqwwr atm_mk_h2mmj6 atm_uc_rk2j2 atm_vh_nkobfv atm_wq_idpfg4 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_2d_wl3mcu__6ldadd atm_uc_glywfm__1rrf6b5 atm_26_3ib6or_vmtskl atm_6i_idpfg4_vmtskl atm_92_1yyfdc7_vmtskl atm_fq_idpfg4_vmtskl atm_mk_stnw88_vmtskl atm_n3_idpfg4_vmtskl atm_tk_idpfg4_vmtskl atm_uc_phmiph_vmtskl atm_vz_brmitn_vmtskl atm_wq_idpfg4_vmtskl atm_uc_glywfm_vmtskl_1rrf6b5 atm_70_1kppo7g_1w3cfyq atm_70_1kppo7g_pfnrn2_1oszvuo b11im28u atm_k4_idpfg4_vmtskl atm_k4_kb7nvz_1rqz0hn dir dir-ltr"
                                                    type="button" data-testid="structured-search-input-search-button">
                                                    <div
                                                        class="c1nkokj4 atm_9s_116y0ak atm_l8_exct8b atm_mk_h2mmj6 atm_wq_kb7nvz dir dir-ltr">
                                                        <div class=" dir dir-ltr">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                                aria-hidden="true" role="presentation" focusable="false"
                                                                style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 4; overflow: visible;">
                                                                <path fill="none"
                                                                    d="M13 24a11 11 0 1 0 0-22 11 11 0 0 0 0 22zm8-3 9 9">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="l1h8x6z4 atm_k4_idpfg4 atm_lk_ftgil2 atm_ll_1y44olf atm_uc_10s88n5 atm_uc_glywfm__1rrf6b5 l4jheou atm_ud_o03ep1 dir dir-ltr">
                                                            Search</div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <input
                    class="muh9wos atm_3f_idpfg4 atm_7h_hxbz6r atm_7i_ysn8ba atm_e2_t94yts atm_ks_zryt35 atm_l8_idpfg4 atm_mk_stnw88 atm_vv_1q9ccgz atm_vy_t94yts atm_vl_15vqwwr atm_vl_ewfl5b_pfnrn2 dir dir-ltr"
                    type="text" aria-hidden="true">
            </div>
            <div class="csb38sw atm_am_1gtjylf atm_am_1hvxjc4__1v156lz dir dir-ltr">
                <nav class="_vuzcgs" aria-label="Profile">
                    <div class="_176ugpa">
                        <a class="chplgv4 atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_9s_1o8liyq atm_bx_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_9dzvea atm_l8_1fwxnve atm_mk_h2mmj6 atm_vv_1q9ccgz atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_5j_qslrf5_vmtskl atm_6i_idpfg4_vmtskl atm_92_1yyfdc7_vmtskl atm_fq_j39m9b_vmtskl atm_mk_stnw88_vmtskl atm_n3_j39m9b_vmtskl atm_tk_idpfg4_vmtskl atm_wq_idpfg4_vmtskl atm_wq_cs5v99_1w3cfyq atm_uc_aaiy6o_9xuho3 atm_70_lgq2mu_9xuho3 atm_uc_glywfm_9xuho3_1rrf6b5 atm_wq_cs5v99_pfnrn2_1oszvuo atm_uc_aaiy6o_1buez3b_1oszvuo atm_70_lgq2mu_1buez3b_1oszvuo atm_uc_glywfm_1buez3b_1o31aam c177491c atm_7l_dezgoh atm_uc_fg9k26 atm_26_116dmco_1rqz0hn dir dir-ltr"
                            href="https://www.airbnb.com/host/homes">
                            <div
                                class="lloffz7 atm_h_1h6ojuz atm_9s_1txwivl atm_e2_1osqo2v atm_mk_h2mmj6 atm_wq_kb7nvz dir dir-ltr">
                                Airbnb your home</div>
                        </a>
                        <div class="_pvfq6t">
                            <button type="button"
                                class="chplgv4 atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_9s_1o8liyq atm_bx_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_cs_9dzvea atm_l8_1fwxnve atm_mk_h2mmj6 atm_vv_1q9ccgz atm_wq_kb7nvz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_5j_qslrf5_vmtskl atm_6i_idpfg4_vmtskl atm_92_1yyfdc7_vmtskl atm_fq_j39m9b_vmtskl atm_mk_stnw88_vmtskl atm_n3_j39m9b_vmtskl atm_tk_idpfg4_vmtskl atm_wq_idpfg4_vmtskl atm_wq_cs5v99_1w3cfyq atm_uc_aaiy6o_9xuho3 atm_70_lgq2mu_9xuho3 atm_uc_glywfm_9xuho3_1rrf6b5 atm_wq_cs5v99_pfnrn2_1oszvuo atm_uc_aaiy6o_1buez3b_1oszvuo atm_70_lgq2mu_1buez3b_1oszvuo atm_uc_glywfm_1buez3b_1o31aam c177491c atm_7l_dezgoh atm_uc_fg9k26 atm_26_116dmco_1rqz0hn dir dir-ltr"
                                aria-expanded="false" aria-label="Choose a language and currency">
                                <div
                                    class="lloffz7 atm_h_1h6ojuz atm_9s_1txwivl atm_e2_1osqo2v atm_mk_h2mmj6 atm_wq_kb7nvz dir dir-ltr">
                                    <div class="_z5mecy" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                            role="presentation" focusable="false"
                                            style="display: block; height: 16px; width: 16px; fill: currentcolor;">
                                            <path
                                                d="M8 .25a7.77 7.77 0 0 1 7.75 7.78 7.75 7.75 0 0 1-7.52 7.72h-.25A7.75 7.75 0 0 1 .25 8.24v-.25A7.75 7.75 0 0 1 8 .25zm1.95 8.5h-3.9c.15 2.9 1.17 5.34 1.88 5.5H8c.68 0 1.72-2.37 1.93-5.23zm4.26 0h-2.76c-.09 1.96-.53 3.78-1.18 5.08A6.26 6.26 0 0 0 14.17 9zm-9.67 0H1.8a6.26 6.26 0 0 0 3.94 5.08 12.59 12.59 0 0 1-1.16-4.7l-.03-.38zm1.2-6.58-.12.05a6.26 6.26 0 0 0-3.83 5.03h2.75c.09-1.83.48-3.54 1.06-4.81zm2.25-.42c-.7 0-1.78 2.51-1.94 5.5h3.9c-.15-2.9-1.18-5.34-1.89-5.5h-.07zm2.28.43.03.05a12.95 12.95 0 0 1 1.15 5.02h2.75a6.28 6.28 0 0 0-3.93-5.07z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="_3hmsj">
                        <div class="_167wsvl" data-profile-menu-open="false">
                            <button type="button"
                                class="onClickHeaderLoginShow cnky2vc atm_1s_glywfm atm_26_1j28jx2 atm_9j_tlke0l atm_bx_1kw7nm4 atm_c8_1kw7nm4 atm_cs_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_h_1h6ojuz atm_2d_1p8m8iw atm_3f_1vlbu9m atm_5j_1rwtgmb atm_7l_dezgoh atm_9s_116y0ak atm_e2_12oa1m8 atm_l8_ef04uq atm_mk_h2mmj6 atm_vh_nkobfv atm_uc_aaiy6o atm_wq_kb7nvz atm_g3_qnbkur atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_glywfm__1rrf6b5 atm_uc_aaiy6o_1w3cfyq atm_70_lgq2mu_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_lgq2mu_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam c1r2bm7w atm_70_1p8xsmn_1nos8r cln384f atm_1ieuuo9_1vi7ecw atm_1dfygl2_fyhuej atm_1lqvdwn_1ul9x4n atm_f4syw5_ftgil2 atm_1255xc1_dlk8xv atm_1ellefq_12etsqc atm_vl4zd4_t94yts dir dir-ltr"
                                aria-expanded="false" aria-label="Main navigation menu"
                                data-testid="cypress-headernav-profile"
                                data-tooltip-anchor-id="headernav-profile-button">
                                <div class=" dir dir-ltr onClickHeaderLoginShow">
                                    <svg class='onClickHeaderLoginShow' xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false"
                                        style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;">
                                        <g fill="none">
                                            <path d="M2 16h28M2 24h28M2 8h28"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div
                                    class="fs7xov7 atm_7l_1esdqks atm_am_sfpmae atm_e2_x4u3u4 atm_gz_1qdqwt3 atm_ks_15vqwwr atm_mk_h2mmj6 atm_vy_x4u3u4 atm_wq_kb7nvz dir dir-ltr">
                                    <svg class='onClickHeaderLoginShow' xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false"
                                        style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                                        <path
                                            d="M16 .7C7.56.7.7 7.56.7 16S7.56 31.3 16 31.3 31.3 24.44 31.3 16 24.44.7 16 .7zm0 28c-4.02 0-7.6-1.88-9.93-4.81a12.43 12.43 0 0 1 6.45-4.4A6.5 6.5 0 0 1 9.5 14a6.5 6.5 0 0 1 13 0 6.51 6.51 0 0 1-3.02 5.5 12.42 12.42 0 0 1 6.45 4.4A12.67 12.67 0 0 1 16 28.7z">
                                        </path>
                                    </svg>
                                </div>
                            </button>

                            <div id="onClickHeaderLogin" style="display:none;"
                                class="c3i7glo atm_26_1p8m8iw atm_5j_kitwna atm_70_8oykxz atm_7l_dezgoh atm_h3_1u1b7xl atm_l8_brf0ql atm_mk_stnw88 atm_tk_1ssbidh atm_n3_idpfg4 atm_iy_1aa3ab3 atm_l1_1wugsn5 atm_wq_cs5v99 atm_jb_ghg70p c39hl9j atm_9s_1ulexfb dir dir-ltr"
                                tabindex="-1" id="simple-header-profile-menu" data-testid="simple-header-profile-menu">
                                <div>
                                    <a id='singupBtn'
                                        class="c1ql0u4u atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_l8_11nx8fq atm_vv_1q9ccgz atm_vy_1osqo2v atm_cs_9dzvea atm_9s_1txwivl atm_h_1h6ojuz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_2d_116dmco_1b5lzrw atm_uc_aaiy6o_1w3cfyq atm_70_cdw4us_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_cdw4us_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam c138yemz dir dir-ltr"
                                        data-testid="cypress-headernav-signup">
                                        <div class="lgh3vnd atm_am_1gtjylf dir dir-ltr">Sign up</div>
                                    </a>
                                    <a id='loginBtn'
                                        class="cd7h8km atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_l8_11nx8fq atm_vv_1q9ccgz atm_vy_1osqo2v atm_cs_6adqpa atm_9s_1txwivl atm_h_1h6ojuz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_2d_116dmco_1b5lzrw atm_uc_aaiy6o_1w3cfyq atm_70_cdw4us_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_cdw4us_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam c11luhwk dir dir-ltr"
                                        data-testid="cypress-headernav-login">
                                        <div class="l1xexnrd atm_am_1gtjylf dir dir-ltr">Log in</div>
                                    </a>
                                    <a href="chat.php?id=<?php echo $id; ?>"
                                        class="cd7h8km atm_1s_glywfm atm_26_1j28jx2 atm_3f_idpfg4 atm_9j_tlke0l atm_bx_1kw7nm4 atm_gi_idpfg4 atm_ks_ewfl5b atm_r3_1kw7nm4 atm_rd_glywfm atm_vb_1wugsn5 atm_kd_glywfm atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_dezgoh atm_l8_11nx8fq atm_vv_1q9ccgz atm_vy_1osqo2v atm_cs_6adqpa atm_9s_1txwivl atm_h_1h6ojuz atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_2d_116dmco_1b5lzrw atm_uc_aaiy6o_1w3cfyq atm_70_cdw4us_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_cdw4us_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam c11luhwk dir dir-ltr"
                                        data-testid="cypress-headernav-login">
                                        <div class="l1xexnrd atm_am_1gtjylf dir dir-ltr">Message</div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="row clearfix"style="
    margin-top: -12px;
">
        <div class="col-lg-12 justify-content-center">
            <div class="container">
                <div class="row ">
                    <div class="card chat-app">
                        <div id="plist" class="people-list">
                            <div class="d-flex1">
                                <h4 id="header-text" class="mt-2">Message</h4>
                                <div class="d-flex">
                                    <div class="input-group-prepend ml-3" id="search-icon">
                                        <button aria-label="Search" type="button"
                                            class="l1ovpqvx atm_1he2i46_1k8pnbi_10saat9 atm_yxpdqi_1pv6nv4_10saat9 atm_1a0hdzc_w1h1e8_10saat9 atm_2bu6ew_929bqk_10saat9 atm_12oyo1u_73u7pn_10saat9 atm_fiaz40_1etamxe_10saat9 bbhuy7o atm_9j_tlke0l atm_9s_1o8liyq atm_gi_idpfg4 atm_mk_h2mmj6 atm_r3_1h6ojuz atm_70_5j5alw atm_vy_1wugsn5 atm_tl_1gw4zv3 atm_9j_13gfvf7_1o5j5ji cgpi0jo atm_bx_48h72j atm_cs_10d11i2 atm_kd_glywfm atm_l8_srw7uq atm_uc_1lizyuv atm_r2_1j28jx2 atm_jb_1fkumsa atm_3f_glywfm atm_26_1j28jx2 atm_7l_jt7fhx atm_9xn0br_1wugsn5 atm_9tnf0v_1wugsn5 atm_7o60g0_1wugsn5 atm_8w_1t7jgwy atm_2d_d0eyo3 atm_5j_1c0qzja atm_lk_1qrcn3x atm_ll_1qrcn3x atm_lo_1e4jude atm_le_1e4jude atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_rd_glywfm atm_uc_glywfm__1rrf6b5 atm_kd_glywfm_1w3cfyq atm_uc_aaiy6o_1w3cfyq atm_3f_glywfm_e4a3ld atm_l8_idpfg4_e4a3ld atm_gi_idpfg4_e4a3ld atm_3f_glywfm_1r4qscq atm_kd_glywfm_6y7yyg atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_kd_glywfm_pfnrn2_1oszvuo atm_uc_aaiy6o_pfnrn2_1oszvuo atm_3f_glywfm_1icshfk_1oszvuo atm_l8_idpfg4_1icshfk_1oszvuo atm_gi_idpfg4_1icshfk_1oszvuo atm_3f_glywfm_b5gff8_1oszvuo atm_kd_glywfm_2by9w9_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_tr_18md41p_csw3t1 atm_k4_kb7nvz_1o5j5ji atm_3f_glywfm_1w3cfyq atm_26_zbnr2t_1w3cfyq atm_7l_jt7fhx_1w3cfyq atm_70_18bflhl_1w3cfyq atm_3f_glywfm_pfnrn2_1oszvuo atm_26_zbnr2t_pfnrn2_1oszvuo atm_7l_jt7fhx_pfnrn2_1oszvuo atm_70_18bflhl_pfnrn2_1oszvuo atm_3f_glywfm_1nos8r_uv4tnr atm_26_zbnr2t_1nos8r_uv4tnr atm_7l_177r58q_1nos8r_uv4tnr atm_3f_glywfm_4fughm_uv4tnr atm_26_1j28jx2_4fughm_uv4tnr atm_7l_9vytuy_4fughm_uv4tnr atm_3f_glywfm_csw3t1 atm_26_zbnr2t_csw3t1 atm_7l_177r58q_csw3t1 atm_3f_glywfm_1o5j5ji atm_26_1j28jx2_1o5j5ji atm_7l_9vytuy_1o5j5ji atm_rd_glywfm_1nos8r atm_rd_glywfm_pfnrn2 s1ermgjl atm_1wn1q82_1gs0sis dir dir-ltr">
                                            <div class="lydbujp atm_1wn1q82_rnjrg6 atm_ks_1wautj dir dir-ltr"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    aria-hidden="true" role="presentation" focusable="false"
                                                    style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;">
                                                    <path fill="none"
                                                        d="M13 24a11 11 0 1 0 0-22 11 11 0 0 0 0 22zm8-3 9 9">
                                                    </path>
                                                </svg></div>
                                        </button>
                                    </div>
                                    <div class="ml-2">
                                        <button id="header-text" aria-label="Messaging Settings" type="button"
                                            class="l1ovpqvx atm_1he2i46_1k8pnbi_10saat9 atm_yxpdqi_1pv6nv4_10saat9 atm_1a0hdzc_w1h1e8_10saat9 atm_2bu6ew_929bqk_10saat9 atm_12oyo1u_73u7pn_10saat9 atm_fiaz40_1etamxe_10saat9 bbhuy7o atm_9j_tlke0l atm_9s_1o8liyq atm_gi_idpfg4 atm_mk_h2mmj6 atm_r3_1h6ojuz atm_70_5j5alw atm_vy_1wugsn5 atm_tl_1gw4zv3 atm_9j_13gfvf7_1o5j5ji cgpi0jo atm_bx_48h72j atm_cs_10d11i2 atm_kd_glywfm atm_l8_srw7uq atm_uc_1lizyuv atm_r2_1j28jx2 atm_jb_1fkumsa atm_3f_glywfm atm_26_1j28jx2 atm_7l_jt7fhx atm_9xn0br_1wugsn5 atm_9tnf0v_1wugsn5 atm_7o60g0_1wugsn5 atm_8w_1t7jgwy atm_2d_d0eyo3 atm_5j_1c0qzja atm_lk_1qrcn3x atm_ll_1qrcn3x atm_lo_1e4jude atm_le_1e4jude atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_rd_glywfm atm_uc_glywfm__1rrf6b5 atm_kd_glywfm_1w3cfyq atm_uc_aaiy6o_1w3cfyq atm_3f_glywfm_e4a3ld atm_l8_idpfg4_e4a3ld atm_gi_idpfg4_e4a3ld atm_3f_glywfm_1r4qscq atm_kd_glywfm_6y7yyg atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_kd_glywfm_pfnrn2_1oszvuo atm_uc_aaiy6o_pfnrn2_1oszvuo atm_3f_glywfm_1icshfk_1oszvuo atm_l8_idpfg4_1icshfk_1oszvuo atm_gi_idpfg4_1icshfk_1oszvuo atm_3f_glywfm_b5gff8_1oszvuo atm_kd_glywfm_2by9w9_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_tr_18md41p_csw3t1 atm_k4_kb7nvz_1o5j5ji atm_3f_glywfm_1w3cfyq atm_26_zbnr2t_1w3cfyq atm_7l_jt7fhx_1w3cfyq atm_70_18bflhl_1w3cfyq atm_3f_glywfm_pfnrn2_1oszvuo atm_26_zbnr2t_pfnrn2_1oszvuo atm_7l_jt7fhx_pfnrn2_1oszvuo atm_70_18bflhl_pfnrn2_1oszvuo atm_3f_glywfm_1nos8r_uv4tnr atm_26_zbnr2t_1nos8r_uv4tnr atm_7l_177r58q_1nos8r_uv4tnr atm_3f_glywfm_4fughm_uv4tnr atm_26_1j28jx2_4fughm_uv4tnr atm_7l_9vytuy_4fughm_uv4tnr atm_3f_glywfm_csw3t1 atm_26_zbnr2t_csw3t1 atm_7l_177r58q_csw3t1 atm_3f_glywfm_1o5j5ji atm_26_1j28jx2_1o5j5ji atm_7l_9vytuy_1o5j5ji atm_rd_glywfm_1nos8r atm_rd_glywfm_pfnrn2 dir dir-ltr"><span
                                                class="c863l3 atm_9s_1txwivl atm_ar_vrvcex atm_h_1h6ojuz atm_fc_1h6ojuz atm_mj_glywfm dir dir-ltr"><span
                                                    class="ck024z4 dir dir-ltr"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                                                        focusable="false"
                                                        style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;">
                                                        <path fill="none"
                                                            d="M7 16H3m26 0H15M29 6h-4m-8 0H3m26 20h-4M7 16a4 4 0 1 0 8 0 4 4 0 0 0-8 0zM17 6a4 4 0 1 0 8 0 4 4 0 0 0-8 0zm0 20a4 4 0 1 0 8 0 4 4 0 0 0-8 0zm0 0H3">
                                                        </path>
                                                    </svg></span></span></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="icbqsqd atm_9s_1txwivl atm_ar_1bp4okc atm_am_kb7nvz dir dir-ltr"><div class="c1tdkcux atm_9s_1txwivl atm_l8_oui2l2 atm_vy_1osqo2v atm_l8_m356hm__oggzyc dir dir-ltr" role="group" aria-label="Filter"><div class="c1vfuicp atm_9s_1txwivl atm_1bq7wlm_1j28jx2 atm_5nk8gm_d0eyo3 atm_16wbfli_jt7fhx atm_fzexm0_1v2u014 atm_vvmm9u_18sdevw atm_vv9ape_a15kmj atm_x1yxca_1j28jx2 atm_4fm8hd_4ccpr2 c1wg55vr atm_9s_glywfm__kk47tb dir dir-ltr"><div><button aria-label="All, filter by message type" class="c42iq5v atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_gi_idpfg4 atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_l8_hizvw0 atm_j6_1vi7ecw atm_5j_1vi7ecw atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_177r58q_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_l8_65btet__oggzyc atm_4b_zhek3k_csw3t1 atm_2d_1x582i0_csw3t1 c1wstvm0 atm_9s_116y0ak atm_h_1h6ojuz cw5pzos atm_4b_13iob9d atm_2d_1tynf3y atm_7l_ina5fm atm_92_1yyfdc7_1xdu4iq atm_vy_1b4hta7_1xdu4iq atm_e2_1b4hta7_1xdu4iq atm_2d_1j28jx2_1xdu4iq atm_mk_stnw88_1xdu4iq atm_tk_1n1ank9_1xdu4iq atm_fq_1n1ank9_1xdu4iq atm_3f_1axkm70_1xdu4iq atm_4b_1kw7nm4_1xdu4iq atm_5j_1kw7nm4_1xdu4iq atm_7l_j8zk7k_1nos8r_uv4tnr atm_4b_zhek3k_1nos8r_uv4tnr atm_2d_wcf0q_1nos8r_uv4tnr dir dir-ltr" aria-pressed="true" type="button"><span class="mqt0xe7 atm_9s_1ulexfb dir dir-ltr"><div class="m4ray5o atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_10d11i2 atm_c8_1cw7z3g__oggzyc atm_g3_92qb7l__oggzyc atm_fr_1bq7tds__oggzyc dir dir-ltr">All</div></span><span class="t1e2hatd atm_ks_15vqwwr atm_ax_idpfg4 atm_bb_idpfg4 atm_9s_1txwivl atm_h_1h6ojuz atm_fc_1h6ojuz atm_gz_1yuitx dir dir-ltr"><div class="cdi8obq atm_bb_idpfg4 atm_uc_dgaqf3 dir dir-ltr"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 4; overflow: visible;"><path fill="none" d="M28 12 16.7 23.3a1 1 0 0 1-1.4 0L4 12"></path></svg></div></span></button></div></div><div class="m3c9mvc atm_7i_9yuk3w atm_9s_11p5wf0 atm_am_kb7nvz atm_cx_1pqo34e atm_d3_1risgsc atm_d5_1bp4okc atm_l0_15zigw atm_h0_8jkm7i atm_gz_1lpd5c9 atm_l8_14y27yu atm_p9_glywfm__1i7fo8i atm_9s_4qvz5v_14pyf7n_1i7fo8i atm_1bfq8ng_n7od8j__oggzyc atm_p9_n7od8j__oggzyc atm_l0_1wugsn5__oggzyc atm_h0_idpfg4__oggzyc atm_gz_idpfg4__oggzyc atm_lo_idpfg4__oggzyc atm_le_idpfg4__oggzyc atm_lk_ftgil2__oggzyc dir dir-ltr"><div class="c1vfuicp atm_9s_1txwivl atm_1bq7wlm_1j28jx2 atm_5nk8gm_d0eyo3 atm_16wbfli_jt7fhx atm_fzexm0_1v2u014 atm_vvmm9u_18sdevw atm_vv9ape_a15kmj atm_x1yxca_1j28jx2 atm_4fm8hd_4ccpr2 mua9r1d atm_9s_glywfm__oggzyc dir dir-ltr" style="view-transition-name: var(--message-type-row_0);"><button aria-label="Filter by All" tabindex="0" role="radio" aria-checked="true" class="c1w2tw32 atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_gi_idpfg4 atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_l8_hizvw0 atm_j6_1vi7ecw atm_jb_8vuzuz atm_5j_1vi7ecw atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_7l_177r58q_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_l8_65btet__oggzyc atm_4b_zhek3k_csw3t1 atm_2d_1x582i0_csw3t1 cdmluip atm_4b_13iob9d atm_2d_1tynf3y atm_7l_ina5fm atm_92_1yyfdc7_1xdu4iq atm_vy_1b4hta7_1xdu4iq atm_e2_1b4hta7_1xdu4iq atm_2d_1j28jx2_1xdu4iq atm_mk_stnw88_1xdu4iq atm_tk_1n1ank9_1xdu4iq atm_fq_1n1ank9_1xdu4iq atm_3f_1axkm70_1xdu4iq atm_4b_1kw7nm4_1xdu4iq atm_5j_1kw7nm4_1xdu4iq atm_7l_j8zk7k_1nos8r_uv4tnr atm_4b_zhek3k_1nos8r_uv4tnr atm_2d_wcf0q_1nos8r_uv4tnr dir dir-ltr" aria-pressed="true" type="button"><div aria-hidden="true" class="m14biqd4 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_10d11i2 atm_c8_1cw7z3g__oggzyc atm_g3_92qb7l__oggzyc atm_fr_1bq7tds__oggzyc dir dir-ltr">All</div></button></div><div class="c1vfuicp atm_9s_1txwivl atm_1bq7wlm_1j28jx2 atm_5nk8gm_d0eyo3 atm_16wbfli_jt7fhx atm_fzexm0_1v2u014 atm_vvmm9u_18sdevw atm_vv9ape_a15kmj atm_x1yxca_1j28jx2 atm_4fm8hd_4ccpr2 mua9r1d atm_9s_glywfm__oggzyc dir dir-ltr" style="view-transition-name: var(--message-type-row_1);"><button aria-label="Filter by Traveling" tabindex="0" role="radio" aria-checked="false" class="c1w2tw32 atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_gi_idpfg4 atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_l8_hizvw0 atm_j6_1vi7ecw atm_jb_8vuzuz atm_5j_1vi7ecw atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_2d_1rs86ik atm_4b_1bpns1b atm_7l_177r58q_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_l8_65btet__oggzyc atm_7l_upqe0v_1nos8r_uv4tnr atm_4b_1ps7ruj_1nos8r_uv4tnr atm_2d_la6lon_1nos8r_uv4tnr atm_4b_zhek3k_csw3t1 atm_2d_1x582i0_csw3t1 dir dir-ltr" aria-pressed="false" type="button"><div aria-hidden="true" class="m14biqd4 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_10d11i2 atm_c8_1cw7z3g__oggzyc atm_g3_92qb7l__oggzyc atm_fr_1bq7tds__oggzyc dir dir-ltr">Traveling</div></button></div><div class="c1vfuicp atm_9s_1txwivl atm_1bq7wlm_1j28jx2 atm_5nk8gm_d0eyo3 atm_16wbfli_jt7fhx atm_fzexm0_1v2u014 atm_vvmm9u_18sdevw atm_vv9ape_a15kmj atm_x1yxca_1j28jx2 atm_4fm8hd_4ccpr2 mua9r1d atm_9s_glywfm__oggzyc dir dir-ltr" style="view-transition-name: var(--message-type-row_2);"><button aria-label="Filter by Support" tabindex="0" role="radio" aria-checked="false" class="c1w2tw32 atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_gi_idpfg4 atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_l8_hizvw0 atm_j6_1vi7ecw atm_jb_8vuzuz atm_5j_1vi7ecw atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_2d_1rs86ik atm_4b_1bpns1b atm_7l_177r58q_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_l8_65btet__oggzyc atm_7l_upqe0v_1nos8r_uv4tnr atm_4b_1ps7ruj_1nos8r_uv4tnr atm_2d_la6lon_1nos8r_uv4tnr atm_4b_zhek3k_csw3t1 atm_2d_1x582i0_csw3t1 dir dir-ltr" aria-pressed="false" type="button"><div aria-hidden="true" class="m14biqd4 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_10d11i2 atm_c8_1cw7z3g__oggzyc atm_g3_92qb7l__oggzyc atm_fr_1bq7tds__oggzyc dir dir-ltr">Support</div></button></div><div class="d8o9xc2 atm_9s_glywfm__kk47tb dir dir-ltr" style="view-transition-name: var(--filter-type-row_0);"><button aria-label="Filter by Unread" class="c13ye1sz atm_9s_1o8liyq atm_9j_tlke0l atm_r3_1h6ojuz atm_3f_uuagnh atm_gi_idpfg4 atm_2d_1qwqy05 atm_7l_jt7fhx atm_bx_48h72j atm_mk_h2mmj6 atm_uq_17liqq3 atm_ui_1bljbuh atm_uv_xoomkg atm_kd_glywfm atm_l8_hizvw0 atm_j6_1vi7ecw atm_jb_8vuzuz atm_5j_1vi7ecw atm_c8_km0zk7 atm_g3_18khvle atm_fr_1m9t47k atm_4b_jqn8m1 atm_7l_177r58q_csw3t1 atm_tr_ybgkrq_csw3t1 atm_3f_glywfm_jo46a5 atm_l8_idpfg4_jo46a5 atm_gi_idpfg4_jo46a5 atm_3f_glywfm_1icshfk atm_kd_glywfm_19774hq atm_uc_aaiy6o_1w3cfyq atm_70_15w7q17_1w3cfyq atm_uc_glywfm_1w3cfyq_1rrf6b5 atm_uc_aaiy6o_pfnrn2_1oszvuo atm_70_15w7q17_pfnrn2_1oszvuo atm_uc_glywfm_pfnrn2_1o31aam atm_uc_aaiy6o_1s76pf2 atm_70_15w7q17_1s76pf2 atm_uc_glywfm_1s76pf2_1rrf6b5 atm_uc_aaiy6o_1y5fnfe_1oszvuo atm_70_15w7q17_1y5fnfe_1oszvuo atm_uc_glywfm_1y5fnfe_1o31aam atm_l8_65btet__oggzyc atm_7l_823zgx_1nos8r_uv4tnr atm_4b_10zz71t_1nos8r_uv4tnr atm_2d_heou3y_1nos8r_uv4tnr atm_4b_1ema44n_csw3t1 atm_2d_1xjjcfp_csw3t1 dir dir-ltr" aria-pressed="false" type="button"><div class="m1lu55g1 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_cs_10d11i2 atm_c8_1cw7z3g__oggzyc atm_g3_92qb7l__oggzyc atm_fr_1bq7tds__oggzyc dir dir-ltr">Unread</div></button></div></div></div></div>

                            <div class="input-group bottom">
                                <div id="search-input" class="d-flex newww">
                                    <input type="text" class="form-control new1" placeholder="Search messages...">
                                    <i class="fa fa-search new2 d-none"></i> <!-- Initially hidden icon -->
                                    <span id="cancel-icon" style="display:none;"><button
                                            class="btn custom-btn rounded-pill">Cancel</button></span>
                                    <!-- Cancel Icon -->
                                </div>
                            </div>




                            <ul class="list-unstyled chat-list  mb-0">
                                <style>
                                    .expanded {
                                        margin-bottom: 50px;
                                    }

                                    .chat-list {
                                        margin-top: -34px;
                                    }

                                    .profile-container {
                                        position: relative;
                                        width: 100%;
                                        max-width: 300px;
                                        /* Adjust this as needed */
                                    }

                                    .newww {
                                        margin-left: 22px;
                                    }

                                    .profile-container .background-img {
                                        width: 32%;
                                        height: 55px;
                                        object-fit: cover;
                                    }

                                    .profile-container .profile-img {
                                        position: absolute;
                                        bottom: -10px;
                                        left: 49px;
                                        width: 42px;
                                        height: 38px;
                                        border-radius: 50%;
                                        border: 3px solid white;
                                        /* Creates a border around the image */
                                        object-fit: cover;
                                    }

                                    .about {
                                        margin-top: -40px;
                                        text-align: center;
                                    }


                                    .name {
                                        font-weight: bold;
                                        font-size: 16px;
                                    }
                                    .btnki {
    position: absolute !important;
    right: 10px;
    top: 0;
    z-index: 7;
    background: #ffe4c400;
}
.input-group>.custom-file .custom-file-input:focus~.custom-file-label, .input-group>.custom-select:focus, .input-group>.form-control:focus {
    z-index: 0 !important;
}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #495057 !important;
    outline: 0;
    box-shadow: none !important;
}
                                </style>

                                <li class="clearfix">
                                    <?php if (!empty($fetch_property['property_image'])):
                                        $images = unserialize($fetch_property['property_image']);
                                        if (!empty($images) && is_array($images)): ?>
                                            <div class="profile-container">
                                                <!-- Large background image -->
                                                <img class="background-img" src="<?= trim($images[0]) ?>" alt="Property Image">

                                                <!-- Small, rounded profile image -->
                                                <img class="profile-img"
                                                    src="../controller/assets/profile_pic_hosts/<?= htmlspecialchars($fetch_host['profile_image']) ?>"
                                                    alt="Profile Image">
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="about">
                                        <div class="name"><?= htmlspecialchars($fetch_host['first_name']) ?>
                                            <?= htmlspecialchars($fetch_host['last_name']) ?>
                                        </div>
                                        <div class="status"><i class="fa fa-circle offline"></i> Offline</div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="chat">
                            <div class="chat-header clearfix">
                                <div class="row">
                                    <div class="col-lg-6 ml-3">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                            <img class="chahht"
                                                src="../controller/assets/profile_pic_hosts/<?= htmlspecialchars($fetch_host['profile_image']) ?>">
                                        </a>
                                        <div class="chat-about">
                                            <p class="mt-0"><b><?= htmlspecialchars($fetch_host['first_name']) ?>
                                                    <?= htmlspecialchars($fetch_host['last_name']) ?></b><br>
                                                <img src="./assets/g-translate.png" alt="" class="google_img">
                                                <small>Translation On</small>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <button class="rounded-pill btn custom-btn">Show reservation</button>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history p-3">
                                <div class="text-center">
                                    <p><b>Today</b></p>
                                    <p class="d-none">we may analyze messages for safty, support,product enhanment,or
                                        other
                                        purposes. <a href="#">Learn more</a> <br> your inquiery for 1 guest on Nov 2-7
                                        has
                                        been sent</p>
                                </div>
                                <ul class="m-b-0" id="chat-history">

                                    <!-- Messages will be loaded here dynamically -->
                                </ul>
                            </div>
                            <div class="chat-message clearfix">
                                <div class="c13jn385 atm_j3_odhztx atm_gi_xjk4d9 atm_9s_1txwivl atm_ar_vrvcex atm_fc_1h6ojuz atm_h_1h6ojuz i1uzw9il atm_l8_19rj6ls dir dir-ltr" data-testid="host-response-time"><div class="iimwnfu atm_7l_fwwoab atm_ll_1y44olf atm_e2_1fwxnve dir dir-ltr" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 12px; width: 12px; fill: currentcolor;"><path d="M16 1a15 15 0 1 0 0 30 15 15 0 0 0 0-30zm7.9 22.95-9.53-5.5a1.5 1.5 0 0 1-.74-1.15l-.01-.14v-11h3v10.13l8.77 5.07-1.5 2.6z"></path></svg></div><span class="nveqitn atm_vv_1q9ccgz tl9s3i4 atm_c8_1uc0753 atm_g3_lonqig atm_fr_r7vles atm_7l_1he744i dir dir-ltr">Typical response time: 2 hours</span></div>
                                <div class="input-group mb-0">
                                    <input type="hidden" id="sender_id" name="sender_id"
                                        value="<?= htmlspecialchars($offer['id']) ?>"> <!-- Offer ID -->
                                    <input type="hidden" id="receiver_id" name="receiver_id"
                                        value="<?= htmlspecialchars($fetch_host['id']) ?>"> <!-- Host ID -->

                                    <input type="hidden" type="text" class="form-control" id="name" name="name"
                                        value="<?= htmlspecialchars($offer['guest_username']) ?>"
                                        placeholder="Enter text here...">
                                    <input type="hidden" type="text" class="form-control" id="status" name="status"
                                        value="user" placeholder="Enter text here...">
                                    <textarea type="text" class="form-control newclass22" id="message" name="message"
                                        placeholder="Type a message"style=""></textarea>
                                    <div class="input-group-append">
                                    <button class="btnki" id="sendMessage"
    style="display: none; border:none !important;">
    <span class="">
        <svg role="presentation" aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg"
            style="height: 24px; width: 24px; display: block; fill: currentcolor;">
            <circle cx="12" cy="12" r="12"></circle>
            <g clip-path="url(#clipeSendIcon157)">
                <path transform="scale(1)" fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.2929 6.29289C11.6834 5.90237 12.3166 5.90237 12.7071 6.29289L16.7071 10.2929C17.0976 10.6834 17.0976 11.3166 16.7071 11.7071C16.3166 12.0976 15.6834 12.0976 15.2929 11.7071L13 9.41421V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V9.41421L8.70711 11.7071C8.31658 12.0976 7.68342 12.0976 7.29289 11.7071C6.90237 11.3166 6.90237 10.6834 7.29289 10.2929L11.2929 6.29289Z"
                    fill="white"></path>
            </g>
            <defs>
                <clipPath id="clipeSendIcon157">
                    <rect width="12" height="12" fill="white" transform="translate(6 6)"></rect>
                </clipPath>
            </defs>
        </svg>
    </span>
</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="text-right">
                    <a href="view?id=<?= htmlspecialchars($id) ?>" class="btn btn custom-btn">Back</a>
                </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- merejavascript -->
    <script>
       const messageInput = document.getElementById('message');
const sendButton = document.getElementById('sendMessage');

// Add an event listener to the input field to monitor changes
messageInput.addEventListener('input', function () {
    // Check if the input field has any value (text)
    if (messageInput.value.trim() !== '') {
        sendButton.style.display = 'inline-block'; // Show the button if there's text
    } else {
        sendButton.style.display = 'none'; // Hide the button if the input is empty
    }
});



        $(document).ready(function () {
            $('#search-icon').on('click', function () {
                // Expand the search input
                $('#search-input').toggleClass('expanded');

                // Hide header and search icon
                $('#header-text, #search-icon').hide();

                // Show cancel button and search icon inside the input
                $('#cancel-icon').show();
                $('.new2').removeClass('d-none'); // Show the input search icon
            });

            $('#cancel-icon').on('click', function () {
                // Collapse the search input
                $('#search-input').toggleClass('expanded');

                // Show header and search icon
                $('#header-text, #search-icon').show();

                // Hide cancel button and input search icon
                $('#cancel-icon').hide();
                $('.new2').addClass('d-none'); // Hide the input search icon
                $('.new1').val(''); // Clear input field
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var senderId = $('#sender_id').val();
            var receiverId = $('#receiver_id').val();

            function loadMessages() {
                // Load previous messages
                $.ajax({
                    url: 'get_messages.php',
                    method: 'GET',
                    data: {
                        sender_id: senderId,
                        receiver_id: receiverId
                    },
                    success: function (response) {
                        var messages = JSON.parse(response);
                        $('#chat-history').empty(); // Clear existing messages

                        // Check if messages are empty
                        if (messages.length === 0) {
                            $('#chat-history').append('<li class="clearfix"><div class="msg"><div class="message no-message">No messages found.</div></div></li>');
                            $('.status').html('<i class="fa fa-circle offline"></i> No messages yet');
                        } else {
                            var lastMessageTime = null; // To store the timestamp of the last message

                            messages.forEach(function (message) {
                                // Determine the class based on the sender
                                var messageClass = (message.sender_id == senderId) ? 'my-message' : 'other-message';
                                var messageTimeClass = (message.sender_id == senderId) ? 'message-data' : 'message-data2'; // Changed the time class dynamically

                                // Convert the timestamp into a readable time format
                                var messageTime = new Date(message.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                                // Append each message with the time displayed
                                $('#chat-history').append(
                                    '<li class="clearfix">' +
                                    '<div class="' + messageTimeClass + '">' + // Use the dynamic messageTimeClass here
                                    '<span class="message-data-time">' + messageTime + '</span>' +
                                    '</div>' +
                                    '<div class="message ' + messageClass + '">' +
                                    message.message +
                                    '</div>' +
                                    '</li>'
                                );

                                // Update lastMessageTime to the latest message timestamp
                                lastMessageTime = message.timestamp;
                            });


                            // If there's a last message time, update the status with the time
                            if (lastMessageTime) {
                                var lastMessageDate = new Date(lastMessageTime);
                                var lastMessageFormatted = lastMessageDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                                $('.status').html('<i class="fa fa-circle online"style=""></i> Last message sent at ' + lastMessageFormatted);
                            }
                        }
                    },
                    error: function () {
                        alert('Could not load messages. Please try again.');
                    }
                });
            }

            loadMessages();

            // Set an interval to refresh messages every 5 seconds
            setInterval(loadMessages, 5000); // Adjust the interval as needed

            // Existing code for sending message
            $('#sendMessage').click(function () {
                var message = $('#message').val();
                var senderId = $('#sender_id').val();
                var receiverId = $('#receiver_id').val();
                var name = $('#name').val();
                var status = $('#status').val();

                if (message.trim() !== '') {
                    $.ajax({
                        url: 'send_message.php',
                        method: 'POST',
                        data: {
                            sender_id: senderId,
                            receiver_id: receiverId,
                            message: message,
                            name: name,
                            status: status
                        },
                        success: function (response) {
                            // Add message to chat history
                            $('#chat-history').append('<li class="clearfix"><div class="message-data"><span class="message-data-time">' + new Date().toLocaleTimeString() + '</span></div><div class="message my-message">' + message + '</div></li>');
                            $('#message').val(''); // Clear input field
                        },
                        error: function () {
                            alert('Message could not be sent. Please try again.');
                        }
                    });
                } else {
                    alert('Please enter a message.');
                }
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css"> 
        .dir-ltr.atm_ll_119q328__jx8car[class][class] {
    padding: 0;
}
.card,.atm_9s_1ulexfb__qky54b[class] {
    margin-top: 15px !important;
}

.atm_e2_u29brm {
    height: 88px !important;
    top: -7px !important;
}
.dir-ltr.atm_ll_119q328__jx8car[class][class] {
    max-width: 97%;
}
.lloffz7.atm_h_1h6ojuz.atm_9s_1txwivl.atm_e2_1osqo2v.atm_mk_h2mmj6.atm_wq_kb7nvz.dir.dir-ltr {
    font-weight: 500;
}
html{
    scrollbar-width:none !important;
}
.my-message {
    font-size: 16px !important;
    background:#3f3f3f !important;
    padding:15px !important;
    margin-right:90px !important;
}

.message-data-time {
    margin-right: 90px;
    font-size:12px;
    color: #6a6a6a !important;
}

.chat-app .chat {
    margin-left: 565px;
}
.chat-app .people-list{
    left:4.4%;
    width:420px;
}

button.rounded-pill.btn.custom-btn {
    display: none;
}
.chat-list {
    background: #F7F7F7;
    border-radius: 10px;
    margin-left: -8px;
    padding: 10px;
    margin-top: -22px;
}

.chat-app .people-list {
    margin-top: -17px;
    padding: 0 !important;
}
.chat-message.clearfix {
    margin-bottom: 20px;
}
.chat-about p b {
    font-size: 1.3rem;
}
img.chahht {
    margin-left: 48px;
}

.chat-about {
    margin-left: 9px;
}
.newclass22 {
    margin:0px 58px !important;
}

.profile-container .background-img {
    width: 21%;
    height: 57px;
    object-fit: cover;
    border-radius: 3px;
}

img.profile-img {
    height: 42px !important;
}

.profile-container .profile-img {
    left: 30px !important;
    bottom: -14px;
}

button#header-text {
    margin-left: 5px;
    margin-right: -25px;
}

div#plist .d-flex1 {
    margin-bottom: 4px;
}

.people-list .about{
    padding-left:87px !important;
}
.col-lg-6.ml-3 .chat-about {
    margin-top: -7px;
}

.google_img {
    max-width: 7%;
    opacity:0.6;
}
.people-list .chat-list li .name{
    font-weight:400;
}

.dir.atm_gi_xjk4d9 {
    margin-bottom: 8px;
}

.text-center p b {
    font-weight: 400;
}
    </style>
</body>

</html>