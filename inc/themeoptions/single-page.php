<?php
$wp_customize->add_section(
	'post_details',
	array(
		'priority'   => 1,
		'panel'      => 'tech-blogging',
		'title'      => __( 'Single Post', 'tech-blogging' ),
		'capability' => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'single_page_sidebar',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_select',
		'default'           => 'right',
	)
);
$wp_customize->add_control(
	'single_page_sidebar',
	array(
		'label'   => __( 'Single Post Sidebar', 'tech-blogging' ),
		'section' => 'post_details',
		'type'    => 'select',
		'choices' => array(
			'left'  => __( 'Left Sidebar', 'tech-blogging' ),
			'right' => __( 'Right Sidebar', 'tech-blogging' ),
			'no'    => __( 'No Sidebar', 'tech-blogging' ),
		),
	)
);
$wp_customize->add_setting(
	'post_navigation_show',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_checkbox',
		'default'           => true,
	)
);
$wp_customize->add_control(
	'post_navigation_show',
	array(
		'label'   => __( 'Post Navigation Show', 'tech-blogging' ),
		'section' => 'post_details',
		'type'    => 'checkbox',
	)
);
