<?php
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Primary Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'footer_background_color',
	array(
		'default'           => '#1a1a1a',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'footer_background_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Footer Background', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'tech_blogging_title_color',
	array(
		'default'           => '#000000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'tech_blogging_title_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Title Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'tech_blogging_paragraph_color',
	array(
		'default'           => '#979797',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'tech_blogging_paragraph_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Description Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'button_bg_color',
	array(
		'default'           => 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'button_bg_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Button Background Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'button_text_color',
	array(
		'default'           => '#ffffff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'button_text_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Button Text Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'copyright_top_br_color',
	array(
		'default'           => '#262626',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'copyright_top_br_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Copyright Top Border Color', 'tech-blogging' ),
		)
	)
);
$wp_customize->add_setting(
	'copyright_text_color',
	array(
		'default'           => '#ffffff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'copyright_text_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Copyright Text Color', 'tech-blogging' ),
		)
	)
);

$wp_customize->add_setting(
	'header_bg_color',
	array(
		'default'           => '#ffffff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'header_bg_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Top Header Color', 'tech-blogging' ),
		)
	)
);
