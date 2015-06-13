<?php

$redux_opt_name = "pa";

if ( !function_exists( "redux_add_metaboxes" ) ):
    function redux_add_metaboxes($metaboxes) {

    $sectionsTemplate = array();
    $sectionsTemplate[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'        => 'section_page',
                'type'      => 'select',
                'data' => 'terms',
                'args'      => array('taxonomies' => 'section_page'),
                'multi'     => true,
                'title'     => __('Pages', 'redux-framework-demo'),
                'desc'      => __('Select section pages to be displayed).', 'redux-framework-demo'),
            ),
        )
    );
      
    $metaboxes[] = array(
        'id' => 'section-page-metabox',
        'title' => __('Page Sections', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-sections.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $sectionsTemplate
    );

    $sectionSingle = array();
    $sectionSingle[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(

            array(
                'id' => 'section_layout',
                'type' => 'button_set',
                'title'       => __( 'Layout', 'shoestrap' ),
                'options'   => array(
                    1 => 'Left',
                    2 => 'Center',
                    3 => 'Right',
                   // 4 => 'Features',
                ),
                'default'     => 2,
            ),
            array(
                'id'       => 'section_title',
                'type'     => 'button_set',
                'title'    => __( 'Title', 'redux-framework-demo' ),
                'on'       => 'H1',
                'off'      => 'H2',
                'options'  => array(
                    0 => 'None',
                    1 => 'H1',
                    2 => 'H2',
                    3 => 'H3',
                ),
                'default'  => 2,
            ),
            array(
                'id'       => 'section_subtitle',
                'type'     => 'textarea',
                'title'    => __( 'Subtitle', 'redux-framework-demo' ),
            ),
            array(
                'id'       => 'section_img',
                'type'     => 'media',
                'title'    => __( 'Featured Image', 'pressapps' ),
            ),
            array(
                'id'       => 'section_bg',
                'type'     => 'background',
                'title'    => __( 'Background', 'pressapps' ),
                'transparent' => false,
            ),
            array(
                'id'        => 'section_bg_overlay',
                'type'      => 'color_rgba',
                'title'     => 'Background Overlay',
                'transparent'   => false,
            ),
            array(
                'id'       => 'section_height',
                'type'     => 'switch',
                'title'    => __( 'Section Cover Screen', 'redux-framework-demo' ),
                'default'  => 1,
            ),
            array(
                'id'             => 'section_padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'left'          => false,
                'right'         => false,
                'units'          => array('%'),
                'units_extended' => false,
                'title'          => __('Section Padding', 'redux-framework-demo'),
                'default'            => array(
                    'padding-top'     => '8%', 
                    'padding-bottom'  => '8%', 
                    'units'          => '%', 
                )
            ),
            array(
                'id'       => 'section_img_padding',
                'type'     => 'switch',
                'title'    => __( 'Image Side padding', 'redux-framework-demo' ),
                'default'  => 1,
                'required' => array('section_layout','=', array('1', '3')),
            ),
            array(
                'id'       => 'section_text_color',
                'type'     => 'color',
                'title'    => __( 'Text Color', 'pressapps' ),
                'transparent' => false,
                'validate' => 'color',
            ),

        )
    );
      
    $metaboxes[] = array(
        'id' => 'section-page-metabox',
        'title' => __('Section Options', 'pressapps'),
        'post_types' => array('section'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $sectionSingle
    );


    // Page featured header options
    $page_featured_options = array();
    $page_featured_options[] = array(
        'fields'        => array(
            array(
                'id'       => 'header_color',
                'type'     => 'button_set',
                'title'    => __( 'Header Color', 'pressapps' ),
                'default'  => 1,
                'options'  => array(
                    0 => 'None',
                    1 => 'Dark',
                    2 => 'Light',
                ),
            ),
            /*
            array(
                'id'          => 'page_featured_slider',
                'type'        => 'slides',
                'title'         => __( 'Slider', 'pressapps' ),
                'required' => array('page_featured','=','3'),
                'show' => array(
                    'title' => true,
                    'description' => true,
                    'url' => true,
                ),
                'placeholder' => array(
                    'title'           => __( 'Title', 'pressapps'),
                    'description'     => __( 'Subtitle', 'pressapps'),
                    'url'             => __( 'Video link', 'pressapps'),
                ),
            ),
            array(
                'title'     => __( 'Title', 'pressapps' ),
                'id'        => 'page_featured_title',
                'type'      => 'text',
                'default'   => '',
                'required' => array('page_featured','=', array('1', '2')),
                'description' => __( 'Leave blank to display page title in header.', 'pressapps' ),
            ),
            array(
                'title'     => __( 'Subtitle', 'pressapps' ),
                'id'        => 'page_featured_subtitle',
                'type'      => 'text',
                'required' => array('page_featured','=', array('1', '2')),
            ),
            array(
                'title'     => __( 'Video Link', 'pressapps' ),
                'id'        => 'page_featured_video',
                'validate'  => 'url',
                'default'   => '',
                'type'      => 'text',
                'required' => array('page_featured','=', array('1', '2')),
            ),
            array(
                'id'       => 'page_featured_search',
                'type'     => 'switch',
                'title'    => __( 'Search', 'pressapps' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'required' => array('page_featured','=', array('1', '2')),
            ),
            array(
                'id'            => 'page_featured_height',
                'type'          => 'slider',
                'title'         => __( 'Header Height', 'pressapps' ),
                'default'       => 400,
                'min'           => 200,
                'step'          => 10,
                'max'           => 800,
                'display_value' => 'label',
                'required' => array('page_featured','=','1'),
            ),
            array(
                'id'       => 'page_featured_content_color',
                'type'     => 'color',
                'title'    => __( 'Content Color', 'pressapps' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('page_featured','>','0'),
            ),
            array(
                'id'       => 'page_featured_bg_color',
                'type'     => 'color',
                'title'    => __( 'Background Color', 'pressapps' ),
                'transparent' => false,
                'validate' => 'color',
                'required' => array('page_featured','=','1'),
            ),
            array(
                'id'        => 'page_featured_overlay',
                'type'      => 'color_rgba',
                'title'     => 'Overlay',
                'transparent'   => false,
                'required' => array('page_featured','>','1'),
            ),
            */
            /*
            array(
                'id' => 'featured_layout',
                'type' => 'button_set',
                'title'       => __( 'Layout', 'shoestrap' ),
                'options'   => array(
                    1 => 'Left',
                    2 => 'Center',
                    3 => 'Right',
                ),
                'default'     => 2,
            ),
            array(
                'id'       => 'featured_subtitle',
                'type'     => 'text',
                'title'    => __( 'Subtitle', 'redux-framework-demo' ),
            ),
            array(
                'id'       => 'featured_img',
                'type'     => 'media',
                'title'    => __( 'Featured Image', 'pressapps' ),
            ),
            array(
                'id'       => 'featured_bg_color',
                'type'     => 'background',
                'title'    => __( 'Background', 'pressapps' ),
                'transparent' => false,
                //'validate' => 'color',
                //'required' => array('page_featured','=','1'),
                'output'    => '.featured',
            ),

            array(
                'id'       => 'featured_height',
                'type'     => 'switch',
                'title'    => __( 'Featured Section Height', 'redux-framework-demo' ),
                'desc'     => __( 'Display top searched terms under the search field.', 'redux-framework-demo' ),
                'on'       => 'Cover Page',
                'off'      => 'Fixed',
                'default'  => 1,
            ),
            array(
                'id'            => 'featured_height_px',
                'type'          => 'slider',
                'title'         => __( 'Featured Height', 'pressapps' ),
                'default'       => 400,
                'min'           => 200,
                'step'          => 10,
                'max'           => 800,
                'display_value' => 'label',
                'required' => array('featured_height','=','0'),
            ),
            array(
                'id'             => 'featured_padding',
                'type'           => 'spacing',
                'output'         => array('.featured'),
                'mode'           => 'padding',
                'left'          => false,
                'right'         => false,
                'units'          => array('px'),
                'units_extended' => false,
                'title'          => __('Featured Padding', 'redux-framework-demo'),
                'default'            => array(
                    'padding-top'     => '100px', 
                    'padding-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            */


        ),
    );
    $metaboxes[] = array(
        'id'            => 'page-featured-options',
        'title'         => __( 'Header Options', 'pressapps' ),
        'post_types'    => array( 'page' ),
        'position'      => 'normal', 
        'priority'      => 'high', 
        'sidebar'       => false, 
        'sections'      => $page_featured_options,
    );


/*
    $boxLayout = array();
    $boxLayout[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'desc'      => __( 'Select main content and sidebar arrangement.', 'redux-framework-demo' ),
                'id'        => 'layout',
                'type'      => 'image_select',
                'customizer'=> array(),
                'options'   => array( 
                1           => ReduxFramework::$_url . 'assets/img/1c.png',
                2           => ReduxFramework::$_url . 'assets/img/2cl.png',
                3           => ReduxFramework::$_url . 'assets/img/2cr.png',
                )
            ),
            array(
                'id' => 'sidebar',
                'title' => __( 'Sidebar', 'fusion-framework' ),
                'desc' => 'Select custom sidebar, if left blank default "Primary" sidebar is used. You can create custom sidebars under Appearance > Widgets.',
                'type' => 'select',
                'required' => array('layout','>','1'),       
                'data' => 'sidebars',
                'default' => 'None',
            ),
        )
    );
  
    $metaboxes[] = array(
        'id' => 'layout',
        'post_types' => array('page'),
        'position' => 'side', // normal, advanced, side
        'priority' => 'high', // high, core, default, low
        'sections' => $boxLayout
    );

    $boxPost = array();
    $boxPost[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'       => 'reset_post_votes',
                'type'     => 'switch',
                'title'    => __( 'Reset Article Votes', 'redux-framework-demo' ),
                'desc'     => __( 'Reset votes on this article!', 'redux-framework-demo' ),
                'default'  => '0'
            ),
        )
    );
  
    $metaboxes[] = array(
        'id' => 'post-reset',
        'title' => __('Article Options', 'pressapps'),
        'post_types' => array('post'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $boxPost
    );
   
    $knowledgebaseTemplate = array();
    $knowledgebaseTemplate[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'        => 'kb_categories',
                'type'      => 'select',
                'data'      => 'categories',
                'multi'     => true,
                'title'     => __('Categories', 'redux-framework-demo'),
                'desc'      => __('Select categories to display on Knowledge Base page template (If none selected all categories will be displayed).', 'redux-framework-demo'),
            ),
            array(
                'id' => 'kb_columns',
                'type' => 'select',
                'title' => __('Columns Per Page', 'pressapps' ), 
                'desc' => __('Select number of knowledge base columns displayed on page.', 'pressapps' ),
                'options' => array(
                    2 => '2 Columns',
                    3 => '3 Columns',
                    4 => '4 Columns',
                ),
                'default'   => '3', 
            ),
            array(
                'id' => 'kb_aticles_per_cat',
                'type' => 'select',
                'title' => __('Articles Per Category', 'pressapps' ), 
                'desc' => __('Select number of knowledge base articles displayed per category.', 'pressapps' ),
                'options' => array(
                    '3' => '3 Articles',
                    '4' => '4 Articles',
                    '5' => '5 Articles',
                    '6' => '6 Articles',
                    '7' => '7 Articles',
                    '8' => '8 Articles',
                    '10' => '10 Articles',
                    '12' => '12 Articles',
                    '14' => '14 Articles',
                    '18' => '18 Articles',
                    '20' => '20 Articles',
                    '30' => '30 Articles',
                ),
                'default'   => '7', 
            ),
        )
    );
      
    $metaboxes[] = array(
        'id' => 'kb-metabox',
        'title' => __('Knowledge Base Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-knowledgebase.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $knowledgebaseTemplate
    );

    $homeSorter = array();
    $homeSorter[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'       => 'home_sections',
                'type'     => 'sorter',
                'subtitle' => 'You can add multiple drop areas or columns.',
                'compiler' => 'true',
                'options'  => array(
                    'Enabled'  => array(
                        'hero' => 'Hero',
                        'boxes' => 'Boxes',
                        'actions'     => 'Actions',
                        'categories'     => 'Categories',
                        'content' => 'Content',
                        'sidebar' => 'Sidebar',
                        'cta'   => 'CTA'
                    ),
                    'Disabled' => array(),
                ),
            ),
        )
    );
      
    $metaboxes[] = array(
        'id' => 'home-layout-metabox',
        'title' => __('Page Layout Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-home.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $homeSorter
    );

    $homeTemplate = array();
    $homeTemplate[] = array(
        'title' => __('Hero Section', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'id'       => 'hero_bg',
                'type'     => 'background',
                'output'   => array( '.section-hero' ),
                'title'    => __( 'Background', 'redux-framework-demo' ),
                'default'  => array(
                    'background-color' => '#00aff0',
                ),
            ),
            array(
                'id'        => 'hero_bg_overlay',
                'type'      => 'color_rgba',
                'title'     => 'Background Overlay',
                'output'    => array('.section-hero:before'),
                'transparent'   => false,
                'mode'      => 'background-color'
            ),
            array(
                'id'       => 'hero_padding',
                'type'     => 'spacing',
                'output'   => array( '.section-hero' ),
                'mode'     => 'padding',
                'right'         => false,
                'left'          => false,
                'units'         => 'px',
                'title'    => __( 'Padding', 'redux-framework-demo' ),
                'default'  => array(
                    'padding-top'    => '90px',
                    'padding-bottom' => '90px',
                )
            ),
            array(
                'id'       => 'hero_text',
                'type'     => 'color',
                'title'    => __( 'Text Color', 'redux-framework-demo' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
                'output'    => array(
                    'color' => '.section-hero h1, .section-hero h4'
                ),
            ),
            array(
                'id'       => 'subtitle',
                'type'     => 'text',
                'title'    => __( 'Subtitle', 'redux-framework-demo' ),
            ),
            array(
                'id' => 'headline_search',
                'type' => 'button_set',
                'title'       => __( 'Search', 'shoestrap' ),
                'desc'        => __( 'Display a search form in the hero section.', 'shoestrap' ),
                'options'   => array(
                    '0' => 'Disabled',
                    '1' => 'WP Search',
                    '2' => 'Live Search',
                ),
            ),
            array(
                'id'       => 'top_searches',
                'type'     => 'switch',
                'title'    => __( 'Top Searched Terms', 'redux-framework-demo' ),
                'desc'     => __( 'Display top searched terms under the search field.', 'redux-framework-demo' ),
                'default'  => 1
            ),
            array(
                'id'       => 'top_searches_title',
                'type'     => 'text',
                'title'    => __( 'Title', 'redux-framework-demo' ),
                'required'    => array('top_searches','=',array('1')),
                'default'  => 'Common searches:',
            ),
            array(
                'id' => 'top_searches_period',
                'type' => 'button_set',
                'title'       => __( 'Search Period', 'shoestrap' ),
                'desc'        => __( 'Display top searches for a selected time period.', 'shoestrap' ),
                'required'    => array('top_searches','=',array('1')),
                'options'   => array(
                    '1' => '1 Day',
                    '7' => '1 Week',
                    '30' => '1 Month',
                    '999999' => 'All Time',
                ),
                'default'  => '999999',
            ),
            array(
                'id'      => 'top_searches_terms',
                'type'    => 'spinner',
                'title'   => __( 'Number of Terms', 'redux-framework-demo' ),
                'desc'    => __( 'Select how many search terms to display.', 'redux-framework-demo' ),
                'required'    => array('top_searches','=',array('1')),
                'default' => '4',
                'min'     => '1',
                'step'    => '1',
                'max'     => '20',
            ),
        )
    );

    $homeTemplate[] = array(
        'title' => __('Boxes Section', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'boxes_title',
                'default'   => '',
                'type'      => 'text'
            ),
            array(
                'id' => 'number_of_boxes',
                'type' => 'button_set',
                'title'       => __( 'Number of Boxes', 'shoestrap' ),
                'options'   => array(
                    2 => '2 Boxes',
                    3 => '3 Boxes',
                    4 => '4 Boxes',
                ),
                'default' => '3',
            ),
            array(
                'id'       => 'section-box1',
                'type'     => 'section',
                'title'    => __( 'Box 1', 'redux-framework-demo' ),
                'indent'   => true, 
            ),
            array(
                'id'=>'box_1_icon',
                'type' => 'icon_select', 
                'title' => __('Icon', 'redux-framework-demo'),
                'default'     => '',
                'enqueue' => false, 
                'enqueue_frontend' => false, 
                'stylesheet' => get_template_directory_uri() . '/assets/css/icons.min.css', 
                'prefix' => '', 
                'selector' => 'icon-', 
                'height' => 200 
            ),
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'box_1_title',
                'default'   => '',
                'type'      => 'text'
            ),
            array(
                'id'=>'box_1_text',
                'type' => 'textarea',
                'title' => __('Text', 'redux-framework-demo'), 
                'default' => '',
            ),
            array(
                'title'     => __( 'Url', 'shoestrap' ),
                'id'        => 'box_1_url',
                'default'   => '',
                'type'      => 'text',
                'validate'  => 'url',
            ),
            array(
                'id'       => 'section-box2',
                'type'     => 'section',
                'title'    => __( 'Box 2', 'redux-framework-demo' ),
                'indent'   => true, 
            ),
            array(
                'id'=>'box_2_icon',
                'type' => 'icon_select', 
                'title' => __('Icon', 'redux-framework-demo'),
                'default'     => '',
                'enqueue' => false, 
                'enqueue_frontend' => false, 
                'stylesheet' => get_template_directory_uri() . '/assets/css/icons.min.css', 
                'prefix' => '', 
                'selector' => 'icon-', 
                'height' => 200 
            ),
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'box_2_title',
                'default'   => '',
                'type'      => 'text'
            ),
            array(
                'id'=>'box_2_text',
                'type' => 'textarea',
                'title' => __('Text', 'redux-framework-demo'), 
                'default' => '',
            ),
            array(
                'title'     => __( 'Url', 'shoestrap' ),
                'id'        => 'box_2_url',
                'default'   => '',
                'type'      => 'text',
                'validate'  => 'url',
            ),
            array(
                'id'       => 'section-box3',
                'type'     => 'section',
                'title'    => __( 'Box 3', 'redux-framework-demo' ),
                'indent'   => true, 
                'required' => array( 'number_of_boxes', 'equals', array( '3', '4' ) ),
            ),
            array(
                'id'=>'box_3_icon',
                'type' => 'icon_select', 
                'title' => __('Icon', 'redux-framework-demo'),
                'default'     => '',
                'enqueue' => false, 
                'enqueue_frontend' => false, 
                'stylesheet' => get_template_directory_uri() . '/assets/css/icons.min.css', 
                'prefix' => '', 
                'selector' => 'icon-', 
                'height' => 200,
                'required' => array( 'number_of_boxes', 'equals', array( '3', '4' ) ),
            ),
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'box_3_title',
                'default'   => '',
                'type'      => 'text',
                'required' => array( 'number_of_boxes', 'equals', array( '3', '4' ) ),
            ),
            array(
                'id'=>'box_3_text',
                'type' => 'textarea',
                'title' => __('Text', 'redux-framework-demo'), 
                'default' => '',
                'required' => array( 'number_of_boxes', 'equals', array( '3', '4' ) ),
            ),
            array(
                'title'     => __( 'Url', 'shoestrap' ),
                'id'        => 'box_3_url',
                'default'   => '',
                'type'      => 'text',
                'validate'  => 'url',
                'required' => array( 'number_of_boxes', 'equals', array( '3', '4' ) ),
            ),
            array(
                'id'       => 'section-box4',
                'type'     => 'section',
                'title'    => __( 'Box 4', 'redux-framework-demo' ),
                'indent'   => true, 
                'required' => array( 'number_of_boxes', 'equals', '4' ),
            ),
            array(
                'id'=>'box_4_icon',
                'type' => 'icon_select', 
                'title' => __('Icon', 'redux-framework-demo'),
                'default'     => '',
                'enqueue' => false, 
                'enqueue_frontend' => false, 
                'stylesheet' => get_template_directory_uri() . '/assets/css/icons.min.css', 
                'prefix' => '', 
                'selector' => 'icon-', 
                'height' => 200,
                'required' => array( 'number_of_boxes', 'equals', '4' ),
            ),
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'box_4_title',
                'default'   => '',
                'type'      => 'text',
                'required' => array( 'number_of_boxes', 'equals', '4' ),
            ),
            array(
                'id'=>'box_4_text',
                'type' => 'textarea',
                'title' => __('Text', 'redux-framework-demo'), 
                'default' => '',
                'required' => array( 'number_of_boxes', 'equals', '4' ),
            ),
            array(
                'title'     => __( 'Url', 'shoestrap' ),
                'id'        => 'box_4_url',
                'default'   => '',
                'type'      => 'text',
                'validate'  => 'url',
                'required' => array( 'number_of_boxes', 'equals', '4' ),
            ),
        )
    );

    $homeTemplate[] = array(
        'title' => __('Actions Section', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'section_actions_title',
                'default'   => 'I want to...',
                'type'      => 'text'
            ),
            array(
                'id'        => 'section_actions_include',
                'title'     => __('Actions', 'redux-framework-demo'),
                'type'      => 'select',
                'data'      => 'terms',
                'args'      => array('taxonomies'=>'actions'),
                'multi'     => true,
                'desc'      => __('Select actions to display in section (If none selected all actions will be displayed).', 'redux-framework-demo'),
            ),
            array(
                'id' => 'section_actions_columns',
                'type' => 'select',
                'title' => __('Columns', 'pressapps' ), 
                'desc' => __('Select number columns to display in section.', 'pressapps' ),
                'options' => array(
                    2 => '2 Columns',
                    3 => '3 Columns',
                    4 => '4 Columns',
                    6 => '6 Columns',
                ),
                'default'   => 3, 
            ),
        )
    );

    $homeTemplate[] = array(
        'title' => __('Categories Section', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'section_categories_title',
                'default'   => 'Browse Help Topics',
                'type'      => 'text'
            ),
            array(
                'id'        => 'section_categories_include',
                'title'     => __('Categories', 'redux-framework-demo'),
                'type'      => 'select',
                'data'      => 'categories',
                'multi'     => true,
                'desc'      => __('Select categories to display in section (If none selected all categories will be displayed).', 'redux-framework-demo'),
            ),
            array(
                'id' => 'section_categories_columns',
                'type' => 'select',
                'title' => __('Columns', 'pressapps' ), 
                'desc' => __('Select number columns to display in section.', 'pressapps' ),
                'options' => array(
                    2 => '2 Columns',
                    3 => '3 Columns',
                    4 => '4 Columns',
                    6 => '6 Columns',
                ),
                'default'   => 3, 
            ),
        )
    );

    $homeTemplate[] = array(
        'title' => __('CTA Section', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'id'       => 'call_to_action',
                'type'     => 'editor',
                'title'    => __( 'Call To Action Content', 'redux-framework-demo' ),
                'args'   => array(
                    'teeny'            => false,
                )
            ),
            array(
                'id'       => 'cta_bg',
                'type'     => 'color',
                'title'    => __( 'Call To Action Background', 'redux-framework-demo' ),
                'transparent' => false,
                'validate' => 'color',
                'mode'     => 'background',
                'output'   => '.cta-content',
            ),
        )
    );

    $metaboxes[] = array(
        'id' => 'home-metabox',
        'title' => __('Sections Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-home.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $homeTemplate
    );

    $contactTemplate = array();
    $contactTemplate[] = array(
        'fields' => array(
            array(
                'id'        => 'contact_email',
                'type'      => 'text',
                'title'     => __('Contact Form Email Address', 'redux-framework-demo'),
                'desc'      => __('Enter the email address where want to receive emails from the contact form or leave blank to use default admin email.', 'redux-framework-demo'),
                'validate'  => 'email',
                'default'   => '',
            ),
            array(
                'id'        => 'contact_subject',
                'type'      => 'text',
                'title'     => __('Contact Form Subject', 'redux-framework-demo'),
                'desc'      => __('Enter the subject for the contact form or leave blank to use default subject.', 'redux-framework-demo'),
                'default'   => '',
            ),
        )
    );
      
    $metaboxes[] = array(
        'id' => 'contact-metabox',
        'title' => __('Contact Form Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-contact.php'),
        'position' => 'normal', 
        'priority' => 'core', 
        'sections' => $contactTemplate
    );
*/
    // Kind of overkill, but ahh well.  ;)
    //$metaboxes = apply_filters( 'your_custom_redux_metabox_filter_here', $metaboxes );

    return $metaboxes;
  }
  add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'redux_add_metaboxes');
endif;

// The loader will load all of the extensions automatically based on your $redux_opt_name
require_once(dirname(__FILE__).'/loader.php');
