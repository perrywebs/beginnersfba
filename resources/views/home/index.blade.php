@extends('layouts.home')

@section('content')
    <div id="content" role="main">

        {{-- HERO SECTION --}}
        <style>
            .hero-section {
                /* background: linear-gradient(135deg, #00559d 0%, #003d6e 100%); */
                color: #fff;
                padding: 60px 0 50px;
                text-align: center;
            }

            .hero-section h1 {
                font-family: 'Raleway', sans-serif;
                font-size: 2.4rem;
                font-weight: 700;
                margin-bottom: 12px;
            }

            .hero-section .hero-subtitle {
                font-size: 1.1rem;
                opacity: 0.9;
                max-width: 600px;
                margin: 0 auto 8px;
                line-height: 1.5;
                color: #676767;
            }

            .hero-section .hero-tagline {
                font-size: 1rem;
                opacity: 0.8;
                color: #676767;
            }

            .hero-section .hero-tagline span {
                font-style: italic;
                text-decoration: underline;
            }

            /* .hero-divider {
                width: 60px;
                height: 3px;
                background: rgba(255, 255, 255, 0.4);
                margin: 18px auto 0;
                border-radius: 2px;
            } */

            @media (max-width: 768px) {
                .hero-section {
                    padding: 40px 20px 35px;
                }

                .hero-section h1 {
                    font-size: 1.7rem;
                }

                .hero-section .hero-subtitle {
                    font-size: 1rem;
                }
            }
        </style>

        <section class="hero-section">
            <div class="container">
                <h1>Sellers eCommerce Management</h1>
                <p class="hero-subtitle">Your Brand, Our Responsibility</p>
                <p class="hero-tagline">The next big brand can be <span>yours!</span></p>
                {{-- <div class="hero-divider"></div> --}}
            </div>
        </section>

        <style type="text/css">
            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/cyrillic-ext.woff2") format("woff2");
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/cyrillic.woff2") format("woff2");
                unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/greek-ext.woff2") format("woff2");
                unicode-range: U+1F00-1FFF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/greek.woff2") format("woff2");
                unicode-range: U+0370-03FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/vietnamese.woff2") format("woff2");
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/latin-ext.woff2") format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/latin.woff2") format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/cyrillic-ext2.woff2") format("woff2");
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/cyrillic2.woff2") format("woff2");
                unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/greek-ext2.woff2") format("woff2");
                unicode-range: U+1F00-1FFF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/greek2.woff2") format("woff2");
                unicode-range: U+0370-03FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/vietnamese2.woff2") format("woff2");
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/latin-ext2.woff2") format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/latin2.woff2") format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            .ti-widget.ti-trus {
                width: 100%;
                display: block;
                overflow: hidden;
                text-align: left;
                direction: ltr;
                box-sizing: border-box;
            }

            .ti-widget.ti-trus * {
                box-sizing: border-box;
            }

            /* .ti-widget.ti-trus:before {
                    display: none !important;
                } */

            .ti-widget.ti-trus a {
                text-decoration: underline !important;
                color: inherit;
            }

            .ti-widget.ti-trus a.ti-header {
                text-decoration: none !important;
            }

            .ti-widget.ti-trus a[href="#"],
            .ti-widget.ti-trus a:not([href]) {
                text-decoration: none !important;
                pointer-events: none;
            }

            .ti-widget.ti-trus strong,
            .ti-widget.ti-trus strong * {
                font-weight: bold !important;
            }

            .ti-widget.ti-trus .ti-widget-container,
            .ti-widget.ti-trus .ti-widget-container * {
                font-family: "Open sans";
                font-size: 14px;
                line-height: 1.4em;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .ti-widget.ti-trus .ti-widget-container {
                color: #000000;
                margin-bottom: 15px;
            }

            .ti-widget.ti-trus .ti-widget-container .ti-name {
                font-weight: bold;
                font-size: 14px;
                overflow: hidden;
                padding-right: 25px;
                white-space: nowrap;
                text-overflow: ellipsis;
                color: #000000;
                margin-bottom: 2px;
            }

            .ti-widget.ti-trus .ti-widget-container .ti-date {
                color: #000000;
                opacity: 0.5;
                font-size: 11.2px !important;
            }

            .ti-widget.ti-trus .ti-profile-img {
                margin: 0 15px 0 0 !important;
            }

            .ti-widget.ti-trus .ti-profile-img img {
                width: 40px !important;
                height: 40px !important;
                padding: 0px !important;
                display: block;
                border-radius: 30px;
                min-width: initial !important;
                max-width: initial !important;
                object-fit: cover;
                object-position: top;
            }

            .ti-widget.ti-trus .ti-profile-img-sprite {
                display: inline-block;
                float: left;
                background: white;
                background-repeat: no-repeat;
                width: 40px;
                height: 40px;
                border-radius: 30px;
            }

            .ti-widget.ti-trus .ti-profile-details {
                -webkit-box-flex: 1;
                -ms-flex: 1;
                flex: 1;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                text-align: left;
            }

            .ti-widget.ti-trus .ti-stars {
                margin-top: 3px;
                white-space: nowrap;
            }

            .ti-widget.ti-trus .ti-star {
                width: 16px;
                height: 16px;
                display: inline-block;
                margin-right: 1px;
                background-size: contain;
                background-repeat: no-repeat;
            }

            .ti-widget.ti-trus .ti-star:before,
            .ti-widget.ti-trus .ti-star:after {
                content: none !important;
            }

            .ti-widget.ti-trus .star-lg .ti-star {
                width: 30px;
                height: 30px;
            }

            /* .ti-widget.ti-trus .ti-d-none {
                    display: none !important;
                } */

            .ti-widget.ti-trus.ti-icon-size1 .ti-review-header:after {
                width: 25px;
                height: 25px;
            }

            .ti-widget.ti-trus.ti-icon-size1 .ti-widget-container .ti-name {
                padding-left: 30px;
            }

            .ti-widget.ti-trus.ti-icon-size2 .ti-review-header:after {
                width: 30px;
                height: 30px;
            }

            .ti-widget.ti-trus.ti-icon-size2 .ti-widget-container .ti-name {
                padding-left: 35px;
            }

            .ti-widget.ti-trus .ti-rating-text,
            .ti-widget.ti-trus .ti-rating-text strong,
            .ti-widget.ti-trus .ti-rating-text strong a,
            .ti-widget.ti-trus .ti-rating-text strong span,
            .ti-widget.ti-trus .ti-rating-text span strong,
            .ti-widget.ti-trus .ti-rating-text span,
            .ti-widget.ti-trus .ti-footer,
            .ti-widget.ti-trus .ti-footer strong,
            .ti-widget.ti-trus .ti-footer span,
            .ti-widget.ti-trus .ti-footer strong a {
                font-size: 14px;
                color: #000000;
            }

            .ti-widget.ti-trus .ti-large-logo {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                height: 50px;
                margin-bottom: 0 !important;
            }

            .ti-widget.ti-trus .ti-large-logo .ti-v-center {
                -ms-flex-item-align: center !important;
                align-self: center !important;
                text-align: center;
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }

            .ti-widget.ti-trus .ti-large-logo img {
                margin: auto;
                padding: 0 !important;
                display: block !important;
                position: relative;
            }

            .ti-widget.ti-trus .nowrap {
                white-space: nowrap;
                display: inline-block;
                margin: 0 2px;
            }

            .ti-widget.ti-trus .nowrap:first-of-type {
                margin-left: 0;
            }

            .ti-widget.ti-trus .nowrap:last-of-type {
                margin-right: 0;
            }

            .ti-widget.ti-trus .ti-reviews-container-wrapper [class$="inner"]>.ti-stars {
                margin-bottom: 6px;
                margin-top: 15px;
            }

            .ti-widget.ti-trus .ti-reviews-container-wrapper {
                overflow: hidden;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                padding-top: 5px;
            }

            .ti-widget.ti-trus .ti-col-1 .ti-column {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }

            .ti-widget.ti-trus .ti-col-2 .ti-column {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }

            .ti-widget.ti-trus .ti-col-3 .ti-column {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .ti-widget.ti-trus .ti-col-4 .ti-column {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }

            .ti-widget.ti-trus .ti-col-5 .ti-column {
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
            }

            .ti-widget.ti-trus .ti-col-6 .ti-column {
                -ms-flex: 0 0 16.666666%;
                flex: 0 0 16.666666%;
                max-width: 16.666666%;
            }

            .ti-widget.ti-trus .ti-reviews-container {
                position: relative;
            }

            /* .ti-widget.ti-trus .ti-read-more {
                    display: none;
                } */

            .ti-widget.ti-trus .ti-review-item {
                padding: 0 8px;
                transition: transform 300ms ease-out;
            }

            .ti-widget.ti-trus .ti-review-item .ti-read-more {
                font-weight: bold;
                white-space: nowrap;
                font-size: 11.7px;
                color: #000000;
                text-decoration: none !important;
                display: block;
                text-align: center;
                padding: 7px 0 0;
                text-align: left;
                transition: opacity 300ms ease-out;
            }

            .ti-widget.ti-trus .ti-review-item .ti-read-more:hover {
                opacity: 0.5;
            }

            .ti-widget.ti-trus .ti-review-item [class$="inner"] {
                border-radius: 4px;
            }

            .ti-widget.ti-trus .ti-review-item>[class$="inner"] {
                border-style: solid !important;
                border-color: #dddddd !important;
                background: #ffffff !important;
                border-radius: 0px !important;
                padding: 15px !important;
                margin: 0 !important;
                display: block;
            }

            .ti-widget.ti-trus .ti-review-item .ti-polarity .ti-polarity-icon {
                position: relative;
                margin: 0;
                text-indent: 3px;
                display: inline-block;
                width: 15px;
                height: 15px;
            }

            .ti-widget.ti-trus .ti-review-item .ti-recommendation .ti-recommendation-icon {
                position: relative;
                margin: 0 5px;
                margin-bottom: -3px;
                text-indent: 3px;
                display: inline-block;
                width: 15px;
                height: 15px;
            }

            .ti-widget.ti-trus .ti-review-item .ti-recommendation .ti-recommendation-icon:first-child {
                margin-left: 0;
            }

            .ti-widget.ti-trus .ti-review-item .ti-recommendation .ti-recommendation-title {
                font-weight: 700;
                font-size: 13px !important;
                opacity: 0.8;
                position: relative;
                top: -1px;
            }

            /* .ti-widget.ti-trus .ti-review-item .ti-recommendation+.ti-dummy-stars {
                    display: none;
                } */

            .ti-widget.ti-trus .ti-review-content {
                line-height: 18.85px !important;
                font-size: 13px;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 4;
                overflow: hidden !important;
            }

            .ti-widget.ti-trus .ti-review-content .ti-stars {
                margin-bottom: 5px;
            }

            .ti-widget.ti-trus .ti-review-content strong {
                font-size: inherit;
                color: inherit;
            }

            .ti-widget.ti-trus .ti-review-header {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                position: relative;
            }

            .ti-widget.ti-trus .ti-review-header:after {
                content: "";
                display: block;
                width: 20px;
                height: 20px;
                position: absolute;
                right: 0px;
                background-repeat: no-repeat;
                background-position: center center;
            }

            .ti-widget.ti-trus .ti-highlight {
                padding: 1px 2px;
                margin: 0;
                box-decoration-break: clone;
                -webkit-box-decoration-break: clone;
                border-radius: 1px;
                -webkit-border-radius: 1px;
                -moz-border-radius: 1px;
                background-color: transparent;
                background-image: linear-gradient(#fbe049, #fbe049);
                background-size: 100% 19px;
                background-position: bottom;
                background-repeat: no-repeat;
                color: #000 !important;
            }

            @media (max-width: 479px) {
                .ti-widget.ti-trus .ti-reviews-container-wrapper {
                    margin-right: 0;
                    margin-left: 0;
                }

                .ti-widget.ti-trus .ti-review-item {
                    padding: 0;
                }
            }

            @media (min-width: 480px) {
                .ti-widget.ti-trus .ti-review-item:hover {
                    -webkit-transform: translate(0, -5px);
                    -ms-transform: translate(0, -5px);
                    transform: translate(0, -5px);
                }
            }

            .ti-widget.ti-trus ::-webkit-scrollbar {
                width: 4px;
                border-radius: 3px;
            }

            .ti-widget.ti-trus ::-webkit-scrollbar-track {
                background: rgba(85, 85, 85, 0.1);
            }

            .ti-widget.ti-trus ::-webkit-scrollbar-thumb {
                background: rgba(85, 85, 85, 0.6);
            }

            .ti-widget.ti-trus ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            .ti-verified-review {
                display: inline-block;
                background: url("homeAssets/assets/icon/trustindex-verified-icon.svg");
                background-size: contain;
                width: 15px;
                height: 15px;
                margin-left: 7px;
                position: relative;
                z-index: 2;
            }

            .ti-verified-review .ti-verified-tooltip {
                color: #fff !important;
                background-color: #3b404b !important;
                padding: 0 10px;
                border-radius: 4px;
                font-size: 11px !important;
                line-height: 22px !important;
                font-weight: 500;
                display: inline-block;
                position: absolute;
                left: 0;
                margin-left: 25px;
                top: -4px;
                white-space: nowrap;
                opacity: 0;
                transition: all 0.3s ease-in-out;
            }

            .ti-verified-review .ti-verified-tooltip:before {
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 5px 5px 5px 0;
                border-color: transparent #3b404b transparent transparent;
                content: "";
                position: absolute;
                left: -5px;
                top: 50%;
                margin-top: -5px;
            }

            .ti-verified-review:hover .ti-verified-tooltip {
                opacity: 1;
                margin-left: 20px;
            }

            .ti-recommendation+.ti-verified-review {
                top: 2px;
            }

            .ti-widget .source-Trustpilot .ti-review-header:after {
                background-image: url("homeAssets/assets/platform/Trustpilot/icon.svg");
                background-size: 100% 100%;
            }

            .ti-widget .source-Trustpilot .ti-star.f {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/f.svg");
            }

            .ti-widget .source-Trustpilot .ti-star.e {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/e.svg");
            }

            .ti-widget .source-Trustpilot .ti-star.h {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/h.svg");
            }

            .ti-widget .source-Trustpilot .ti-small-logo img {
                width: 65px !important;
                height: 16px !important;
                top: 2px;
            }

            .ti-widget .star-lg .ti-star {
                width: 30px;
                height: 30px;
            }

            .ti-widget .ti-header .ti-star {
                width: 20px;
                height: 20px;
            }

            .ti-widget.ti-trus.ti-no-logo .ti-review-header:after {
                background: none !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.f {
                background-image: url("homeAssets/assets/platform/Trustindex/star/f.svg") !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.e {
                background-image: url("homeAssets/assets/platform/Trustindex/star/e.svg") !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.h {
                background-image: url("homeAssets/assets/platform/Trustindex/star/h.svg") !important;
            }

            /* .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-recommendation {
                    display: none;
                } */

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-recommendation+.ti-dummy-stars {
                display: inline;
            }

            .ti-widget.ti-trus {
                overflow: visible !important;
            }

            .ti-widget.ti-trus .ti-review-item>.ti-inner {
                border-top-width: 1px !important;
                border-bottom-width: 1px !important;
                border-left-width: 1px !important;
                border-right-width: 1px !important;
                background-color: white !important;
                backdrop-filter: blur(0px);
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/cyrillic-ext.woff2") format("woff2");
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/cyrillic.woff2") format("woff2");
                unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/greek-ext.woff2") format("woff2");
                unicode-range: U+1F00-1FFF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/greek.woff2") format("woff2");
                unicode-range: U+0370-03FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/vietnamese.woff2") format("woff2");
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/latin-ext.woff2") format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local("Open Sans Regular"), local("OpenSans-Regular"), url("homeAssets/assets/fonts/opensans/latin.woff2") format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/cyrillic-ext2.woff2") format("woff2");
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/cyrillic2.woff2") format("woff2");
                unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/greek-ext2.woff2") format("woff2");
                unicode-range: U+1F00-1FFF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/greek2.woff2") format("woff2");
                unicode-range: U+0370-03FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/vietnamese2.woff2") format("woff2");
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/latin-ext2.woff2") format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: "Open Sans";
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local("Open Sans Bold"), local("OpenSans-Bold"), url("homeAssets/assets/fonts/opensans/latin2.woff2") format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            .ti-widget.ti-trus {
                width: 100%;
                display: block;
                direction: ltr;
                overflow: visible;
                text-align: center;
                color: #000000;
                text-align: center;
            }

            .ti-widget.ti-trus .ti-widget-container {
                margin: auto;
                display: inline-block;
            }

            .ti-widget.ti-trus a {
                text-decoration: underline !important;
                transition: all 300ms ease-out;
                color: inherit;
            }

            .ti-widget.ti-trus a.ti-header {
                text-decoration: none !important;
            }

            .ti-widget.ti-trus a[href="#"],
            .ti-widget.ti-trus a:not([href]) {
                text-decoration: none !important;
                pointer-events: none;
            }

            .ti-widget.ti-trus:before,
            .ti-widget.ti-trus:after {
                content: none !important;
            }

            .ti-widget.ti-trus strong,
            .ti-widget.ti-trus strong * {
                font-weight: 700 !important;
                font-weight: bold !important;
            }

            .ti-widget.ti-trus .ti-widget-container,
            .ti-widget.ti-trus .ti-widget-container * {
                font-family: "Open sans";
                font-size: 13px;
                line-height: 1.4em;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .ti-widget.ti-trus .ti-header {
                display: -ms-flexbox;
                display: flex;
                background-color: #ffffff;
                border: 0 solid #dddddd;
                border-radius: 0px;
                padding: 15px;
                transition: all 0.3s ease-in-out;
                text-align: center;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                color: #000000;
                -ms-flex-pack: center !important;
                justify-content: center !important;
            }

            @media (min-width: 480px) {
                .ti-widget.ti-trus .ti-header:hover {
                    -webkit-transform: translate(0px, -5px);
                    -ms-transform: translate(0px, -5px);
                    transform: translate(0px, -5px);
                }
            }

            .ti-widget.ti-trus .ti-header .nowrap {
                white-space: nowrap;
                display: inline-block;
                margin: 0 3px;
                color: #000000;
            }

            .ti-widget.ti-trus .ti-header span,
            .ti-widget.ti-trus .ti-header strong {
                font-size: 13px;
                color: #000000 !important;
            }

            .ti-widget.ti-trus .ti-header span {
                height: 20px;
            }

            .ti-widget.ti-trus .ti-header .ti-stars {
                margin: 1px 3px 0px 3px;
                display: inline-block;
            }

            .ti-widget.ti-trus .ti-header .ti-stars .ti-star {
                width: 16px;
                height: 16px;
                display: inline-block;
                margin-right: 1px;
                background-repeat: no-repeat;
            }

            .ti-widget.ti-trus .ti-mob-row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                white-space: nowrap;
            }

            /* .ti-widget.ti-trus .ti-mob-row p:empty {
                    display: none;
                } */

            .ti-widget.ti-trus a.ti-header:hover {
                background-color: #f2f2f2;
                border-color: #d0d0d0;
            }

            .ti-widget.ti-trus .ti-small-logo {
                vertical-align: middle;
                display: inline;
                line-height: 1em;
            }

            .ti-widget.ti-trus .ti-small-logo img {
                display: inline;
                width: auto;
                position: relative;
                margin-left: 3px;
            }

            .ti-widget.ti-trus .ti-separator:before {
                margin-left: 5px;
                margin-right: 5px;
                position: relative;
                top: -1px;
                display: inline-block;
                font-weight: normal;
                content: " | ";
                height: 15px;
                opacity: 0.6;
            }

            .ti-widget .source-Trustpilot .ti-review-header:after {
                background-image: url("homeAssets/assets/platform/Trustpilot/icon.svg");
                background-size: 100% 100%;
            }

            .ti-widget .source-Trustpilot .ti-star.f {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/f.svg");
            }

            .ti-widget .source-Trustpilot .ti-star.e {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/e.svg");
            }

            .ti-widget .source-Trustpilot .ti-star.h {
                background-image: url("homeAssets/assets/platform/Trustpilot/star/h.svg");
            }

            .ti-widget .source-Trustpilot .ti-small-logo img {
                width: 65px !important;
                height: 16px !important;
                top: 2px;
            }

            .ti-widget .star-lg .ti-star {
                width: 30px;
                height: 30px;
            }

            .ti-widget .ti-header .ti-star {
                width: 20px;
                height: 20px;
            }

            .ti-widget.ti-trus.ti-no-logo .ti-review-header:after {
                background: none !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.f {
                background-image: url("homeAssets/assets/platform/Trustindex/star/f.svg") !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.e {
                background-image: url("homeAssets/assets/platform/Trustindex/star/e.svg") !important;
            }

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-star.h {
                background-image: url("homeAssets/assets/platform/Trustindex/star/h.svg") !important;
            }

            /* .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-recommendation {
                    display: none;
                } */

            .ti-widget.ti-trus.ti-no-stars .ti-review-item .ti-recommendation+.ti-dummy-stars {
                display: inline;
            }

            .ti-widget.ti-trus {
                overflow: visible !important;
            }

            .ti-widget.ti-trus .ti-review-item>.ti-inner {
                border-top-width: 1px !important;
                border-bottom-width: 1px !important;
                border-left-width: 1px !important;
                border-right-width: 1px !important;
                background-color: white !important;
                backdrop-filter: blur(0px);
            }

            .ti-widget.ti-trus {
                text-align: left !important;
            }

            .ti-widget.ti-trus .ti-header {
                background-color: transparent !important;
                border-color: transparent !important;
            }

            .ti-widget.ti-trus .ti-header strong,
            .ti-widget.ti-trus .ti-header span {
                color: #000000 !important;
                font-size: 13px !important;
            }

            .ti-widget.ti-trus .ti-reviews-container {
                margin-left: -8px;
                margin-right: -8px;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }

            .ti-widget.ti-trus .ti-reviews-container-wrapper {
                margin: 0px !important;
                overflow: visible;
            }

            .ti-widget.ti-trus .ti-review-item {
                padding: 8px;
            }

            .ti-widget.ti-trus .ti-review-content {
                overflow: inherit !important;
            }

            .ti-widget.ti-trus .ti-review-content .ti-inner {
                padding: 0px;
                font-size: 13px;
                line-height: 18.85px;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                max-height: 75.4px !important;
                -webkit-line-clamp: 4 !important;
                overflow: hidden !important;
            }

            @media (max-width: 479px) {
                .ti-widget.ti-trus .ti-review-item {
                    padding: 5px 0;
                }
            }
        </style>
        <div class="container section-title-container hidden">
            <h3 class="section-title section-title-center"><b></b><span class="section-title-main">Our
                    Clients</span><b></b></h3>
        </div>

        {{-- HERO VIDEO SECTION --}}
        <style>
            .hero-video-section {
                padding: 50px 0 40px;
                background: #fff;
            }

            .hero-video-wrapper {
                max-width: 900px;
                margin: 0 auto;
                text-align: center;
            }

            .hero-video-label {
                font-family: 'Raleway', sans-serif;
                font-size: 1.4rem;
                font-weight: 700;
                color: #1a1a1a;
                margin-bottom: 6px;
            }

            .hero-video-sublabel {
                font-size: 0.95rem;
                color: #666;
                margin-bottom: 24px;
            }

            .hero-video-container {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12);
                background: #000;
            }

            .hero-video-container video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: contain;
                background: #000;
            }

            .hero-video-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                cursor: pointer;
                transition: background 0.3s;
                z-index: 2;
            }

            .hero-video-overlay:hover {
                background: rgba(0, 0, 0, 0.4);
            }

            .hero-video-overlay.hidden {
                display: none;
            }

            .hero-play-btn {
                width: 80px;
                height: 80px;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s, background 0.3s;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            }

            .hero-play-btn:hover {
                transform: scale(1.1);
                background: #fff;
            }

            .hero-play-btn i {
                font-size: 2rem;
                color: #00559d;
                margin-left: 5px;
            }

            .hero-play-label {
                color: #fff;
                font-size: 0.85rem;
                font-weight: 600;
                margin-top: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
                text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
            }

            @media (max-width: 768px) {
                .hero-video-section {
                    padding: 30px 16px;
                }

                .hero-video-container {
                    border-radius: 10px;
                }

                .hero-play-btn {
                    width: 64px;
                    height: 64px;
                    border-width: 2px;
                }

                .hero-play-btn i {
                    font-size: 1.7rem;
                }

                .hero-video-label {
                    font-size: 1.2rem;
                }
            }
        </style>

        <section class="hero-video-section">
            <div class="hero-video-wrapper">
                <h2 class="hero-video-label">See How It Works</h2>
                <p class="hero-video-sublabel">Watch how our marketplace helps sellers grow their business</p>

                <div class="hero-video-container">
                    <video id="heroVideo" poster="{{ asset('homeAssets/Amazon-logo.jpg') }}" preload="metadata" playsinline webkit-playsinline>
                        <source
                            src="{{ asset('homeAssets/What%20is%20Fulfillment%20by%20Amazon%20%28FBA%29__Full-HD.mp4') }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="hero-video-overlay" id="videoOverlay" onclick="playHeroVideo()" role="button" tabindex="0" onkeypress="if(event.key==='Enter')playHeroVideo()">
                        <div class="hero-play-btn">
                            <i class="bi bi-play-fill"></i>
                        </div>
                        <span class="hero-play-label">Watch Video</span>
                    </div>
                </div>
            </div>
        </section>
        {{-- END HERO VIDEO SECTION --}}

        {{-- PROMOTED PRODUCTS SECTION --}}
        @if (isset($promotedProducts) && $promotedProducts->count() > 0)
            <section class="section" id="promoted-products-section" style="background: #f4f6f9; padding: 60px 0;">
                <div class="container">
                    <div style="text-align: center; margin-bottom: 40px;">
                        <h2
                            style="font-family: 'Raleway', sans-serif; font-weight: 700; font-size: 2rem; color: #1a1a1a; margin-bottom: 8px;">
                            Discover Products
                        </h2>
                        <p style="color: #666; font-size: 1rem; max-width: 600px; margin: 0 auto;">
                            Explore featured products from our sellers. Browse quality items handpicked for you.
                        </p>
                        <div
                            style="width: 60px; height: 3px; background: #00559d; margin: 15px auto 0; border-radius: 2px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;" class="promoted-grid">
                        @foreach ($promotedProducts as $product)
                            <a href="{{ route('product.show', $product->slug) }}"
                                style="text-decoration: none; color: inherit;">
                                <div style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; height: 100%; display: flex; flex-direction: column;"
                                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.12)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'">
                                    <div
                                        style="position: relative; padding-top: 100%; background: #f9f9f9; overflow: hidden;">
                                        @php
                                            $productPhotos = json_decode($product->photos, true);
                                            $firstPhoto =
                                                !empty($productPhotos) && is_array($productPhotos)
                                                    ? $productPhotos[0]
                                                    : null;
                                        @endphp
                                        @if ($firstPhoto)
                                            <img src="{{ asset('storage/' . $firstPhoto) }}"
                                                alt="{{ $product->productName }}"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                                        @else
                                            <div
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #ccc;">
                                                <i class="bi bi-image" style="font-size: 2.5rem;"></i>
                                            </div>
                                        @endif
                                        @if ($product->soldInStock == 2)
                                            <div
                                                style="position: absolute; top: 10px; left: 10px; background: #dc3545; color: #fff; padding: 3px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: 600;">
                                                Sold Out
                                            </div>
                                        @endif
                                    </div>
                                    <div style="padding: 16px; flex: 1; display: flex; flex-direction: column;">
                                        <h4
                                            style="font-family: 'Raleway', sans-serif; font-weight: 600; font-size: 0.95rem; color: #1a1a1a; margin: 0 0 8px; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $product->productName }}
                                        </h4>
                                        <div style="margin-top: auto;">
                                            <span style="font-size: 1.15rem; font-weight: 700; color: #00559d;">
                                                ${{ number_format($product->price, 2) }}
                                            </span>
                                            <span style="display: block; font-size: 0.75rem; color: #999; margin-top: 4px;">
                                                {{ $product->ecommercePlatform }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <style>
                        .promoted-grid {
                            grid-template-columns: repeat(4, 1fr) !important;
                        }

                        @media (max-width: 992px) {
                            .promoted-grid {
                                grid-template-columns: repeat(3, 1fr) !important;
                            }
                        }

                        @media (max-width: 768px) {
                            .promoted-grid {
                                grid-template-columns: repeat(2, 1fr) !important;
                                gap: 16px !important;
                            }
                        }

                        @media (max-width: 480px) {
                            .promoted-grid {
                                grid-template-columns: repeat(2, 1fr) !important;
                                gap: 12px !important;
                            }
                        }
                    </style>
                </div>
            </section>
        @endif
        {{-- END PROMOTED PRODUCTS SECTION --}}

        <div id="text-356760662" class="text">
            <h1 style="text-align: center;"><strong>RESULTS</strong></h1>
            <div class="gtx-trans" style="position: absolute; left: 26px; top: -4.8875px;">
                <div class="gtx-trans-icon"></div>
            </div>
            <div class="gtx-trans" style="position: absolute; left: 26px; top: -4.8875px;">
                <div class="gtx-trans-icon"></div>
            </div>

            <style>
                #text-356760662 {
                    text-align: center;
                }
            </style>
        </div>

        <div id="gap-80455785" class="gap-element clearfix" style="display: block; height: auto;">
            <style>
                #gap-80455785 {
                    padding-top: 30px;
                }
            </style>
        </div>

        <div id="stack-1686752127" class="stack stack-row justify-center items-center">
            <div class="row large-columns-5 medium-columns-3 small-columns-2">
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt="" ids="1015,1018,1019,1020,1021,1022,1023"
                                    style="none" lightbox="false" columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG-20220226-WA0001.jpg 222w, homeAssets/res-img/IMG-20220226-WA0001.jpg  444w, homeAssets/res-img/IMG-20220226-WA0001.jpg  448w"
                                    data-src="homeAssets/res-img/IMG-20220226-WA0001.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG-20220226-WA0001.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG-20220226-WA0001.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG-20220226-WA0001.jpg 222w, homeAssets/res-img/IMG-20220226-WA0001.jpg 444w, homeAssets/res-img/IMG-20220226-WA0001.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645649512714.jpg 222w, homeAssets/res-img/IMG_1645649512714.jpg  444w, homeAssets/res-img/IMG_1645649512714.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645649512714.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645649512714.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645649512714.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645649512714.jpg 222w, homeAssets/res-img/IMG_1645649512714.jpg 444w, homeAssets/res-img/IMG_1645649512714.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645649528540.jpg 222w, homeAssets/res-img/IMG_1645649528540.jpg  444w, homeAssets/res-img/IMG_1645649528540.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645649528540.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645649528540.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645649528540.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645649528540.jpg 222w, homeAssets/res-img/IMG_1645649528540.jpg 444w, homeAssets/res-img/IMG_1645649528540.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646003483755.jpg 222w, homeAssets/res-img/IMG_1646003483755.jpg  444w, homeAssets/res-img/IMG_1646003483755.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646003483755.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646003483755.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646003483755.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646003483755.jpg 222w, homeAssets/res-img/IMG_1646003483755.jpg 444w, homeAssets/res-img/IMG_1646003483755.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646354554810.jpg 222w, homeAssets/res-img/IMG_1646354554810.jpg  444w, homeAssets/res-img/IMG_1646354554810.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646354554810.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646354554810.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646354554810.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646354554810.jpg 222w, homeAssets/res-img/IMG_1646354554810.jpg 444w, homeAssets/res-img/IMG_1646354554810.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646354557432.jpg 222w, homeAssets/res-img/IMG_1646354557432.jpg  444w, homeAssets/res-img/IMG_1646354557432.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646354557432.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646354557432.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646354557432.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646354557432.jpg 222w, homeAssets/res-img/IMG_1646354557432.jpg 444w, homeAssets/res-img/IMG_1646354557432.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646354559889.jpg 222w, homeAssets/res-img/IMG_1646354559889.jpg  444w, homeAssets/res-img/IMG_1646354559889.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646354559889.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646354559889.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646354559889.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646354559889.jpg 222w, homeAssets/res-img/IMG_1646354559889.jpg 444w, homeAssets/res-img/IMG_1646354559889.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645187573759.jpg 222w, homeAssets/res-img/IMG_1645187573759.jpg  444w, homeAssets/res-img/IMG_1645187573759.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645187573759.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645187573759.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645187573759.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645187573759.jpg 222w, homeAssets/res-img/IMG_1645187573759.jpg 444w, homeAssets/res-img/IMG_1645187573759.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645187606270.jpg 222w, homeAssets/res-img/IMG_1645187606270.jpg  444w, homeAssets/res-img/IMG_1645187606270.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645187606270.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645187606270.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645187606270.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645187606270.jpg 222w, homeAssets/res-img/IMG_1645187606270.jpg 444w, homeAssets/res-img/IMG_1645187606270.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645269775304.jpg 222w, homeAssets/res-img/IMG_1645269775304.jpg  444w, homeAssets/res-img/IMG_1645269775304.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645269775304.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645269775304.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645269775304.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645269775304.jpg 222w, homeAssets/res-img/IMG_1645269775304.jpg 444w, homeAssets/res-img/IMG_1645269775304.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645418624268.jpg 222w, homeAssets/res-img/IMG_1645418624268.jpg  444w, homeAssets/res-img/IMG_1645418624268.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645418624268.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645418624268.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645418624268.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645418624268.jpg 222w, homeAssets/res-img/IMG_1645418624268.jpg 444w, homeAssets/res-img/IMG_1645418624268.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645649512714.jpg 222w, homeAssets/res-img/IMG_1645649512714.jpg  444w, homeAssets/res-img/IMG_1645649512714.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645649512714.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645649512714.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645649512714.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645649512714.jpg 222w, homeAssets/res-img/IMG_1645649512714.jpg 444w, homeAssets/res-img/IMG_1645649512714.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1645666955056.jpg 222w, homeAssets/res-img/IMG_1645666955056.jpg  444w, homeAssets/res-img/IMG_1645666955056.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1645666955056.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1645666955056.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1645666955056.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1645666955056.jpg 222w, homeAssets/res-img/IMG_1645666955056.jpg 444w, homeAssets/res-img/IMG_1645666955056.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646081001238.jpg 222w, homeAssets/res-img/IMG_1646081001238.jpg  444w, homeAssets/res-img/IMG_1646081001238.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646081001238.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646081001238.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646081001238.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646081001238.jpg 222w, homeAssets/res-img/IMG_1646081001238.jpg 444w, homeAssets/res-img/IMG_1646081001238.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-col col">
                    <div class="col-inner">
                        <div class="box has-hover gallery-box box-none">
                            <div class="box-image">
                                <img width="222" height="400" alt=""
                                    ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                    columns="5" columns__sm="2"
                                    data-srcset="homeAssets/res-img/IMG_1646354554810.jpg 222w, homeAssets/res-img/IMG_1646354554810.jpg  444w, homeAssets/res-img/IMG_1646354554810.jpg  448w"
                                    data-src="homeAssets/res-img/IMG_1646354554810.jpg"
                                    data-sizes="(max-width: 222px) 100vw, 222px"
                                    class="attachment-medium size-medium lazyload"
                                    src="homeAssets/res-img/IMG_1646354554810.jpg">
                                <noscript>
                                    <img width="222" height="400" src="homeAssets/res-img/IMG_1646354554810.jpg"
                                        class="attachment-medium size-medium" alt=""
                                        ids="1015,1018,1019,1020,1021,1022,1023" style="none" lightbox="false"
                                        columns="5" columns__sm="2"
                                        srcset="homeAssets/res-img/IMG_1646354554810.jpg 222w, homeAssets/res-img/IMG_1646354554810.jpg 444w, homeAssets/res-img/IMG_1646354554810.jpg 448w"
                                        sizes="(max-width: 222px) 100vw, 222px">
                                </noscript>
                            </div>
                            <div class="box-text text-left">
                                <p>Aidigitalglobalmarketing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                #stack-1686752127>* {
                    --stack-gap: 0rem;
                }
            </style>
        </div>

        <section class="section" id="section_37049962">
            <div class="bg section-bg fill bg-fill bg-loaded"></div>

            <div class="section-content relative">
                <div class="row align-center" id="row-1355412779">
                    <div id="col-53362316" class="col medium-7 small-12 large-7">
                        <div class="col-inner text-center">
                            <div id="gap-2108604991" class="gap-element clearfix" style="display: block; height: auto;">
                                <style>
                                    #gap-2108604991 {
                                        padding-top: 65px;
                                    }
                                </style>
                            </div>

                            <div id="text-1146534698" class="text">
                                <h1 class="uppercase" style="text-align: center;"><span
                                        style="font-size: 140%; color: #212121;" data-darkreader-inline-color="">HAPPY
                                        Clients</span></h1>

                                <style>
                                    #text-1146534698 {
                                        font-size: 0.75rem;
                                        line-height: 0.75;
                                    }
                                </style>
                            </div>

                            <div id="gap-487863203" class="gap-element clearfix" style="display: block; height: auto;">
                                <style>
                                    #gap-487863203 {
                                        padding-top: 30px;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-center" id="row-1521602355">
                    <div id="col-11650317" class="col medium-4 small-9 large-4">
                        <div class="col-inner text-center">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_198558683">
                                <div class="img-inner dark">
                                    <img width="762" height="741" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/ellie-joseph-min.png 762w, homeAssets/wp-content/uploads/2021/05/ellie-joseph-min-411x400.png 411w, homeAssets/wp-content/uploads/2021/05/ellie-joseph-min-600x583.png 600w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/ellie-joseph-min.png"
                                        data-sizes="(max-width: 762px) 100vw, 762px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="762" height="741"
                                            src="homeAssets/wp-content/uploads/2021/05/ellie-joseph-min.png"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/ellie-joseph-min.png         762w,homeAssets/wp-content/uploads/2021/05/ellie-joseph-min-411x400.png,homeAssets/wp-content/uploads/2021/05/ellie-joseph-min-600x583.png 600w"
                                            sizes="(max-width: 762px) 100vw, 762px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_198558683 {
                                        width: 50%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>

                    <div id="col-311807358" class="col medium-4 small-10 large-4">
                        <div class="col-inner text-center">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1779654226">
                                <div class="img-inner dark">
                                    <img width="800" height="800" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-800x800.jpg 800w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-400x400.jpg 400w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-280x280.jpg 280w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-768x768.jpg 768w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-300x300.jpg 300w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-600x600.jpg 600w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-100x100.jpg 100w, homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min.jpg 810w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-800x800.jpg"
                                        data-sizes="(max-width: 800px) 100vw, 800px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="800" height="800"
                                            src="homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-800x800.jpg"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-800x800.jpg 800w,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-400x400.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-280x280.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-768x768.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-300x300.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-600x600.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min-100x100.jpg,homeAssets/wp-content/uploads/2021/05/b75247ee-1129-4427-8a04-cbc6d32177e5-min.jpg    810w"
                                            sizes="(max-width: 800px) 100vw, 800px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_1779654226 {
                                        width: 50%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>

                    <div id="col-633402121" class="col medium-4 small-8 large-4">
                        <div class="col-inner text-center">
                            <div id="gap-1608731095" class="gap-element clearfix" style="display: block; height: auto;">
                                <style>
                                    #gap-1608731095 {
                                        padding-top: 30px;
                                    }
                                </style>
                            </div>

                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1948117973">
                                <div class="img-inner image-cover dark" style="padding-top: 70%;">
                                    <img width="709" height="472" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min.jpg 709w, homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min-601x400.jpg 601w, homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min-600x399.jpg 600w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min.jpg"
                                        data-sizes="(max-width: 709px) 100vw, 709px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="709" height="472"
                                            src="homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min.jpg"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min.jpg         709w,homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min-601x400.jpg,homeAssets/wp-content/uploads/2021/05/d861cbcd-6052-4865-b787-90889ca73f1b-min-600x399.jpg 600w"
                                            sizes="(max-width: 709px) 100vw, 709px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_1948117973 {
                                        width: 62%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>

                    <div id="col-976388035" class="col medium-4 small-11 large-4">
                        <div class="col-inner text-center">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_100992461">
                                <div class="img-inner dark">
                                    <img width="1020" height="377" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/esre-min-1400x518.jpg 1400w, homeAssets/wp-content/uploads/2021/05/esre-min-800x296.jpg 800w, homeAssets/wp-content/uploads/2021/05/esre-min-768x284.jpg 768w, homeAssets/wp-content/uploads/2021/05/esre-min-1536x568.jpg 1536w, homeAssets/wp-content/uploads/2021/05/esre-min-600x222.jpg 600w, homeAssets/wp-content/uploads/2021/05/esre-min.jpg 1600w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/esre-min-1400x518.jpg"
                                        data-sizes="(max-width: 1020px) 100vw, 1020px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="1020" height="377"
                                            src="homeAssets/wp-content/uploads/2021/05/esre-min-1400x518.jpg"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/esre-min-1400x518.jpg 1400w,homeAssets/wp-content/uploads/2021/05/esre-min-800x296.jpg,homeAssets/wp-content/uploads/2021/05/esre-min-768x284.jpg,homeAssets/wp-content/uploads/2021/05/esre-min-1536x568.jpg,homeAssets/wp-content/uploads/2021/05/esre-min-600x222.jpg,homeAssets/wp-content/uploads/2021/05/esre-min.jpg   1600w"
                                            sizes="(max-width: 1020px) 100vw, 1020px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_100992461 {
                                        width: 50%;
                                    }
                                </style>
                            </div>
                        </div>

                        <style>
                            #col-976388035>.col-inner {
                                margin: 0px 0px -40px 0px;
                            }
                        </style>
                    </div>

                    <div id="col-181596399" class="col medium-4 small-10 large-4">
                        <div class="col-inner text-center">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1774524179">
                                <div class="img-inner dark">
                                    <img width="1020" height="789" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1034x800.jpg 1034w, homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-517x400.jpg 517w, homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-768x594.jpg 768w, homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1536x1188.jpg 1536w, homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-600x464.jpg 600w, homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min.jpg 1600w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1034x800.jpg"
                                        data-sizes="(max-width: 1020px) 100vw, 1020px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="1020" height="789"
                                            src="homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1034x800.jpg"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1034x800.jpg  1034w,homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-517x400.jpg,homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-768x594.jpg,homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-1536x1188.jpg,homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min-600x464.jpg,homeAssets/wp-content/uploads/2021/05/73366405-e069-43a6-9cc7-ee408f4eb6ed-min.jpg  1600w"
                                            sizes="(max-width: 1020px) 100vw, 1020px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_1774524179 {
                                        width: 45%;
                                    }
                                </style>
                            </div>
                        </div>

                        <style>
                            #col-181596399>.col-inner {
                                padding: 0px 0px 1px 0px;
                                margin: 0px 0px -30px 0px;
                            }
                        </style>
                    </div>

                    <div id="col-677963045" class="col medium-4 small-9 large-4">
                        <div class="col-inner text-center">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_7032393">
                                <div class="img-inner dark" style="margin: -34px 0px -8px 0px;">
                                    <img width="1020" height="687" alt=""
                                        data-srcset="homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-1188x800.jpg 1188w, homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-594x400.jpg 594w, homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-768x517.jpg 768w, homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-600x404.jpg 600w, homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min.jpg 1421w"
                                        data-src="homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-1188x800.jpg"
                                        data-sizes="(max-width: 1020px) 100vw, 1020px"
                                        class="attachment-large size-large lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img width="1020" height="687"
                                            src="homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-1188x800.jpg"
                                            class="attachment-large size-large" alt=""
                                            srcset="
                                                    homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-1188x800.jpg 1188w,homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-594x400.jpg,homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-768x517.jpg,homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min-600x404.jpg,homeAssets/wp-content/uploads/2021/05/31ec3ae1-462c-454e-a7ce-330c0a46993b-min.jpg          1421w"
                                            sizes="(max-width: 1020px) 100vw, 1020px">
                                    </noscript>
                                </div>

                                <style>
                                    #image_7032393 {
                                        width: 49%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                #section_37049962 {
                    padding-top: 0px;
                    padding-bottom: 0px;
                }
            </style>
        </section>

        <div class="text-center">
            <div class="is-divider divider clearfix" style="max-width: 212px;"></div>
        </div>

        <section class="section info-cards-chess-box" id="section_406798592">
            <div class="bg section-bg fill bg-fill bg-loaded"></div>

            <div class="section-content relative">
                <div class="row row-collapse align-middle" id="row-1283757342">
                    <div id="col-1856390568" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="box has-hover info-cards-chess-box has-hover box-vertical box-text-bottom">
                                <div class="box-image">
                                    <a href="#">
                                        <div class="image-cover" style="padding-top: 75%;">
                                            <img width="300" height="182" alt="BeginnersFba product research"
                                                data-src="homeAssets/wp-content/uploads/2021/02/2426351-scaled-e1640567682836.jpg"
                                                class="attachment- size- lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                            <noscript><img width="300" height="182"
                                                    src="homeAssets/wp-content/uploads/2021/02/2426351-scaled-e1640567682836.jpg"
                                                    class="attachment- size-"
                                                    alt="BeginnersFba product research"></noscript>
                                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0);">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="box-text text-center dark"
                                    style="background-color: rgb(0, 255, 110); padding: 40px 40px 30px 40px;">
                                    <div class="box-text-inner">
                                        <div id="text-1982840340" class="text">
                                            <h2>Hunting High ROI Products</h2>
                                            <div id="gtx-trans" style="position: absolute; left: 271px; top: -4.8875px;">
                                                <div class="gtx-trans-icon"></div>
                                            </div>

                                            <style>
                                                #text-1982840340 {
                                                    color: rgb(0, 0, 0);
                                                }

                                                #text-1982840340>* {
                                                    color: rgb(0, 0, 0);
                                                }
                                            </style>
                                        </div>

                                        <div class="is-divider divider clearfix"
                                            style="max-width: 80%; height: 2px; background-color: rgb(255, 255, 255);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="col-726619370" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="row align-center" id="row-844647946">
                                <div id="col-611176847" class="col medium-10 small-10 large-8">
                                    <div class="col-inner">
                                        <ul>
                                            <li><strong>We find products that are guaranteed to give 50% to 200%
                                                    return on investment. </strong></li>
                                            <li><strong>Product margins are 30% to 60%+. </strong></li>
                                            <li><strong>When finding a product we look for its small size,
                                                    built, sturdiness, material used and certain factors before
                                                    finalizing.</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            #col-726619370>.col-inner {
                                padding: 10% 0px 0px 0px;
                            }
                        </style>
                    </div>
                </div>
                <div class="row row-collapse align-middle" id="row-1121602448">
                    <div id="col-1669303840" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="row align-center" id="row-1914889323">
                                <div id="col-74867410" class="col medium-10 small-10 large-8">
                                    <div class="col-inner">
                                        <ul>
                                            <li><strong>We source a highest quality products.</strong></li>
                                            <li><strong>When sourcing from China, we specially focus on
                                                    suppliers previous transaction history, ratings and make
                                                    sure they are real manufactures.</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            #col-1669303840>.col-inner {
                                padding: 10% 0px 0px 0px;
                            }
                        </style>
                    </div>

                    <div id="col-224115876" class="col medium-6 small-12 large-6 small-col-first">
                        <div class="col-inner">
                            <div class="box has-hover has-hover box-vertical box-text-bottom">
                                <div class="box-image">
                                    <a href="#">
                                        <div class="image-cover" style="padding-top: 75%;">
                                            <img width="300" height="300"
                                                alt="BeginnersFba keyword consultants alibaba suppliers"
                                                data-src="homeAssets/wp-content/uploads/2021/02/3413911-e1640567335622.jpg"
                                                class="attachment- size- lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                            <noscript>
                                                <img width="300" height="300"
                                                    src="homeAssets/wp-content/uploads/2021/02/3413911-e1640567335622.jpg"
                                                    class="attachment- size-"
                                                    alt="BeginnersFba keyword consultants alibaba suppliers">
                                            </noscript>
                                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0);">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="box-text text-center dark"
                                    style="background-color: rgb(0, 255, 110); padding: 40px 40px 30px 40px;">
                                    <div class="box-text-inner">
                                        <div id="text-1569573819" class="text">
                                            <h2>Sourcing High Quality Products</h2>

                                            <style>
                                                #text-1569573819 {
                                                    color: rgb(0, 0, 0);
                                                }

                                                #text-1569573819>* {
                                                    color: rgb(0, 0, 0);
                                                }
                                            </style>
                                        </div>

                                        <div class="is-divider divider clearfix"
                                            style="max-width: 80%; height: 2px; background-color: rgb(255, 255, 255);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-collapse align-middle" id="row-1766508466">
                    <div id="col-1630563969" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="box has-hover has-hover box-vertical box-text-bottom">
                                <div class="box-image">
                                    <a href="#">
                                        <div class="image-cover" style="padding-top: 75%;">
                                            <img width="300" height="266" alt="BeginnersFba keyword optimization"
                                                data-src="homeAssets/wp-content/uploads/2021/02/227q-min-e1640567392198.png"
                                                class="attachment- size- lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                            <noscript><img width="300" height="266"
                                                    src="homeAssets/wp-content/uploads/2021/02/227q-min-e1640567392198.png"
                                                    class="attachment- size-"
                                                    alt="BeginnersFba keyword optimization"></noscript>
                                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0);">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="box-text text-center dark"
                                    style="background-color: rgb(0, 255, 110); padding: 40px 40px 30px 40px;">
                                    <div class="box-text-inner">
                                        <div id="text-1374056511" class="text">
                                            <h2>Find and Rank on Winning Keywords</h2>

                                            <style>
                                                #text-1374056511 {
                                                    color: rgb(0, 0, 0);
                                                }

                                                #text-1374056511>* {
                                                    color: rgb(0, 0, 0);
                                                }
                                            </style>
                                        </div>

                                        <div class="is-divider divider clearfix"
                                            style="max-width: 80%; height: 2px; background-color: rgb(255, 255, 255);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="col-285038479" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="row align-center" id="row-1359341751">
                                <div id="col-814129728" class="col medium-10 small-10 large-8">
                                    <div class="col-inner">
                                        <ul>
                                            <li><strong>We thoroughly check your competitors and and monitor
                                                    their rank vs yours.</strong></li>
                                            <li><strong>We add high performing keywords to broaden your organic
                                                    reach.</strong></li>
                                            <li><strong>We update the keywords in Titles, Bullets, Search Terms,
                                                    Description.</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            #col-285038479>.col-inner {
                                padding: 10% 0px 0px 0px;
                            }
                        </style>
                    </div>
                </div>
                <div class="row row-collapse align-middle" id="row-654658100">
                    <div id="col-2087057226" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="row align-center" id="row-1138537681">
                                <div id="col-846067266" class="col medium-10 small-10 large-8">
                                    <div class="col-inner">
                                        <ul>
                                            <li><strong>There are lot of ways to build a listing, depending upon
                                                    your goals.</strong></li>
                                            <li><strong>We utilize, external traffic sources like YouTube,
                                                    Facebook, Instagram influencers to PPC on Amazon.</strong>
                                            </li>
                                            <li><strong>We do use a lot of rebate sites and do giveaways to rank
                                                    on keywords.</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            #col-2087057226>.col-inner {
                                padding: 10% 0px 0px 0px;
                            }
                        </style>
                    </div>

                    <div id="col-981443078" class="col medium-6 small-12 large-6 small-col-first">
                        <div class="col-inner">
                            <div class="box has-hover has-hover box-vertical box-text-bottom">
                                <div class="box-image">
                                    <a href="#">
                                        <div class="image-cover" style="padding-top: 75%;">
                                            <img width="300" height="273" alt=""
                                                data-src="homeAssets/wp-content/uploads/2021/02/2456038-min-e1640567715432.jpg"
                                                class="attachment- size- lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                            <noscript><img width="300" height="273"
                                                    src="homeAssets/wp-content/uploads/2021/02/2456038-min-e1640567715432.jpg"
                                                    class="attachment- size-" alt=""></noscript>
                                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0);">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="box-text text-center dark"
                                    style="background-color: rgb(0, 255, 110); padding: 40px 40px 30px 40px;">
                                    <div class="box-text-inner">
                                        <div id="text-335434148" class="text">
                                            <h2>Build Listing with Reviews</h2>

                                            <style>
                                                #text-335434148 {
                                                    color: rgb(0, 0, 0);
                                                }

                                                #text-335434148>* {
                                                    color: rgb(0, 0, 0);
                                                }
                                            </style>
                                        </div>

                                        <div class="is-divider divider clearfix"
                                            style="max-width: 80%; height: 2px; background-color: rgb(255, 255, 255);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-collapse align-middle" id="row-59723303">
                    <div id="col-1867926317" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="box has-hover has-hover box-vertical box-text-bottom">
                                <div class="box-image">
                                    <a href="#">
                                        <div class="image-cover" style="padding-top: 75%;">
                                            <img width="300" height="200" alt="BeginnersFba keyword consultants"
                                                data-src="homeAssets/wp-content/uploads/2021/02/20943905-min-1-e1640567604547.jpg"
                                                class="attachment- size- lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                            <noscript>
                                                <img width="300" height="200"
                                                    src="homeAssets/wp-content/uploads/2021/02/20943905-min-1-e1640567604547.jpg"
                                                    class="attachment- size-" alt="BeginnersFba keyword consultants">
                                            </noscript>
                                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0);">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="box-text text-center dark"
                                    style="background-color: rgb(0, 255, 110); padding: 40px 40px 30px 40px;">
                                    <div class="box-text-inner">
                                        <div id="text-3248980251" class="text">
                                            <h2>Branding</h2>

                                            <style>
                                                #text-3248980251 {
                                                    color: rgb(0, 0, 0);
                                                }

                                                #text-3248980251>* {
                                                    color: rgb(0, 0, 0);
                                                }
                                            </style>
                                        </div>

                                        <div class="is-divider divider clearfix"
                                            style="max-width: 80%; height: 2px; background-color: rgb(255, 255, 255);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="col-586328971" class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="row align-center" id="row-372733989">
                                <div id="col-1727497494" class="col medium-10 small-10 large-8">
                                    <div class="col-inner">
                                        <ul>
                                            <li><strong>We enhance your brand with professional images, website
                                                    and online presence to get indexed on search
                                                    engines.</strong></li>
                                            <li><strong>We help you in getting Trademark and getting registered
                                                    as a Brand on Amazon</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            #col-586328971>.col-inner {
                                padding: 10% 0px 0px 0px;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <style>
                #section_406798592 {
                    padding-top: 0px;
                    padding-bottom: 0px;
                }

                @media (min-width: 850px) {
                    #section_406798592 {
                        padding-top: 60px;
                        padding-bottom: 60px;
                    }
                }
            </style>
        </section>

        <div class="text-center">
            <div class="is-divider divider clearfix" style="max-width: 212px;"></div>
        </div>

        <div id="text-3764644571" class="text">
            <h1 class="uppercase" style="text-align: center;" data-padding="5px"><strong>FREE Call on How to
                    Generate $30000 per Month on Amazon</strong></h1>
            <p style="text-align: center;">The proven framework we use for our clients which generated $30000 in
                the first month of launch</p>
            <p style="text-align: center;"><strong>You will learn&#8230;</strong></p>
            <p style="text-align: center;">
                ✅ Products that give <strong>60% to 120% ROI</strong> <br>
                ✅ High<strong> quality suppliers /manufacturers</strong><br>
                ✅ Create a <strong>compelling offer and differentiation</strong><br>
                ✅ <strong>Dominate </strong>a product niche and beat competition
            </p>

            <style>
                #text-3764644571 {
                    line-height: 1.25;
                }

                @media (min-width: 550px) {
                    #text-3764644571 {
                        line-height: 1.25;
                    }
                }
            </style>
        </div>

        <div class="row row-small" id="row-662531923">
            <div id="col-115932398" class="col small-12 large-12">
                <div class="col-inner text-center">
                    <a data-animate="bounceIn" href="booking" target="_self" class="button primary"
                        style="border-radius: 99px;">
                        <span>I AM INTERESTED STARTING MY ECOMMERCE BUSINESS</span>
                    </a>
                </div>
            </div>

            <style>
                #row-662531923>.col>.col-inner {
                    background-color: rgb(255, 255, 255);
                }
            </style>
        </div>
        <div class="text-center">
            <div class="is-divider divider clearfix" style="max-width: 212px;"></div>
        </div>

        <div id="text-2038455390" class="text">
            <h4 class="uppercase" style="text-align: center;" data-animate="fadeInRight"><strong>WE CROSS CHECK
                    PRODUCTS ON MULTIPLE TOOLS</strong></h4>

            <style>
                #text-2038455390 {
                    color: rgb(0, 0, 0);
                }

                #text-2038455390>* {
                    color: rgb(0, 0, 0);
                }
            </style>
        </div>

        <div class="row row-dashed" id="row-1913545278">
            <div id="col-1949228306" class="col medium-4 small-12 large-4">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_592595718">
                        <div class="img-inner dark">
                            <img width="1020" height="140" alt=""
                                data-srcset="homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-1400x192.png 1400w, homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-600x82.png 600w, homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-800x110.png 800w, homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-768x105.png 768w, homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG.png 1490w"
                                data-src="homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-1400x192.png"
                                data-sizes="(max-width: 1020px) 100vw, 1020px"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img width="1020" height="140"
                                    src="homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-1400x192.png"
                                    class="attachment-large size-large" alt=""
                                    srcset="
                                            wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-1400x192.png 1400w,homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-600x82.png,homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-800x110.png,homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG-768x105.png,homeAssets/wp-content/uploads/2020/12/WordmarkLogo_WhiteBG.png          1490w"
                                    sizes="(max-width: 1020px) 100vw, 1020px">
                            </noscript>
                        </div>

                        <style>
                            #image_592595718 {
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <div id="col-1336088879" class="col medium-4 small-12 large-4">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1636753805">
                        <div class="img-inner dark">
                            <img width="1020" height="170" alt=""
                                data-srcset="homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple.png 1200w, homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-600x100.png 600w, homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-800x133.png 800w, homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-768x128.png 768w"
                                data-src="homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple.png"
                                data-sizes="(max-width: 1020px) 100vw, 1020px"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img width="1020" height="170"
                                    src="homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple.png"
                                    class="attachment-large size-large" alt=""
                                    srcset="
                                            wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple.png         1200w,homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-600x100.png,homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-800x133.png,homeAssets/wp-content/uploads/2020/12/MerchantWords_logo_horizontal_purple-768x128.png  768w"
                                    sizes="(max-width: 1020px) 100vw, 1020px">
                            </noscript>
                        </div>

                        <style>
                            #image_1636753805 {
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <div id="col-1422293887" class="col medium-4 small-12 large-4">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_258974916">
                        <div class="img-inner dark">
                            <img width="1020" height="168" alt=""
                                data-srcset="homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x.png 1056w, homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-600x99.png 600w, homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-800x132.png 800w, homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-768x127.png 768w"
                                data-src="homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x.png"
                                data-sizes="(max-width: 1020px) 100vw, 1020px"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img width="1020" height="168"
                                    src="homeAssets/wp-content/uploads/2020/12/2-colors-light-bg%402x.png"
                                    class="attachment-large size-large" alt=""
                                    srcset="
                                            wp-content/uploads/2020/12/2-colors-light-bg%402x-1.png         1056w,homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-600x99.png,homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-800x132.png,homeAssets/wp-content/uploads/2020/12/2-colors-light-bg@2x-768x127.png  768w"
                                    sizes="(max-width: 1020px) 100vw, 1020px">
                            </noscript>
                        </div>

                        <style>
                            #image_258974916 {
                                width: 91%;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <div id="col-1461387936" class="col medium-4 small-12 large-4">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_567761453">
                        <div class="img-inner dark">
                            <img width="299" height="71" alt=""
                                data-src="homeAssets/wp-content/uploads/2020/12/KeywordTool-logo-1.png"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript><img width="299" height="71"
                                    src="homeAssets/wp-content/uploads/2020/12/KeywordTool-logo-1.png"
                                    class="attachment-large size-large" alt=""></noscript>
                        </div>

                        <style>
                            #image_567761453 {
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <div id="col-1289662796" class="col medium-4 small-12 large-4">
                <div class="col-inner text-center">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1164970396">
                        <div class="img-inner dark">
                            <img width="1020" height="512" alt=""
                                data-srcset="homeAssets/wp-content/uploads/2020/12/logo-color-1400x703.png 1400w, homeAssets/wp-content/uploads/2020/12/logo-color-600x301.png 600w, homeAssets/wp-content/uploads/2020/12/logo-color-796x400.png 796w, homeAssets/wp-content/uploads/2020/12/logo-color-768x386.png 768w, homeAssets/wp-content/uploads/2020/12/logo-color-1536x772.png 1536w, homeAssets/wp-content/uploads/2020/12/logo-color-2048x1029.png 2048w"
                                data-src="homeAssets/wp-content/uploads/2020/12/logo-color-1400x703.png"
                                data-sizes="(max-width: 1020px) 100vw, 1020px"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img width="1020" height="512"
                                    src="homeAssets/wp-content/uploads/2020/12/logo-color-1400x703.png"
                                    class="attachment-large size-large" alt=""
                                    srcset="
                                            wp-content/uploads/2020/12/logo-color-1400x703.png  1400w,homeAssets/wp-content/uploads/2020/12/logo-color-600x301.png,homeAssets/wp-content/uploads/2020/12/logo-color-796x400.png,homeAssets/wp-content/uploads/2020/12/logo-color-768x386.png,homeAssets/wp-content/uploads/2020/12/logo-color-1536x772.png,homeAssets/wp-content/uploads/2020/12/logo-color-2048x1029.png 2048w"
                                    sizes="(max-width: 1020px) 100vw, 1020px">
                            </noscript>
                        </div>

                        <style>
                            #image_1164970396 {
                                width: 50%;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <div id="col-602782925" class="col medium-4 small-12 large-4">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1891475508">
                        <div class="img-inner dark">
                            <img width="768" height="203" alt=""
                                data-srcset="homeAssets/wp-content/uploads/2020/12/keepa-logo-768x203-2.png 768w, homeAssets/wp-content/uploads/2020/12/keepa-logo-768x203-2-600x159.png 600w"
                                data-src="homeAssets/wp-content/uploads/2020/12/keepa-logo-768x203-2.png"
                                data-sizes="(max-width: 768px) 100vw, 768px"
                                class="attachment-large size-large lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img width="768" height="203"
                                    src="homeAssets/wp-content/uploads/2020/12/keepa-logo-768x203-2.png"
                                    class="attachment-large size-large" alt=""
                                    srcset="wp-content/uploads/2020/12/keepa-logo-768x203-2.png 768w,homeAssets/wp-content/uploads/2020/12/keepa-logo-768x203-2-600x159.png"
                                    sizes="(max-width: 768px) 100vw, 768px">
                            </noscript>
                        </div>

                        <style>
                            #image_1891475508 {
                                width: 91%;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
        <div id="gap-700928397" class="gap-element clearfix" style="display: block; height: auto;">
            <style>
                #gap-700928397 {
                    padding-top: 30px;
                }
            </style>
        </div>

        <section class="section" id="section_1165705207">
            <div class="bg section-bg fill bg-fill bg-loaded">
                <div class="section-bg-overlay absolute fill"></div>

                <div class="is-border" style="border-width: 1px 0px 1px 0px;"></div>
            </div>

            <div class="section-content relative">
                <div class="row row-large align-center" id="row-54096945">
                    <div id="col-336499532" class="col medium-9 small-12 large-9">
                        <div class="col-inner text-center">
                            <h2 class="uppercase"><span style="font-size: 100%;">ABOUT Us</span></h2>
                            <p class="lead">Experienced in launching products on Amazon, Shopify, Etsy and
                                Walmart. Aidigitalglobalmarketing is working with new online sellers like you. We launch and
                                grow your brand for you.</p>
                        </div>
                    </div>

                    <div id="col-1007591012" class="col medium-6 small-12 large-6">
                        <div class="col-inner text-left">
                            <div class="accordion" rel="1">
                                <div class="accordion-item">
                                    <a href="#" class="accordion-title plain">
                                        <button class="toggle"><i class="icon-angle-down"></i></button><span>What
                                            services do you
                                            provide?</span>
                                    </a>
                                    <div class="accordion-inner">
                                        <p>Aidigitalglobalmarketing: Private Label and Wholesale A to Z management</p>
                                        <p>Etsy: Find US based suppliers, launch and grow your Etsy store</p>
                                        <p>Shopify: Create branded store, run FB ads, supplier management</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-title plain">
                                        <button class="toggle"><i class="icon-angle-down"></i></button><span>Can
                                            I see some results?</span>
                                    </a>
                                    <div class="accordion-inner">
                                        <p>Yes, please contact us for our past work</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-title plain">
                                        <button class="toggle"><i class="icon-angle-down"></i></button><span>Can
                                            I start with less investment?</span>
                                    </a>
                                    <div class="accordion-inner">
                                        <p>Our clients have seen very good results. We will recommend based on
                                            your goals and budget. Yes, you can start small.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-title plain">
                                        <button class="toggle"><i class="icon-angle-down"></i></button><span>How
                                            much you charge?</span>
                                    </a>
                                    <div class="accordion-inner">
                                        <p>Our charges are moderate. Reach out on WhatsApp or Facebook for more
                                            information</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-title plain">
                                        <button class="toggle"><i class="icon-angle-down"></i></button><span>How
                                            can I trust?</span>
                                    </a>
                                    <div class="accordion-inner">
                                        <p>We&#8217;d love to schedule a call before finalizing anything. Hop on
                                            call to know us better. We have past results that showcase our
                                            expertise.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="col-2061494219" class="col medium-6 small-12 large-6"></div>
                </div>
            </div>

            <style>
                #section_1165705207 {
                    padding-top: 60px;
                    padding-bottom: 60px;
                    background-color: rgb(207, 207, 207);
                }

                #section_1165705207 .section-bg-overlay {
                    background-color: rgba(255, 255, 255, 0.85);
                }
            </style>
        </section>

        <div class="container section-title-container" style="margin-top: 22px;">
            <h3 class="section-title section-title-center"><b></b><span class="section-title-main">Latest
                    posts</span><b></b></h3>
        </div>

        <div id="row-1778983576" class="row large-columns-1 medium-columns- small-columns-1 row-masonry"
            data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
            <div class="col post-item">
                <div class="col-inner">
                    <a href="readymade-7000-drop-shipping-suppliers-in-usa-download-link" class="plain">
                        <div class="box box-default box-text-bottom box-blog-post has-hover">
                            <div class="box-text text-center">
                                <div class="box-text-inner blog-post-inner">
                                    <h5 class="post-title is-large">Readymade 7000 Wholesale Dropshipping
                                        Suppliers for Shopify, eBay, Etsy and Amazon in USA [Download Link]</h5>
                                    <div class="post-meta is-small op-8">June 28, 2021</div>
                                    <div class="is-divider"></div>
                                    <p class="from_the_blog_excerpt">We have gathered a list of 7000 American
                                        wholesale dropshipping suppliers for your store who [...]</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col post-item">
                <div class="col-inner">
                    <a href="how-to-fix-amazon-seller-error-5665-without-brand-registry" class="plain">
                        <div class="box box-default box-text-bottom box-blog-post has-hover">
                            <div class="box-text text-center">
                                <div class="box-text-inner blog-post-inner">
                                    <h5 class="post-title is-large">How to List a Product on Amazon Without
                                        Brand Registry ? Fix Amazon Seller Error 5665</h5>
                                    <div class="post-meta is-small op-8">February 18, 2020</div>
                                    <div class="is-divider"></div>
                                    <p class="from_the_blog_excerpt">Amazon is trying to reduce the issue of
                                        hijackers and encourage sellers to trademark their [...]</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col post-item">
                <div class="col-inner">
                    <a href="how-to-launch-your-first-product-on-amazon-in-2021" class="plain">
                        <div class="box box-default box-text-bottom box-blog-post has-hover">
                            <div class="box-text text-center">
                                <div class="box-text-inner blog-post-inner">
                                    <h5 class="post-title is-large">How to Start Aidigitalglobalmarketing Business in
                                        2022?
                                        Complete Step by Step Guide for Beginners [Updated]</h5>
                                    <div class="post-meta is-small op-8">August 2, 2018</div>
                                    <div class="is-divider"></div>
                                    <p class="from_the_blog_excerpt">You are looking to start selling on Amazon
                                        and not sure where to start? This [...]</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div id="sb_instagram" class="sbi sbi_col_4 sbi_width_resp" style="padding-bottom: 10px; width: 100%;"
            data-feedid="sbi_ebrandx_#4" data-res="auto" data-cols="4" data-num="4" data-shortcode-atts="{}"
            data-postid="514" data-locatornonce="65bbf401d1" data-sbi-flags="favorLocal">
            <div class="sb_instagram_header" style="padding: 5px; margin-bottom: 10px; padding-bottom: 0;">
                <a href="#" target="_blank" rel="noopener nofollow" class="sbi_header_link">
                    <div class="sbi_header_img"
                        data-avatar-url="wp-content/uploads/sb-instagram-feed-images/ebrandx_.jpg">
                        <div class="sbi_header_img_hover">
                            <svg class="sbi_new_logo fa-instagram fa-w-14" aria-hidden="true" data-fa-processed=""
                                aria-label="Instagram" data-prefix="fab" data-icon="instagram" role="img"
                                viewbox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                </path>
                            </svg>
                        </div>
                        <img alt="BeginnersFba" width="50" height="50"
                            data-src="http://beginnersfba.live/wp-content/uploads/sb-instagram-feed-images/ebrandx_.jpg"
                            class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <noscript><img src="homeAssets/wp-content/uploads/sb-instagram-feed-images/ebrandx_.jpg"
                                alt="BeginnersFba" width="50" height="50"></noscript>
                    </div>
                </a>
            </div>

            <div id="sbi_images" style="padding: 5px;">
                <div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17940669226814756"
                    data-date="1646629232">
                    <div class="sbi_photo_wrap">
                        <a class="sbi_photo" href="#" target="_blank" rel="noopener nofollow"
                            data-full-res="/275267039_1082759745915228_5647090112215515846_n.jpg"
                            data-img-src-set='{"d":"/275267039_1082759745915228_5647090112215515846_n.jpg","150":"/275267039_1082759745915228_5647090112215515846_n.jpg","320":"/275267039_1082759745915228_5647090112215515846_n.jpg","640":"/275267039_1082759745915228_5647090112215515846_n.jpg"}'>
                            <span class="sbi-screenreader">The best time to start selling online was 5 years
                            </span>
                            <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                    data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                    class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                <noscript>
                                    <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                        data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                            data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                            class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                        <noscript>
                                            <img src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                                alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers">
                                        </noscript>
                                    </noscript>
                                </noscript>
                            </noscript>
                        </a>
                    </div>
                </div>
                <div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17914405043243702"
                    data-date="1646546452">
                    <div class="sbi_photo_wrap">
                        <a class="sbi_photo" href="#" target="_blank" rel="noopener nofollow"
                            data-full-res="/275188746_318723460122774_4560449532450827196_n.jpg"
                            data-img-src-set='{"d":"/275188746_318723460122774_4560449532450827196_n.jpg","150":"/275188746_318723460122774_4560449532450827196_n.jpg","320":"/275188746_318723460122774_4560449532450827196_n.jpg","640":"/275188746_318723460122774_4560449532450827196_n.jpg"}'>
                            <span class="sbi-screenreader">The best time to start selling online was 5 years
                            </span>
                            <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                    data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                    class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                <noscript>
                                    <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                        data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                            data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                            class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                        <noscript>
                                            <img src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                                alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers">
                                        </noscript>
                                    </noscript>
                                </noscript>
                            </noscript>
                        </a>
                    </div>
                </div>
                <div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_18192188422195942"
                    data-date="1646456416">
                    <div class="sbi_photo_wrap">
                        <a class="sbi_photo" href="#" target="_blank" rel="noopener nofollow"
                            data-full-res="/275179668_1137561893666463_4221712392945107130_n.jpg"
                            data-img-src-set='{"d":"/275179668_1137561893666463_4221712392945107130_n.jpg","150":"/275179668_1137561893666463_4221712392945107130_n.jpg","320":"/275179668_1137561893666463_4221712392945107130_n.jpg","640":"/275179668_1137561893666463_4221712392945107130_n.jpg"}'>
                            <span class="sbi-screenreader">The best time to start selling online was 5 years
                            </span>
                            <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                    data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                    class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                <noscript>
                                    <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                        data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                            data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                            class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                        <noscript>
                                            <img src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                                alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers">
                                        </noscript>
                                    </noscript>
                                </noscript>
                            </noscript>
                        </a>
                    </div>
                </div>
                <div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17905554203345650"
                    data-date="1646373659">
                    <div class="sbi_photo_wrap">
                        <a class="sbi_photo" href="#" target="_blank" rel="noopener nofollow"
                            data-full-res="/275077483_382538029921169_2959361897143764664_n.jpg"
                            data-img-src-set='{"d":"/275077483_382538029921169_2959361897143764664_n.jpg","150":"/275077483_382538029921169_2959361897143764664_n.jpg","320":"/275077483_382538029921169_2959361897143764664_n.jpg","640":"/275077483_382538029921169_2959361897143764664_n.jpg"}'>
                            <span class="sbi-screenreader">The best time to start selling online was 5 years
                            </span>
                            <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript>
                                <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                    data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                    class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                <noscript>
                                    <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                        data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                    <noscript>
                                        <img alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers"
                                            data-src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                            class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                        <noscript>
                                            <img src="homeAssets/wp-content/plugins/instagram-feed/img/placeholder.png"
                                                alt="The best time to start selling online was 5 years ago. The next best time is NOW!!

