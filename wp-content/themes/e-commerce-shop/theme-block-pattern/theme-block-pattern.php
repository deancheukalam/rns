<?php
/**
 * E-commerce-shop : Block Patterns
 *
 * @package  E-commerce-shop 
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'e-commerce-shop',
		array( 'label' => __( ' E-commerce Shop ', 'e-commerce-shop' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'e-commerce-shop/banner-section',
		array(
			'title'      => __( 'Banner Section', 'e-commerce-shop' ),
			'categories' => array( 'e-commerce-shop' ),
			'content'    => "<!-- wp:columns {\"className\":\"banner-categories-section\"} -->\n<div class=\"wp-block-columns banner-categories-section\"><!-- wp:column {\"width\":\"75%\",\"className\":\"mt-md-5\"} -->\n<div class=\"wp-block-column mt-md-5\" style=\"flex-basis:75%\"><!-- wp:cover {\"url\":\"" . get_theme_file_uri() . "/theme-block-pattern/images/banner.png\",\"id\":154,\"dimRatio\":20,\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-20 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-154\" alt=\"\" src=\"" . get_theme_file_uri() . "/theme-block-pattern/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"4%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:4%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.8%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.8%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"35px\",\"fontStyle\":\"normal\",\"fontWeight\":\"700\"}},\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" style=\"font-size:35px;font-style:normal;font-weight:700\">SEASON SALE</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"15px\"}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\" style=\"font-size:15px\">Lorem Ipsum Dolor Sit Amet, Consectetur adipiscing elit sed  do elusmod.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"border\":{\"radius\":\"2px\"},\"typography\":{\"fontSize\":\"14px\"},\"color\":{\"background\":\"#0b5ead\"}},\"className\":\"banner-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-btn\" style=\"font-size:14px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:2px;background-color:#0b5ead\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns {\"style\":{\"color\":{\"background\":\"#eed959a8\"}},\"className\":\"service-section mt-0 p-3\"} -->\n<div class=\"wp-block-columns service-section mt-0 p-3 has-background\" style=\"background-color:#eed959a8\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"className\":\"service-para mb-0\"} -->\n<p class=\"has-text-align-center service-para mb-0\" style=\"font-size:22px\">MONEY BACK</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:14px\">30 Days Money Back Guarantee</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"className\":\"service-para mb-0\"} -->\n<p class=\"has-text-align-center service-para mb-0\" style=\"font-size:22px\">FREE SHIPPING</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:14px\">Shipping on orders over $99</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}},\"className\":\"service-para mb-0\"} -->\n<p class=\"has-text-align-center service-para mb-0\" style=\"font-size:22px\">SPECIAL SALE</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"14px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:14px\">Extra $5 off on all items</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\",\"className\":\"categories-section\"} -->\n<div class=\"wp-block-column categories-section\" style=\"flex-basis:25%\"><!-- wp:paragraph {\"style\":{\"color\":{\"background\":\"#0b5ead\"}},\"textColor\":\"white\",\"className\":\"category\"} -->\n<p class=\"category has-white-color has-text-color has-background\" style=\"background-color:#0b5ead\">ALL CATEGORIES</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:woocommerce/product-categories /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'e-commerce-shop/product-section',
		array(
			'title'      => __( 'Product Section', 'e-commerce-shop' ),
			'categories' => array( 'e-commerce-shop' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . get_theme_file_uri() . "/theme-block-pattern/images/bg.png\",\"id\":160,\"dimRatio\":0,\"isDark\":false} -->\n<div class=\"wp-block-cover is-light\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-160\" alt=\"\" src=\"" . get_theme_file_uri() . "/theme-block-pattern/images/bg.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"30%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:30%\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"26px\",\"fontStyle\":\"normal\",\"fontWeight\":\"700\"}}} -->\n<h2 class=\"has-text-align-center\" style=\"font-size:26px;font-style:normal;font-weight:700\">GIFTS FOR KIDS ON BIRTHDAY</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"border\":{\"radius\":\"2px\"},\"typography\":{\"fontSize\":\"14px\"},\"color\":{\"background\":\"#0b5ead\"}},\"className\":\"product-sec-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size product-sec-btn\" style=\"font-size:14px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:2px;background-color:#0b5ead\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}