<?php
$wp_customize->add_section(
	'social_links',
	array(
		'priority'    => 1,
		'panel'       => 'tech-blogging',
		'title'       => __( 'Social Links', 'tech-blogging' ),
		'description' => __( 'Social Links. to disable social Icon keep that fields empty.', 'tech-blogging' ),
		'capability'  => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'facebook',
	array(
		'default'           => '',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'facebook',
	array(
		'label'   => __( 'Facebook Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'twitter',
	array(
		'default'           => '',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'twitter',
	array(
		'label'   => __( 'twitter Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'pinterest',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'pinterest',
	array(
		'label'   => __( 'pinterest Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'youtube',
	array(
		'default'           => '',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'youtube',
	array(
		'label'   => __( 'youtube Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'amazon',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'amazon',
	array(
		'label'   => __( 'Amazon Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'linkedin',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'linkedin',
	array(
		'label'   => __( 'linkedin Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'instagram',
	array(
		'default'           => '',
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'instagram',
	array(
		'label'   => __( 'Instagram Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'github',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'github',
	array(
		'label'   => __( 'github Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'stumbleupon',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'stumbleupon',
	array(
		'label'   => __( 'stumbleupon Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'tumblr',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'tumblr',
	array(
		'label'   => __( 'tumblr Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'whatsapp',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'whatsapp',
	array(
		'label'   => __( 'WhatsApp Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'weixin',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'weixin',
	array(
		'label'   => __( 'weixin Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'snapchat',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'snapchat',
	array(
		'label'   => __( 'snapchat Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'qq',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'qq',
	array(
		'label'   => __( 'QQ Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
$wp_customize->add_setting(
	'reddit',
	array(
		'transport'         => 'refresh', // Options: refresh or postMessage.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'reddit',
	array(
		'label'   => __( 'reddit Link', 'tech-blogging' ),
		'section' => 'social_links',
		'type'    => 'url',
	)
);
