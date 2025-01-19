<?php
/*
*
*   Custom functions
*
*/

// Register custom post type Reviews
function register_reviews_post_type() {
    $labels = array(
        'name' => _x('Reviews', 'Post Type General Name', 'tech-blogging'),
        'singular_name' => _x('Review', 'Post Type Singular Name', 'tech-blogging'),
        'menu_name' => __('Reviews', 'tech-blogging'),
        'add_new' => __('Add New', 'tech-blogging'),
        'add_new_item' => __('Add New Review', 'tech-blogging'),
        'edit_item' => __('Edit Review', 'tech-blogging'),
    );

    $args = array(
        'label' => __('Reviews', 'tech-blogging'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-filled',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => false,
    );

    register_post_type('reviews', $args);
}
add_action('init', 'register_reviews_post_type');

// Register Reviews Category taxonomy
function register_reviews_category_taxonomy() {
    $labels = array(
        'name' => _x('Reviews Categories', 'Taxonomy General Name', 'tech-blogging'),
        'singular_name' => _x('Reviews Category', 'Taxonomy Singular Name', 'tech-blogging'),
        'menu_name' => __('Reviews Categories', 'tech-blogging'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'show_in_rest' => true,
    );

    register_taxonomy('reviews_category', array('reviews'), $args);
}
add_action('init', 'register_reviews_category_taxonomy');

// Remove category base from URLs
function remove_category_base($permalink, $post, $leavename) {
    if (strpos($permalink, '%category%') !== false) {
        $categories = get_the_category($post->ID);
        if ($categories) {
            $category = $categories[0];
            $permalink = str_replace('%category%', $category->slug, $permalink);
        }
    }
    return $permalink;
}
add_filter('post_link', 'remove_category_base', 10, 3);

// Allow SVG upload
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Add dynamic year to theme
function get_dynamic_year() {
    return date('Y');
}
add_shortcode('current_year', 'get_dynamic_year');

// Add language switcher to header
function add_language_switcher() {
    if (function_exists('pll_the_languages')) {
        echo '<div class="language-switcher">';
        pll_the_languages(array('show_flags' => 1, 'show_names' => 1));
        echo '</div>';
    }
}
add_action('tech_blogging_header', 'add_language_switcher');