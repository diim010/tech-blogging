<?php
$font_choices = array(
	'Source Sans Pro:400,700,400italic,700italic'  => '<li>' . 'Source Sans Pro' . '</li>',
	'Open Sans:400italic,700italic,400,700'        => 'Open Sans',
	'Oswald:400,700'                               => 'Oswald',
	'Playfair Display:400,700,400italic'           => 'Playfair Display',
	'Montserrat:400,700'                           => 'Montserrat',
	'Raleway:400,700'                              => 'Raleway',
	'Droid Sans:400,700'                           => 'Droid Sans',
	'Lato:400,700,400italic,700italic'             => 'Lato',
	'Arvo:400,700,400italic,700italic'             => 'Arvo',
	'Lora:400,700,400italic,700italic'             => 'Lora',
	'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
	'Oxygen:400,300,700'                           => 'Oxygen',
	'PT Serif:400,700'                             => 'PT Serif',
	'PT Sans:400,700,400italic,700italic'          => 'PT Sans',
	'PT Sans Narrow:400,700'                       => 'PT Sans Narrow',
	'Cabin:400,700,400italic'                      => 'Cabin',
	'Fjalla One:400'                               => 'Fjalla One',
	'Francois One:400'                             => 'Francois One',
	'Josefin Sans:400,300,600,700'                 => 'Josefin Sans',
	'Libre Baskerville:400,400italic,700'          => 'Libre Baskerville',
	'Arimo:400,700,400italic,700italic'            => 'Arimo',
	'Ubuntu:400,700,400italic,700italic'           => 'Ubuntu',
	'Bitter:400,700,400italic'                     => 'Bitter',
	'Droid Serif:400,700,400italic,700italic'      => 'Droid Serif',
	'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900' => 'Roboto',
	'Open Sans Condensed:700,300italic,300'        => 'Open Sans Condensed',
	'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
	'Roboto Slab:400,700'                          => 'Roboto Slab',
	'Yanone Kaffeesatz:400,700'                    => 'Yanone Kaffeesatz',
	'Rokkitt:400'                                  => 'Rokkitt',
	'Poppins:400,500,600,700,800,900'              => 'Poppins',
	'Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900' => 'Nunito',
	'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700' => 'Josefin',
);
$wp_customize->add_section(
	'typography',
	array(
		'priority'   => 6,
		'panel'      => 'tech-blogging',
		'title'      => __( 'Typography', 'tech-blogging' ),
		'capability' => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'tech_blogging_heading_fonts',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'tech_blogging_sanitize_fonts',
		'default'           => 'system-ui:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	)
);
$wp_customize->add_control(
	'tech_blogging_heading_fonts',
	array(
		'type'    => 'select',
		'label'   => __( 'Heading Font Family', 'tech-blogging' ),
		'section' => 'typography',
		'choices' => $font_choices,
	)
);
$wp_customize->add_setting(
	'tech_blogging_body_fonts',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'tech_blogging_sanitize_fonts',
		'default'           => 'Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
	)
);
$wp_customize->add_control(
	'tech_blogging_body_fonts',
	array(
		'type'    => 'select',
		'label'   => __( 'Body Font Family', 'tech-blogging' ),
		'section' => 'typography',
		'choices' => $font_choices,
	)
);
$wp_customize->add_setting(
	'tech_blogging_body_fonts_size',
	array(
		'transport'         => 'refresh',
		'default'           => 15,
		'sanitize_callback' => 'tech_blogging_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'tech_blogging_body_fonts_size',
	array(
		'type'    => 'number',
		'label'   => __( 'Body Font Size', 'tech-blogging' ),
		'section' => 'typography',
	)
);
$wp_customize->add_setting(
	'tech_blogging_body_fonts_weight',
	array(
		'transport'         => 'refresh',
		'default'           => 400,
		'sanitize_callback' => 'tech_blogging_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'tech_blogging_body_fonts_weight',
	array(
		'type'    => 'select',
		'label'   => __( 'Body Font Weight', 'tech-blogging' ),
		'section' => 'typography',
		'choices' => array(
			'100'  => __( '100', 'tech-blogging' ),
			'200'  => __( '200', 'tech-blogging' ),
			'300'  => __( '300', 'tech-blogging' ),
			'400'  => __( '400', 'tech-blogging' ),
			'500'  => __( '500', 'tech-blogging' ),
			'600'  => __( '600', 'tech-blogging' ),
			'700'  => __( '700', 'tech-blogging' ),
			'800'  => __( '800', 'tech-blogging' ),
			'900'  => __( '900', 'tech-blogging' ),
			'1100' => __( '1100', 'tech-blogging' ),
		),
	)
);
$wp_customize->add_setting(
	'tech_blogging_body_fonts_line_height',
	array(
		'transport'         => 'refresh',
		'default'           => 28,
		'sanitize_callback' => 'tech_blogging_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'tech_blogging_body_fonts_line_height',
	array(
		'type'    => 'number',
		'label'   => __( 'Body Line Height', 'tech-blogging' ),
		'section' => 'typography',
	)
);
