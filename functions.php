<?php
/**
 * tech_blogging functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tech Blogging
 */
if ( ! function_exists( 'tech_blogging_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tech_blogging_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tech_blogging, use a find and replace
		 * to change 'tech-blogging' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tech-blogging', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_image_size( 'tech-blogging-thumbnail-mobile', 350, 350, true );
		add_image_size( 'tech-blogging-list-thumbnail', 380, 360, true );
		add_image_size( 'tech-blogging-grid-thumbnail', 380, 320, true );
		add_image_size( 'tech-blogging-thumbnail-medium', 770, 433.13, true );
		add_image_size( 'tech-blogging-thumbnail-large', 1200, 675, true );
		add_image_size( 'tech-blogging-thumbnail-featured', 930, 650, true );
		add_image_size( 'tech-blogging-header-full', 1920, 1080, true );
		add_image_size( 'tech-blogging-latest-post-widget-thumb', 120, 120, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'tech-blogging' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'tech-blogging' ),
			)
		);
		add_theme_support( 'woocommerce' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		$html5Args = array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			);
		add_theme_support( 'html5', $html5Args);
		// Set up the WordPress core custom background feature.
		$customBgArgs = apply_filters( 'tech_blogging_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			);
		add_theme_support( 'custom-background', $customBgArgs);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style('assets/css/block-custom-css/block-style.css');
		/**
		 * Remove Theme Support
		 */
        remove_theme_support( 'widgets-block-editor' );
		remove_theme_support( 'block-templates' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$customLogoArgs = array(
				'height'      => 100,
				'width'       => 300,
				'flex-width'  => true,
				'flex-height' => true,
			);
		add_theme_support( 'custom-logo', $customLogoArgs);
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'tech_blogging_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'tech_blogging_setup' );



/**
 * Register widgets
 */
require get_template_directory() . '/inc/register-widgets.php';
/**
 * Enqueue scripts
 */
require get_template_directory() . '/inc/enqueue-scripts.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * tech_blogging Comment Template.
 */
require get_template_directory() . '/inc/comment-template.php';
/**
 * tech_blogging sanitize functions.
 */
require get_template_directory() . '/inc/sanitize-functions.php';
/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/checkout-fields.php';
/**
 * Block Pattern
 */
require get_template_directory() . '/inc/block-pattern/reg-block-pattern.php';
/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/widgets/recent-post.php';

if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce-modification.php';
}

/**
 * Upgrade to Pro
*/
require get_template_directory() . '/inc/upgradetopro/class-customize.php';

/**
 * Welcome Notice
*/
require get_template_directory() . '/inc/welcome-notice.php';
/**
 * Custom functions
*/
require get_template_directory() . '/inc/common.php';
