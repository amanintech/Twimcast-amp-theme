<?php get_header();
$dir_path       = get_template_directory_uri();
$queriedObj     = get_queried_object();
$image_array    = get_field( 'thumbnail', $queriedObj );
$category_image = $image_array['url'];
$cover_image    = get_field( 'cover_image', $queriedObj )['url'];
if ( ( empty( $category_image ) ) ) {
	$category_image = getRandomImageForCategory();
}
if ( ( empty( $cover_image ) ) ) {
	$cover_image = getRandomImageForCategory();
}
if ( function_exists( 'get_field' ) ) {
	$widgets = get_field( 'category_widgets', $queriedObj );
}
?>
    <style>


        div#main-post-area {
            margin-right: 0;
        }

        .category-cover {
            background-image: url("<?php echo $cover_image; ?>");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 270px;
            position: relative;
            background-position: center;
        }

        .category-title-top {
            position: absolute;
            z-index: 2;
            bottom: 0;
            left: 0;
            right: 0;
            height: 130px;
            display: flex;
            margin: 0 auto;
            max-width: 1200px;
        }

        .background-blur {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 130px;
            backdrop-filter: blur(30px) brightness(0.76);
            z-index: 1;
        }

        .category-thumb amp-img {
            transform: scale(1) translate(16px, -22px);
            border-radius: 7px;
            box-shadow: 0 3px 6px black;
            position: sticky;
            height: 141px;
            width: 141px;
        }

        .category-thumb {
            height: 100%;
        }

        .title-desc {
            margin-left: 50px;
            color: #fff;
        }

        .title-desc h3 {
            margin: 10px 0 0 0;
            font-size: 36px;
            font-weight: 500;
        }

        .title-desc h4 {
            margin: 10px 0 0 0;
            font-size: 18px;
        }

        .widget-list amp-carousel {
            height: 46px;
            padding: 0 35px;
        }

        .widget-list .amp-carousel-button:hover {
            background-color: hsla(0, 0%, 79.6%, .19);
            border-radius: 0;
        }

        .widget-list .amp-carousel-button {
            top: 0;
            margin: 0;
            height: 46px;
            width: 35px;
            background-position: 40% 40%;
        }

        .widget-list .amp-carousel-button-prev {
            left: 0;
        }

        .widget-list .amp-carousel-button-next {
            right: 0;
        }

        .widget-list {
            background-color: #fff;
            position: relative;
            top: 0;
            z-index: 1;
            border-bottom: 1px #ccc solid;
            height: 46px;
            display: flex;
        }

        .widget-list ul {
            list-style: none;
            display: grid;
            overflow: hidden;
            height: 46px;
            align-items: center;
            margin: 0;
        }


        .widget-list a {
            text-decoration: none;
            font-size: 14px;
            color: #494949;
            height: 46px;
            display: flex;
            align-items: center;
            padding: 0 10px;
            position: relative;
        }

        .widget-list a:hover {
            background-color: hsla(0, 0%, 79.6%, .19);
        }

        .post-container {
            background-color: #fff;
        }

        html {
            scroll-behavior: smooth;
        }

        .widget-list li {
            max-width: 150px;
            min-width: fit-content;
        }

        .widget-list > div {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .widget-list span {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            -webkit-line-clamp: 1;
        }

        .category-share {
            margin-left: auto;
            margin-right: 20px;
            display: flex;
            align-items: center;
            padding-right: 30px;
        }

        .share-tooltip .category-share-lt {
            display: flex;
            position: absolute;
            top: 41px;
            right: -13px;
            width: fit-content;
            height: fit-content;
            padding: 10px 10px 6px 10px;
            background-color: #767676;
            color: #000;
            border-radius: 10px;
            visibility: hidden;
            opacity: 0;
            transition: visibility, opacity .3s;
        }

        .share-tooltip .category-share-lt::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 85%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent #767676 transparent;
        }

        .share-tooltip:hover .category-share-lt {
            opacity: 1;
            visibility: visible;
            transition: visibility, opacity .3s;
        }

        .category-share-lt amp-social-share {
            border-radius: 50%;
            background-size: 23px;
            background-color: rgba(0, 0, 0, 0.33);
            -webkit-transition: background-color 0.3s ease-out;
            -moz-transition: background-color 0.3s ease-out;
            -o-transition: background-color 0.3s ease-out;
            transition: background-color 0.3s ease-out;
            margin-right: 4px;
        }

        .category-share-lt amp-social-share:hover {
            background-color: #000;
            -webkit-transition: background-color 0.3s ease-out;
            -moz-transition: background-color 0.3s ease-out;
            -o-transition: background-color 0.3s ease-out;
            transition: background-color 0.3s ease-out;
        }

        @media (min-width: 770px) {
            div#main-post-area {
                margin-top: 0;
                width: auto;
            }

            .post-container {
                padding: 20px 100px 20px 100px;
            }

            .explore-all {
                display: inline-block;
                box-shadow: 3px 3px 14px rgba(0, 0, 0, .16);
                max-width: 1200px;
                margin: 20px auto;
            }

            .archiveArea {
                margin-left: 16vw;
                padding-left: 0;
                font-family: "Segoe UI Regular", "Segoe UI Symbo", -apple-system, BlinkMacSystemFont, "Helvetica Neue", Helvetica, sans-serif;
            }

        }

        @media (max-width: 768px) {
            .post-container {
                background-color: #fff;
                display: block;
                max-width: 768px;
                padding-top: 20px;
            }

            .widget-list {
                position: relative;
            }

            .background-blur {
                height: 105px;
            }

            .category-title-top {
                height: 105px;
            }

            .title-desc {
                margin-left: 50px;
                flex: 1;
            }

            .title-desc h3 {
                font-size: 24px;
            }

            .title-desc h4 {
                font-size: 16px;
                width: 90%;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: normal;
                -webkit-line-clamp: 2;
                margin: 6px 0 0 0;
            }

            .category-thumb amp-img {
                width: 96px;
                height: 96px;
                z-index: 1;
                transform: scale(1) translate(32px, -7px);
            }

            .widget-list ul {
                margin: 0;
            }

            .category-share {
                display: none;
            }

            .amp-carousel-button {
                display: block;
                border-radius: 0;
            }

        }

        /*transform: scale(0.25) translate(84px, 330px);*/
    </style>
    <main id="site-content" role="main">
        <div id="twimcast-sidebar-desk" class="show-desktop twimbit-sidebar-desktop">
            <div class="twimcast-sidebar-container">
				<?php get_template_part( 'templates/twimcast', 'sidebar' ); ?>
            </div>
        </div>
        <amp-sidebar id="twimcast-sidebar" layout="nodisplay" side="right">
            <div class="twimcast-sidebar-container">
				<?php get_template_part( 'templates/twimcast', 'sidebar' ); ?>
            </div>
        </amp-sidebar>
        <section class="archiveArea">
            <div class="postArea-container">
                <div id="main-post-area" class="post-div">
                    <div class="category-cover">
                        <div class="background-blur"></div>
                        <div class="category-title-top">
                            <div class="category-thumb">
                                <amp-img id="categoryThumb" src="<?php echo $category_image; ?>"
                                         object-fit="cover" lightbox="thumbnail"
                                         height="141" width="141" layout="responsive"></amp-img>
                            </div>
                            <div class="title-desc">
                                <h3><?php echo $queriedObj->name; ?></h3>
                                <h4><?php echo $queriedObj->category_description; ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-list">
                        <div>
                            <ul>
                                <amp-carousel class="show-on-top" height="46" width="0" type="carousel"
                                              layout="responsive" controls>
									<?php
									// Show on top login for each widget
									//print_r($widgets);
									foreach ( (array) $widgets as $category_top => $widget ) {
										if ( $widget['show_on_top'] == "yes" && $widget['title'] ) { ?>
                                            <li>
                                                <a href="<?php echo '#' . $widget['acf_fc_layout'] . '-' . $category_top; ?>"><?php echo $widget['title'] ?></a>
                                            </li>

										<?php }
									}
									?>
                                </amp-carousel>
                            </ul>

                            <div class="category-share"><a role="button" class="share-tooltip" style="cursor: pointer">
                                    <svg width="19" height="18" viewBox="0 0 19 18">
                                        <path d="M16,18a3,3,0,0,1-3-3,1.746,1.746,0,0,1,.022-.238c0-.033.009-.065.013-.1L5.1,11.139a3,3,0,1,1,0-4.279l7.934-3.525c0-.033-.008-.065-.013-.1A1.746,1.746,0,0,1,13,3a3.01,3.01,0,1,1,.9,2.139L5.966,8.665c0,.032.008.064.013.1a1.321,1.321,0,0,1,0,.476c0,.032-.009.065-.013.1L13.9,12.861A3,3,0,1,1,16,18Zm0-4a1,1,0,1,0,1,1A1,1,0,0,0,16,14ZM3,8A1,1,0,1,0,4,9,1,1,0,0,0,3,8ZM16,2a1,1,0,1,0,1,1A1,1,0,0,0,16,2Z"
                                              transform="translate(0)" fill="#494949"/>
                                    </svg>
                                    <div class="category-share-lt">
                                        <amp-social-share type="email" height="34" width="34"></amp-social-share>
                                        <amp-social-share type="facebook" height="34" width="34"
                                                          data-share-endpoint="http://www.facebook.com/sharer.php">

                                        </amp-social-share>
                                        <amp-social-share type="linkedin" height="34" width="34"></amp-social-share>
                                        <amp-social-share type="twitter" height="34" width="34"></amp-social-share>
                                        <amp-social-share type="whatsapp" height="34" width="34"></amp-social-share>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="post-container">
						<?php
						//print_r($widgets);
						/* Adding widgets */
						foreach ( (array) $widgets as $category_key => $widget ) {
							if ( $widget['acf_fc_layout'] == 'image_carousel' ) {
								include( locate_template( 'widgets/image-carousel.php', false, false ) );
							} else if ( $widget['acf_fc_layout'] == 'thumbnail_carousel' ) {
								include( locate_template( 'widgets/thumbnail-carousel.php', false, false ) );
							} else if ( $widget['acf_fc_layout'] == 'card_carousel' ) {
								include( locate_template( 'widgets/card-carousel.php', false, false ) );
							} else if ( $widget['acf_fc_layout'] == 'list_category' ) {
								include( locate_template( 'widgets/list-category.php', false, false ) );
							} else if ( $widget['acf_fc_layout'] == 'standard' ) {
								include( locate_template( 'widgets/standard.php', false, false ) );
							}
						}
						?>

                    </div>
                </div>
            </div>
        </section>
    </main><!-- #site-content -->

<?php
get_footer();
