<?php
/**
 * Output dynamic CSS at bottom of HEAD
 */
add_action('wp_head','pa_output_css');

function pa_output_css() {
    global $post, $pa, $meta;

    if ( function_exists( 'redux_post_meta' ) && get_the_ID() ) {
        $meta = redux_post_meta( 'pa', get_the_ID() );
    } else {
        $meta = '';
    }

    $output = '';

    if ($meta['header_color'] == 1) {
       $output .= '.navbar-default .navbar-nav>li>a { color: #000; opacity: 0.8; }';
       $output .= '.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>li>a:hover { color: #000; opacity: 1; }';
    } else {
       $output .= '.navbar-default .navbar-nav>li>a, .navbar-default .navbar-nav>li>a:focus { color: #fff; opacity: 0.8; }';
       $output .= '.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>li>a:hover { color: #fff; opacity: 1; }';
       $output .= '.navbar-default .navbar-toggle .icon-bar { background-color: #fff; }';
    }


    /*
    $output .= '.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > li > a:hover { color: ' . $pa['primary_color']['regular'] . '; }';
    $output .= '.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus, .dropdown-menu > li > a:hover { background-color: ' . $pa['primary_color']['regular'] . '; }';

    $output .= '.btn-primary, .comment-form input[type="submit"] { background-color: ' . $pa['primary_color']['regular'] . '; border-color: ' . $pa['primary_color']['regular'] . '}';
    $output .= '.btn-primary:hover, .btn-primary:focus, .comment-form input[type="submit"]:hover { background-color: ' . $pa['primary_color']['hover'] . '; border-color: ' . $pa['primary_color']['hover'] . '}';

    $output .= '.pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus { background-color: ' . $pa['primary_color']['regular'] . '; border-color: ' . $pa['primary_color']['regular'] . ';}';
    $output .= '.pagination > li > a, .pagination > li > a:hover { color: ' . $pa['primary_color']['regular'] . ';}';
    $output .= '.pagination > li > a:hover, .pagination > li > a:focus { background-color: ' . $pa['primary_color']['regular'] . '; border-color: ' . $pa['primary_color']['regular'] . ';}';

    $output .= '.widget .sharrre a:hover span { color: ' . $pa['primary_color']['regular'] . ';}';
    $output .= '.error404 .featured { background-color: ' . $pa['primary_color']['regular'] . ';}';
    $output .= '.to-top:hover, .buy { background-color: ' . $pa['primary_color']['regular'] . ';}';

    // Fullcalendar
    $output .= '.fc-event { background-color: ' . $pa['primary_color']['regular'] . '; border-color: ' . $pa['primary_color']['regular'] . ';}';

    //$output .= '.footer-divider {border-color:' . $pa['footer_content_color'] . ';}';
    $output .= '.footer-icons a {color:' . $pa['footer_content_color'] . '; border-color:' . $pa['footer_content_color'] . ';}';
    $output .= '.footer-icons a:hover {background-color:' . $pa['primary_color']['regular'] . '; border-color:' . $pa['primary_color']['regular'] . ';}';
    
    $output .= '.autocomplete-suggestions strong { color:' . $pa['primary_color']['regular'] . ';}';

    // Woocommerce
    $output .= '.woocommerce .woocommerce-info:before { color:' . $pa['primary_color']['regular'] . ';}';
    $output .= '.woocommerce .woocommerce-info { border-top-color:' . $pa['primary_color']['regular'] . ';}';
    $output .= '.woocommerce input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button { background-color:' . $pa['primary_color']['regular'] . ';}';
    $output .= '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt { background-color:' . $pa['primary_color']['regular'] . ';}';
    $output .= '.woocommerce input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover { background-color:' . $pa['primary_color']['hover'] . ';}';
    $output .= '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover { background-color:' . $pa['primary_color']['hover'] . ';}';
    // Course archive, taxonomy featured header
    if ( is_post_type_archive('course') || is_tax('course_category') ) {
        if ($pa['courses_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $pa['courses_featured_height'] . 'px; } }';
        }
        if ($pa['courses_featured'] > 0 && !empty($pa['courses_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i { color: ' . $pa['courses_featured_content_color'] . '; }';
        }
        if ($pa['courses_featured'] == 1 && !empty($pa['courses_featured_bg_color'])) {
            $output .= '.featured { background-color: ' . $pa['courses_featured_bg_color'] . '; }';
        }
        if ($pa['courses_featured'] == 2 && !empty($pa['courses_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $pa['courses_featured_overlay']['rgba'] . '; }';
        }
        if ($pa['courses_featured'] == 3 && !empty($pa['courses_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $pa['courses_featured_overlay']['rgba'] . '; }';
        }
    } elseif ( is_post_type_archive('event') || is_tax('event_category') ) {
        if ($pa['events_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $pa['events_featured_height'] . 'px; } }';
        }
        if ($pa['events_featured'] > 0 && !empty($pa['events_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i { color: ' . $pa['events_featured_content_color'] . '; }';
        }
        if ($pa['events_featured'] == 1 && !empty($pa['events_featured_bg_color'])) {
            $output .= '.featured { background-color: ' . $pa['events_featured_bg_color'] . '; }';
        }
        if ($pa['events_featured'] == 2 && !empty($pa['events_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $pa['events_featured_overlay']['rgba'] . '; }';
        }
        if ($pa['events_featured'] == 3 && !empty($pa['events_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $pa['events_featured_overlay']['rgba'] . '; }';
        }
    // Blog pages featured header
    } elseif ( is_home() || is_archive() ) {
        if ($pa['blog_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $pa['blog_featured_height'] . 'px; } }';
        }
        if ($pa['blog_featured'] > 0 && !empty($pa['blog_featured_content_color'])) {
            $output .= '.featured h1, .featured h3 { color: ' . $pa['blog_featured_content_color'] . '; }';
        }
        if ($pa['blog_featured'] == 1 && !empty($pa['blog_featured_bg_color'])) {
            $output .= '.featured { background-color: ' . $pa['blog_featured_bg_color'] . '; }';
        }
        if ($pa['blog_featured'] == 2 && !empty($pa['blog_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $pa['blog_featured_overlay']['rgba'] . '; }';
        }
    // Search results header
    } elseif ( is_home() || is_archive() || is_search() ) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: 500px; } }';
            $output .= '.featured { background-color: ' . $pa['primary_color']['regular'] . '; }';
    // Page featured header
    } elseif ( is_page() ) {
        if ($meta['page_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $meta['page_featured_height'] . 'px; } }';
            if ( !empty($meta['page_featured_bg_color']) ) {
                $output .= '.featured { background-color: ' . $meta['page_featured_bg_color'] . '; }';
            } else {
                $output .= '.featured { background-color: ' . $pa['primary_color']['regular'] . '; }';
            }
        }
        if ($meta['page_featured'] > 0 && !empty($meta['page_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i { color: ' . $meta['page_featured_content_color'] . '; }';
        }
        if ($meta['page_featured'] == 2 && !empty($meta['page_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $meta['page_featured_overlay']['rgba'] . '; }';
        }
        if ($meta['page_featured'] == 3 && !empty($meta['page_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $meta['page_featured_overlay']['rgba'] . '; }';
        }
    // Post featured header
    } elseif ( is_singular('post') ) {
        if ($meta['post_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $meta['post_featured_height'] . 'px; } }';
            if ( !empty($meta['post_featured_bg_color']) ) {
                $output .= '.featured { background-color: ' . $meta['post_featured_bg_color'] . '; }';
            } else {
                $output .= '.featured { background-color: ' . $pa['primary_color']['regular'] . '; }';
            }
        }
        if ($meta['post_featured'] > 0 && !empty($meta['post_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i { color: ' . $meta['post_featured_content_color'] . '; }';
        }
        if ($meta['post_featured'] == 2 && !empty($meta['post_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $meta['post_featured_overlay']['rgba'] . '; }';
        }
        if ($meta['post_featured'] == 3 && !empty($meta['post_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $meta['post_featured_overlay']['rgba'] . '; }';
        }
    // Course featured header
    } elseif ( is_singular('course') ) {
        if ($meta['course_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $meta['course_featured_height'] . 'px; } }';
            if ( !empty($meta['course_featured_bg_color']) ) {
                $output .= '.featured { background-color: ' . $meta['course_featured_bg_color'] . '; }';
            } else {
                $output .= '.featured { background-color: ' . $pa['primary_color']['regular'] . '; }';
            }
        }
        if ($meta['course_featured'] > 0 && !empty($meta['course_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i { color: ' . $meta['course_featured_content_color'] . '; }';
        }
        if ($meta['course_featured'] == 2 && !empty($meta['course_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $meta['course_featured_overlay']['rgba'] . '; }';
        }
        if ($meta['course_featured'] == 3 && !empty($meta['course_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $meta['course_featured_overlay']['rgba'] . '; }';
        }
    // Event featured header
    } elseif ( is_singular('event') ) {
        if ($meta['event_featured'] == 1) {
            $output .= '@media (max-width: 767px) { .featured { height: 330px; } }';
            $output .= '@media (min-width: 768px) { .featured { height: ' . $meta['event_featured_height'] . 'px; } }';
            if ( !empty($meta['event_featured_bg_color']) ) {
                $output .= '.featured { background-color: ' . $meta['event_featured_bg_color'] . '; }';
            } else {
                $output .= '.featured { background-color: ' . $pa['primary_color']['regular'] . '; }';
            }
        }
        if ($meta['event_featured'] > 0 && !empty($meta['event_featured_content_color'])) {
            $output .= '.featured h1, .featured h2, .featured h3, .featured .caption i, .countdown div { color: ' . $meta['event_featured_content_color'] . '; } .countdown div span { border-top: 1px solid ' . $meta['event_featured_content_color'] . '; }';
        }
        if ($meta['event_featured'] == 2 && !empty($meta['event_featured_overlay'])) {
            $output .= '.featured:before { background-color: ' . $meta['event_featured_overlay']['rgba'] . '; }';
        }
        if ($meta['event_featured'] == 3 && !empty($meta['event_featured_overlay'])) {
            $output .= '.item:before { background-color: ' . $meta['event_featured_overlay']['rgba'] . '; }';
        }
    } else {

    }
*/
    $output .= $pa['custom_css'];

    if ( ! empty( $output ) ) {
        echo '<style type="text/css" id="lms-css">' . $output . '</style>';
    }
}


