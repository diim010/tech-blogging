<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tech_blogging_widgets_init() {
	/**
	 * Main Sidebar
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tech-blogging' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tech-blogging' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'tech_blogging_widgets_init' );
