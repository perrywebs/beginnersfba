<div>
    <div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
        <div class="sidebar-menu no-scrollbar">
            <ul class="nav nav-sidebar nav-vertical nav-uppercase">
                <li class="html header-social-icons ml-0">
                    <div class="social-icons follow-icons">
                        <a href="https://t.me/beginnersfba" target="_blank" data-label="Facebook"
                            rel="noopener noreferrer nofollow" class="icon primary button circle facebook tooltip"
                            title="Follow on Facebook">
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="https://t.me/beginnersfba" target="_blank" rel="noopener noreferrer nofollow"
                            data-label="Instagram" class="icon primary button circle instagram tooltip"
                            title="Follow on Instagram">
                            <i class="icon-instagram"></i>
                        </a>
                        <a href="mailto:info@beginnersfba.live" data-label="E-mail" rel="nofollow"
                            class="icon primary button circle email tooltip" title="Send us an email"><i
                                class="icon-envelop"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Instagram Feed JS -->
    {{--
    <script type="text/javascript" src="homeAssets/wp-includes/js/dist/vendor/regenerator-runtime.min3937.js?ver=0.13.9"
        id="regenerator-runtime-js"></script>
    <script type="text/javascript" src="homeAssets/wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0"
        id="wp-polyfill-js"></script>
    <script type="text/javascript" id="contact-form-7-js-extra">
        var wpcf7 = { api: { root: "https:\/\/beginnersfba.live\/wp-json\/", namespace: "contact-form-7\/v1" } };
    </script>
    <script type="text/javascript" src="homeAssets/wp-content/plugins/contact-form-7/includes/js/index7e15.js?ver=5.5.4"
        id="contact-form-7-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search2916.js?ver=3.13.1"
        id="flatsome-live-search-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/wp-smushit/app/assets/js/smush-lazy-load.minc063.js?ver=3.9.5"
        id="smush-lazy-load-js">
    </script>
    <script type="text/javascript" src="homeAssets/wp-includes/js/hoverIntent.min3e5a.js?ver=1.10.2"
        id="hoverIntent-js"></script>
    <script type="text/javascript" id="flatsome-js-js-extra">
        var flatsomeVars = {
            ajaxurl: "https:\/\/beginnersfba.live\/wp-admin\/admin-ajax.php",
            rtl: "",
            sticky_height: "49",
            lightbox: {
                close_markup:
                    '<button title="%title%" type="button" class="mfp-close"><svg xmlns="http:\/\/www.w3.org\/2000\/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"><\/line><line x1="6" y1="6" x2="18" y2="18"><\/line><\/svg><\/button>',
                close_btn_inside: false,
            },
            user: { can_edit_pages: false },
            i18n: { mainMenu: "Main Menu" },
            options: { cookie_notice_version: "1" },
        };
    </script>
    <script type="text/javascript" src="homeAssets/wp-content/themes/flatsome/assets/js/flatsome2916.js?ver=3.13.1"
        id="flatsome-js-js"></script>
    <script type="text/javascript" src="homeAssets/cdn.trustindex.io/loader74e5.js?ver=5.9.1" id="trustindex-js-js">
    </script>
    <script type="text/javascript" id="trustindex-js-js-after">
        (function ti_init() {
            if (typeof Trustindex == "undefined") {
                setTimeout(ti_init, 1985);
                return false;
            }
            Trustindex.init_pager(document.querySelectorAll(".ti-widget"));
        })();
    </script>
    <script type="text/javascript"
        src="homeAssets/wp-content/themes/flatsome/assets/libs/packery.pkgd.min2916.js?ver=3.13.1"
        id="flatsome-masonry-js-js"></script>
    <script type="text/javascript" id="sb_instagram_scripts-js-extra">
        var sb_instagram_js_options = {
            font_method: "svg",
            resized_url: "https:\/\/beginnersfba.live\/wp-content\/uploads\/sb-instagram-feed-images\/",
            placeholder: "https:\/\/beginnersfba.live\/wp-content\/plugins\/instagram-feed\/img\/placeholder.png",
        };
    </script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/instagram-feed/js/sbi-scripts.min9361.js?ver=2.9.10"
        id="sb_instagram_scripts-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/wpforms-lite/assets/js/jquery.validate.min6134.js?ver=1.19.3"
        id="wpforms-validation-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/wpforms-lite/assets/js/mailcheck.mincfa9.js?ver=1.1.2"
        id="wpforms-mailcheck-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/wpforms-lite/assets/js/punycode.min8a54.js?ver=1.0.0"
        id="wpforms-punycode-js"></script>
    <script type="text/javascript"
        src="homeAssets/wp-content/plugins/wpforms-lite/assets/js/wpforms.mine3d1.js?ver=1.7.2.1" id="wpforms-js">
    </script>
    <script type="text/javascript">
        var wpforms_settings = {
            val_required: "This field is required.",
            val_email: "Please enter a valid email address.",
            val_email_suggestion: "Did you mean {suggestion}?",
            val_email_suggestion_title: "Click to accept this suggestion.",
            val_email_restricted: "This email address is not allowed.",
            val_number: "Please enter a valid number.",
            val_number_positive: "Please enter a valid positive number.",
            val_confirm: "Field values do not match.",
            val_checklimit: "You have exceeded the number of allowed selections: {#}.",
            val_limit_characters: "{count} of {limit} max characters.",
            val_limit_words: "{count} of {limit} max words.",
            val_recaptcha_fail_msg: "Google reCAPTCHA verification failed, please try again later.",
            val_empty_blanks: "Please fill out all blanks.",
            uuid_cookie: "",
            locale: "en",
            wpforms_plugin_url: "https:\/\/beginnersfba.live\/wp-content\/plugins\/wpforms-lite\/",
            gdpr: "",
            ajaxurl: "https:\/\/beginnersfba.live\/wp-admin\/admin-ajax.php",
            mailcheck_enabled: "1",
            mailcheck_domains: [],
            mailcheck_toplevel_domains: ["dev"],
            is_ssl: "1",
        };
    </script>
</div>