/**
 * Login Styles
 */

function pa_login_css() {

    global $pa;

    $output = '';

    // Bg color
    $output .= 'body.login { background-color: ' . $pa['login_bg_color'] . '; }';

    // Bg image
    if ( !empty($pa['login_bg_img']['url']) ) {
        $output .= 'body.login { background: url(' . $pa['login_bg_img']['url'] . ') no-repeat center fixed; background-size: cover; }';
    }
    // Overlay
    if ( !empty($pa['login_bg_overlay']['rgba']) ) {
        $output .= 'body.login:before { background: ' . $pa['login_bg_overlay']['rgba'] . '; }';
    }

    // Logo
    if ( !empty($pa['login_logo']['url']) ) {
        $output .= 'body.login div#login h1 a { background-image: url(' . $pa['login_logo']['url'] . '); padding-bottom: 30px; }';
    } else {
        $output .= 'body.login div#login h1 a { display: none; }';
    }

    // Form bg
    if ( !empty($pa['login_form_bg']['rgba']) ) {
        $output .= 'body.login form { background-color: ' . $pa['login_form_bg']['rgba'] . '; }';
    }

    // Labels
    $output .= '.login form label { color: ' . $pa['login_label_color'] . '; }';

    // Button
    $output .= '.wp-core-ui .button-primary { background-color: ' . $pa['login_btn']['regular'] . '; }';
    $output .= '.wp-core-ui .button-primary:hover { background-color: ' . $pa['login_btn']['hover'] . '; }';

    // Links
    $output .= 'body.login #nav a, .login #backtoblog a, .login #nav, .login #backtoblog { color: ' . $pa['login_links']['regular'] . '; }';
    $output .= 'body.login #nav a:hover, .login #backtoblog a:hover { color: ' . $pa['login_links']['hover'] . '; }';

    if( !empty( $output ) ){
        echo '<style>' . $output . ' </style>';
    }
}

//add_action('login_enqueue_scripts', 'pa_login_css');


