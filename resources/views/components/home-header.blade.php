<div>
    <style>
        #header-logo-dark {
            padding-top: 10px !important;
            padding-bottom: 50px !important;
        }
        @media (max-width: 767px) {
            #header-logo-dark {
                padding-top: 12px !important;
                padding-bottom: 12px !important;
            }
        }

        /* Header modernization */
        .header {
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 1px 0 rgba(0,0,0,0.06);
            transition: box-shadow 0.3s ease, background 0.3s ease;
        }
        .header.stuck,
        .header.show-on-scroll {
            box-shadow: 0 2px 12px rgba(0,0,0,0.08) !important;
            background: rgba(255,255,255,0.98) !important;
        }
        .header-main {
            border-bottom: none !important;
        }
        .header-inner {
            min-height: 60px;
        }

        /* Logo */
        #logo a {
            display: flex;
            align-items: center;
            transition: opacity 0.2s;
        }
        #logo a:hover {
            opacity: 0.85;
        }
        #logo img {
            transition: max-height 0.3s ease;
        }

        /* Nav buttons - compact ecommerce look */
        .header .button.primary,
        .header .button.primary span {
            background: #00559d;
            color: #fff;
            border: 1px solid #00559d;
            font-weight: 600;
            font-size: 0.78rem;
            letter-spacing: 0.2px;
            padding: 7px 18px;
            border-radius: 6px !important;
            transition: all 0.2s ease;
            box-shadow: none;
            line-height: 1.4;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            min-height: 0;
        }
        .header .button.primary:hover,
        .header .button.primary.is-outline:hover {
            background: #003d6e;
            color: #fff;
            border-color: #003d6e;
            box-shadow: none;
            transform: none;
        }

        /* Divider */
        .header-divider {
            width: 1px;
            height: 24px;
            background: #e0e0e0;
            margin: 0 12px;
            opacity: 0.6;
        }

        /* Top divider */
        .top-divider {
            border-top: 1px solid rgba(0,0,0,0.06);
            margin-top: 0;
        }

        /* Sticky header refinement */
        .stuck .header-main,
        .header.show-on-scroll .header-main {
            min-height: 50px;
        }

        /* Mobile improvements */
        @media (max-width: 849px) {
            .header-inner {
                min-height: 56px;
            }
            .header .button.primary,
            .header .button.primary span {
                padding: 6px 14px;
                font-size: 0.75rem;
            }
        }
    </style>
    <header id="header" class="header header-full-width has-sticky sticky-fade sticky-hide-on-scroll">
        <div class="header-wrapper">
            <div id="masthead" class="header-main show-logo-center hide-for-sticky nav-dark">
                <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">
                    <!-- Logo -->
                    <div id="logo" class="flex-col logo">
                        <a href="/" title="Aidigitalglobalmarketing - Your eCom Partner" rel="home">
                            <img width="250" height="57" alt="Aidigitalglobalmarketing"
                                data-src="homeAssets/images/logo.png"
                                class="header_logo header-logo lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript><img width="250" height="57" src="wp-content/uploads/2021/02/BeginnersFba.png"
                                    class="header_logo header-logo" alt="BeginnersFba"></noscript>
                            <img width="250" height="57" alt="BeginnersFba"
                                data-src="homeAssets/images/logo.png"
                                id="header-logo-dark"
                                class="header-logo-dark ls-is-cached lazyloaded"
                                src="homeAssets/images/logo.png">
                            <noscript><img width="250" height="57" src="wp-content/uploads/2021/02/BeginnersFba.png"
                                    class="header-logo-dark" alt="BeginnersFba"></noscript>
                        </a>
                    </div>

                    <!-- Mobile Left Elements -->
                    <div class="flex-col show-for-medium flex-left">
                        <ul class="mobile-nav nav nav-left">
                            <li class="nav-icon has-icon">
                                <div class="header-button">
                                    <a data-animate="bounceIn" href="access" target="_self" class="button primary">
                                        <span>Login</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Left Elements -->
                    <div class="flex-col hide-for-medium flex-left">
                        <a data-animate="bounceIn" href="access" target="_self" class="button primary">
                            <span>Login</span>
                        </a>
                    </div>

                    <!-- Right Elements -->
                    <div class="flex-col hide-for-medium flex-right">
                        <ul class="header-nav header-nav-main nav nav-right nav-uppercase">
                            <li class="header-divider"></li>
                            <li class="html header-social-icons ml-0">
                                <div class="social-icons follow-icons">
                                    <a data-animate="bounceIn" href="booking" target="_self" class="button primary"
                                        data-animated="true">
                                        <span>Get Started</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile Right Elements -->
                    <div class="flex-col show-for-medium flex-right">
                        <ul class="mobile-nav nav nav-right">
                            <li class="header-search header-search-lightbox has-icon">
                                <div class="header-button">
                                    <a data-animate="bounceIn" href="booking" target="_self" class="button primary"
                                        data-animated="true">
                                        <span>Get Started</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="top-divider full-width"></div>
                </div>
            </div>
            <div class="header-bg-container fill">
                <div class="header-bg-image fill"></div>
                <div class="header-bg-color fill"></div>
            </div>
        </div>
    </header>
</div>
