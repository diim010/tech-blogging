<?php
/*Banner Section*/
$wp_customize->add_section(
	'tech_blogging_section',
	array(
		'priority'    => 6,
		'panel'       => 'tech-blogging',
		'title'       => __( 'Banner Section', 'tech-blogging' ),
		'description' => __( 'Customize Banner Section', 'tech-blogging' ),
		'capability'  => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'tech_blogging_section_show_hide',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_checkbox',
		'default'           => true,
	)
);
$wp_customize->add_control(
	'tech_blogging_section_show_hide',
	array(
		'label'   => __( 'Show Banner Section', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'checkbox',
	)
);
$wp_customize->add_setting(
	'tech_blogging_image_upload',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tech_blogging_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'tech_blogging_image_upload',
		array(
			'label'   => __( 'Upload Image', 'tech-blogging' ),
			'section' => 'tech_blogging_section',
		)
	)
);
$wp_customize->add_setting(
	'tech_blogging_name',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'default'           => '',
	)
);
$wp_customize->add_control(
	'tech_blogging_name',
	array(
		'label'   => __( 'Name of Banner', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'textarea',
	)
);
$wp_customize->add_setting(
	'tech_blogging_title',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'Modern Technologies', 'tech-blogging' ),
	)
);
$wp_customize->add_control(
	'tech_blogging_title',
	array(
		'label'   => __( 'Title', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'textarea',
	)
);
$wp_customize->add_setting(
	'tech_blogging_description',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'Software & Tech Development for the Future', 'tech-blogging' ),
	)
);
$wp_customize->add_control(
	'tech_blogging_description',
	array(
		'label'   => __( 'Description', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'textarea',
	)
);
$wp_customize->add_setting(
	'tech_blogging_button_text',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => __( 'Discover', 'tech-blogging' ),
	)
);
$wp_customize->add_control(
	'tech_blogging_button_text',
	array(
		'label'   => __( 'Button Text', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'text',
	)
);
$wp_customize->add_setting(
	'tech_blogging_button_link',
	array(
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '#',
	)
);
$wp_customize->add_control(
	'tech_blogging_button_link',
	array(
		'label'   => __( 'Button Link', 'tech-blogging' ),
		'section' => 'tech_blogging_section',
		'type'    => 'url',
	)
);