Want to earn your financial freedom? Let us help you in building the asset for you. You will get help in:

🔎 Finding winning products with up to 120% ROI
💯 Have a branded online presence
💸 Sell on Amazon, Shopify, and Etsy
⭐ Build the product listings and your store with reviews
🤝 Have repeat customers

We help new sellers to build their brands.
Contact us now. Check the link in bio

#amazonfbasellers #fbasellers #sellonamazon #amazonsellersclub #etsysellers #shopifysellers">
                                        </noscript>
                                    </noscript>
                                </noscript>
                            </noscript>
                        </a>
                    </div>
                </div>
            </div>

            <div id="sbi_load">
                <span class="sbi_follow_btn">
                    <a href="https://t.me/beginnersfba" target="_blank" rel="noopener nofollow">
                        <svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-fa-processed=""
                            aria-label="Instagram" data-prefix="fab" data-icon="instagram" role="img"
                            viewbox="0 0 448 512">
                            <path fill="currentColor"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                        Follow on Telegram
                    </a>
                </span>
            </div>

            <span class="sbi_resized_image_data" data-feed-id="sbi_ebrandx_#4"
                data-resized='{"17905554203345650":{"id":"275077483_382538029921169_2959361897143764664_n","ratio":"1.00","sizes":{"full":640,"low":320,"thumb":150}},"18192188422195942":{"id":"275179668_1137561893666463_4221712392945107130_n","ratio":"1.00","sizes":{"full":640,"low":320,"thumb":150}},"17914405043243702":{"id":"275188746_318723460122774_4560449532450827196_n","ratio":"1.00","sizes":{"full":640,"low":320,"thumb":150}},"17940669226814756":{"id":"275267039_1082759745915228_5647090112215515846_n","ratio":"1.00","sizes":{"full":640,"low":320,"thumb":150}}}'>
            </span>
        </div>

        <div id="gap-1084587308" class="gap-element clearfix" style="display: block; height: auto;">
            <style>
                #gap-1084587308 {
                    padding-top: 30px;
                }
            </style>
        </div>

        <div class="text-center">
            <div class="is-divider divider clearfix" style="max-width: 212px;"></div>
        </div>
    </div>

    <script>
        function playHeroVideo() {
            var video = document.getElementById('heroVideo');
            var overlay = document.getElementById('videoOverlay');
            if (video && overlay) {
                overlay.classList.add('hidden');
                video.setAttribute('controls', 'controls');
                var playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(function(error) {
                        overlay.classList.remove('hidden');
                        video.removeAttribute('controls');
                    });
                }
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.getElementById('videoOverlay');
            if (overlay) {
                overlay.addEventListener('touchend', function(e) {
                    e.preventDefault();
                    playHeroVideo();
                });
            }
        });
    </script>

@endsection
