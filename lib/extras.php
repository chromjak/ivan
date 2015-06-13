<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    //$classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' <br> <h4 class="excerpt-more"><a href="' . get_permalink() . '">' . __('Read More', 'sage') . '</a></h4>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Manage output of wp_title()
 */
function wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
//add_filter('wp_title', __NAMESPACE__ . '\\wp_title', 10);


/**
 * Register sections CPT
 */
add_action( 'init', __NAMESPACE__ . '\\section_init' );

function section_init() {

  register_taxonomy(
    'section_page',
    'section',
    array(
      'hierarchical' => true,
      'labels' => array(
        'name'              => _x( 'Page', 'taxonomy general name', 'pressapps' ),
        'singular_name'     => _x( 'Page', 'taxonomy singular name', 'pressapps' ),
        'search_items'      => __( 'Search Pages', 'pressapps' ),
        'all_items'         => __( 'All Pages', 'pressapps' ),
        'parent_item'       => __( 'Parent Page', 'pressapps' ),
        'parent_item_colon' => __( 'Parent Page:', 'pressapps' ),
        'edit_item'         => __( 'Edit Page', 'pressapps' ),
        'update_item'       => __( 'Update Page', 'pressapps' ),
        'add_new_item'      => __( 'Add New Page', 'pressapps' ),
        'new_item_name'     => __( 'New Page Name', 'pressapps' ),
        'menu_name'         => __( 'Pages', 'pressapps' ),
      ),
    )
  );

  $labels = array(
    'name'               => _x( 'Sections', 'post type general name', 'pressapps' ),
    'singular_name'      => _x( 'Section', 'post type singular name', 'pressapps' ),
    'menu_name'          => _x( 'Sections', 'admin menu', 'pressapps' ),
    'name_admin_bar'     => _x( 'Section', 'add new on admin bar', 'pressapps' ),
    'add_new'            => _x( 'Add New', 'book', 'pressapps' ),
    'add_new_item'       => __( 'Add New Section', 'pressapps' ),
    'new_item'           => __( 'New Section', 'pressapps' ),
    'edit_item'          => __( 'Edit Section', 'pressapps' ),
    'view_item'          => __( 'View Section', 'pressapps' ),
    'all_items'          => __( 'All Sections', 'pressapps' ),
    'search_items'       => __( 'Search Sections', 'pressapps' ),
    'parent_item_colon'  => __( 'Parent Sections:', 'pressapps' ),
    'not_found'          => __( 'No section found.', 'pressapps' ),
    'not_found_in_trash' => __( 'No section found in Trash.', 'pressapps' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'section' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  );

  register_post_type( 'section', $args );
}