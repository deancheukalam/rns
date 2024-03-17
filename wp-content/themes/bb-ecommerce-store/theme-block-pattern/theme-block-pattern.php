<?php
/**
 * BB Ecommerce Store : Block Patterns
 *
 * @package  BB Ecommerce Store 
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'bb-ecommerce-store',
		array( 'label' => __( ' BB Ecommerce Store ', 'bb-ecommerce-store' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'bb-ecommerce-store/banner-section',
		array(
			'title'      => __( 'Banner Section', 'bb-ecommerce-store' ),
			'categories' => array( 'bb-ecommerce-store' ),
			'content'    => "<!-- wp:columns {\"className\":\"banner-category-section\"} -->\n<div class=\"wp-block-columns banner-category-section\"><!-- wp:column {\"width\":\"25%\",\"style\":{\"color\":{\"background\":\"#f3f3f3\"}},\"className\":\"categories-section\"} -->\n<div class=\"wp-block-column categories-section has-background\" style=\"background-color:#f3f3f3;flex-basis:25%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"18px\"}},\"textColor\":\"white\",\"className\":\"category\"} -->\n<p class=\"category has-white-color has-text-color\" style=\"font-size:18px\">ALL CATEGORIES</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:woocommerce/product-categories /--></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"75%\",\"className\":\"mt-md-5\"} -->\n<div class=\"wp-block-column mt-md-5\" style=\"flex-basis:75%\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/banner.png\",\"id\":164,\"dimRatio\":50,\"isDark\":false,\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover is-light banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-164\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"44.7%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:44.7%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\",\"className\":\"banner-section-content\"} -->\n<div class=\"wp-block-column banner-section-content\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"35px\"}},\"textColor\":\"white\",\"className\":\"mb-2\"} -->\n<h1 class=\"mb-2 has-white-color has-text-color\" style=\"font-size:35px\">LOREM IPSUM IS SIMPLY A</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#e22626\"},\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"16px\"}},\"className\":\"banner-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-btn\" style=\"font-size:16px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:0px;background-color:#e22626\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns {\"className\":\"service-section \"} -->\n<div class=\"wp-block-columns service-section\"><!-- wp:column {\"style\":{\"color\":{\"background\":\"#e22626\"}},\"className\":\"service-box\"} -->\n<div class=\"wp-block-column service-box has-background\" style=\"background-color:#e22626\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"textColor\":\"white\",\"className\":\"mb-md-0 pt-md-2\"} -->\n<p class=\"has-text-align-center mb-md-0 pt-md-2 has-white-color has-text-color\" style=\"font-size:22px\">LOREM IPSUM</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}},\"textColor\":\"white\",\"className\":\"pb-md-1\"} -->\n<p class=\"has-text-align-center pb-md-1 has-white-color has-text-color\" style=\"font-size:14px\">is simply a dummy text of the printing</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#e22626\"}},\"className\":\"service-box\"} -->\n<div class=\"wp-block-column service-box has-background\" style=\"background-color:#e22626\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"textColor\":\"white\",\"className\":\"mb-md-0 pt-md-2\"} -->\n<p class=\"has-text-align-center mb-md-0 pt-md-2 has-white-color has-text-color\" style=\"font-size:22px\">LOREM IPSUM</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}},\"textColor\":\"white\",\"className\":\"pb-md-1\"} -->\n<p class=\"has-text-align-center pb-md-1 has-white-color has-text-color\" style=\"font-size:14px\">is simply a dummy text of the printing</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#e22626\"}},\"textColor\":\"white\",\"className\":\"service-box\"} -->\n<div class=\"wp-block-column service-box has-white-color has-text-color has-background\" style=\"background-color:#e22626\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"className\":\"mb-md-0 pt-md-2\"} -->\n<p class=\"has-text-align-center mb-md-0 pt-md-2\" style=\"font-size:22px\">LOREM IPSUM</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}},\"className\":\"pb-md-1\"} -->\n<p class=\"has-text-align-center pb-md-1\" style=\"font-size:14px\">is simply a dummy text of the printing</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'bb-ecommerce-store/service-section',
		array(
			'title'      => __( 'Products Section', 'bb-ecommerce-store' ),
			'categories' => array( 'bb-ecommerce-store' ),
			'content'    => "<!-- wp:group {\"className\":\"products-section my-5 p-3\"} -->\n<div class=\"wp-block-group products-section my-5 p-3\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":\"30px\"}}} -->\n<h2 style=\"font-size:30px\">NEW PRODUCTS</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"categories\":[17]} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}