<?php
/*Blog Page Settings*/
$wp_customize->add_section(
	'blog_page_settings',
	array(
		'priority'    => 6,
		'panel'       => 'tech-blogging',
		'title'       => __( 'Blog Settings', 'tech-blogging' ),
		'description' => __( 'Customize Blog Page', 'tech-blogging' ),
		'capability'  => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'grid_column',
	array(
		'default'           => 'col-sm-4',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_radio',
	)
);
$wp_customize->add_control(
	'grid_column',
	array(
		'label'   => __( 'Grid Column', 'tech-blogging' ),
		'section' => 'blog_page_settings',
		'type'    => 'radio',
		'choices' => array(
			'col-sm-3' => __( '4 Colmun', 'tech-blogging' ),
			'col-sm-4' => __( '3 Column', 'tech-blogging' ),
			'col-sm-6' => __( '2 Column', 'tech-blogging' ),
		),
	)
);
$wp_customize->add_setting(
	'blog_page_sidebar',
	array(
		'default'           => 'no',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_radio',
	)
);
$wp_customize->add_control(
	'blog_page_sidebar',
	array(
		'label'   => __( 'Blog & Archive Page Sidebar', 'tech-blogging' ),
		'section' => 'blog_page_settings',
		'type'    => 'radio',
		'choices' => array(
			'left'  => __( 'Left Sidebar', 'tech-blogging' ),
			'right' => __( 'Right Sidebar', 'tech-blogging' ),
			'no'    => __( 'No Sidebar', 'tech-blogging' ),
		),
	)
);

$wp_customize->add_setting(
	'blog_page_pagination',
	array(
		'default'           => 'center',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_radio',
	)
);
$wp_customize->add_control(
	'blog_page_pagination',
	array(
		'label'   => __( 'Pagination Alignment', 'tech-blogging' ),
		'section' => 'blog_page_settings',
		'type'    => 'radio',
		'choices' => array(
			'left'   => __( 'Left', 'tech-blogging' ),
			'right'  => __( 'Right', 'tech-blogging' ),
			'center' => __( 'center', 'tech-blogging' ),
		),
	)
);
