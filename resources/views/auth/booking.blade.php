@extends('layouts.guest')


@section('content')
<main>

    <div id="content" class="blog-wrapper blog-single page-wrapper">


        <!-- Logo -->
        <center>
            <div>
                <!-- Header logo -->
                <a href="/" title="Ecomglobalseller - Your eCom Partner" rel="home">
                    <img width="250" height="57" alt="Ecomglobalseller"
                        src="{{asset('homeAssets/images/logo.png')}}">
                </a>
            </div>
        </center>

        <div class="row row-large row-divided ">

            <div class="large-9 col">



                <article id="post-946"
                    class="post-946 post type-post status-publish format-standard hentry category-amazon category-dropshipping category-etsy category-shopify">
                    <div class="article-inner ">
                        <header class="entry-header">
                            <div class="entry-header-text entry-header-text-top text-center">
                                <div style="text-align: center;padding: 20px;">
                                    <style>
                                        #google_translate_element {

                                            color: transparent;
                                        }

                                        #google_translate_element a {

                                            display: none;
                                        }

                                        select.google_translate_element {

                                            color: black;
                                        }

                                        div.goog-te-gadget {

                                            color: transparent;
                                        }

                                        div.goog-te-gadget {

                                            color: transparent !important;
                                        }

                                        .goog-te-gadget .goog-te-combo {

                                            margin: 0px 0 !important;
                                            padding: 0px 10px;
                                            font-size: 15px;
                                            font-weight: 500;
                                            background: rgba(0, 0, 0, 0.9);
                                            background-size: 300% 100%;
                                            border: 1px solid #fff;
                                            color: #52afee !important;
                                            border-radius: 5px;
                                            cursor: pointer;
                                            outline: none;
                                            font-family: 'Poppins', sans-serif;
                                            border-radius: 5px;
                                            box-shadow: 0px 3px 5px #fff;
                                            height: 30px;
                                            display: inline-block;
                                            position: relative;
                                            /* top: 6px; */
                                            width: 100px;
                                        }
                                    </style>
                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
													new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL }, 'google_translate_element');
												}
                                    </script>
                                    <script type="text/javascript"
                                        src="../translate_a/element.js?cb=googleTranslateElementInit"></script>
                                    <div id="google_translate_element"></div>
                                </div>

                                <h1 class="entry-title" id="headerForm">Provide information</h1>
                                <div class="entry-divider is-divider small"></div>


                            </div>
                        </header>
                        <div class="entry-content single-page">
                            <x-error-message />
                        </div>
                    </div>
                </article>

                <div id="comments" class="comments-area">
                    <div id="respond" class="comment-respond">

                        <livewire:auth.booking />
                    </div>
                    <!-- #respond -->
                </div>

            </div>
            <div class="post-sidebar large-3 col col-12 col-md-6 col-sm-12">
                <div id="secondary" class="widget-area " role="complementary">
                    <aside id="flatsome_recent_posts-17" class="widget flatsome_recent_posts"> <span
                            class="widget-title "><span>Latest Posts</span></span>
                        <div class="is-divider small"></div>
                    </aside>
                    <aside id="categories-14" class="widget widget_categories"><span
                            class="widget-title "><span>Categories</span></span>
                        <div class="is-divider small"></div>


                    </aside>
                    <aside id="archives-7" class="widget widget_archive"><span
                            class="widget-title "><span>Archives</span></span>
                        <div class="is-divider small"></div>


                    </aside>
                </div>
            </div>
        </div>

    </div>


</main>
@endsection