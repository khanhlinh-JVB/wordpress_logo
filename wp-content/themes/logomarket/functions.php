<?php

add_action('after_setup_theme', 'logomarket_setup');

if (!function_exists('logomarket_setup')) :

    function logomarket_setup() {

        add_theme_support('post-thumbnails');
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'logomarket'),
            'primary_second' => __('Second Links Menu', 'logomarket'),
            'designer' => __('Designer Links Menu', 'logomarket'),
        ));

        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        add_theme_support('custom-logo', array(
            'height' => 40,
            'width' => 180,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
        ));
    }

endif;

add_action('wp_enqueue_scripts', 'logomarket_scripts');

function logomarket_scripts() {
    wp_enqueue_style('logomarket-style', get_stylesheet_uri());
    wp_enqueue_style('logomarket-mplus', get_template_directory_uri() . '/css/mplus.css', array(), null);
    wp_enqueue_style('logomarket-font', get_template_directory_uri() . '/css/font.css', array(), null);
    wp_enqueue_style('logomarket-common', get_template_directory_uri() . '/css/common.css', array(), null);
    wp_enqueue_style('logomarket-icon', get_template_directory_uri() . '/css/icon.css', array(), null);
    wp_enqueue_style('logomarket-component', get_template_directory_uri() . '/css/component.css', array(), null);
    wp_enqueue_style('logomarket-jquerymmenuall', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), null);
    wp_enqueue_style('logomarket-customize', get_template_directory_uri() . '/css/customize.css', array(), null);

    // Theme stylesheet.
    wp_enqueue_script('logomarket-jquery', get_template_directory_uri() . '/js/jquery-1.12.1.min.js', array(), null);
    wp_enqueue_script('logomarket-common', get_template_directory_uri() . '/js/common.js', array(), null);
    wp_enqueue_script('logomarket-smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array(), null);
    wp_enqueue_script('logomarket-infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array(), null);
    wp_enqueue_script('logomarket-modal', get_template_directory_uri() . '/js/modal.js', array(), null);
    wp_enqueue_script('logomarket-freetile', get_template_directory_uri() . '/js/jquery.freetile.min.js', array(), null);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('logomarket-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20160816');
    }

    wp_enqueue_script('logomarket-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20160816', true);

    wp_localize_script('logomarket-script', 'screenReaderText', array(
        'expand' => __('expand child menu', 'logomarket'),
        'collapse' => __('collapse child menu', 'logomarket'),
    ));
}

add_action('init', 'create_post_type');

function create_post_type() {
    register_post_type('logo', array(
        'labels' => array(
            'name' => __('ロゴ'),
            'singular_name' => __('ロゴ')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
        ),
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'logo/%post_id%',
        ),
    ));
}

add_filter('post_type_link', 'custom_logo_permalink', 1, 3);

function custom_logo_permalink($post_link, $id = 0, $leavename) {
    if (strpos('%post_id%', $post_link) === 'FALSE') {
        return $post_link;
    }
    $post = &get_post($id);
    if (is_wp_error($post) || $post->post_type != 'logo') {
        return $post_link;
    }
    return str_replace('%post_id%', $post->ID, $post_link);
}

add_action('init', 'logomarket_rewrites_init');

function logomarket_rewrites_init() {
    add_rewrite_rule(
            'logo/([0-9]+)?$', 'index.php?post_type=logo&p=$matches[1]', 'top'
    );
}

function add_my_post_types_to_query($query) {
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('logo'));
    return $query;
}

add_action('pre_get_posts', 'add_my_post_types_to_query');

function logomarket_the_custom_logo() {
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

function getListLogo($number = 30) {
    $args = array(
        'post_type' => 'logo',
        'posts_per_page' => 30,
        'paged' => 1,
        'orderby' => 'id',
        'order' => 'DESC'
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $logo_html = '<li class="logo-item" rel="logo-item-' . get_the_ID() . '">';
            $logo_html .= '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">';
            $logo_html .= '<line class="top" x1="0" y1="0" x2="300%" y2="0"></line>';
            $logo_html .= '<line class="left" x1="0" y1="100%" x2="0" y2="-300%"></line>';
            $logo_html .= '<line class="bottom" x1="100%" y1="100%" x2="-200%" y2="100%"></line>';
            $logo_html .= '<line class="right" x1="100%" y1="0" x2="100%" y2="300%"></line>';
            $logo_html .= '</svg>';
            $logo_html .= '<a href="' . get_post_permalink() . '" class="logoLink">';
            $logo_html .= '<div class="logo_detail_main ">';
            $logo_html .= '<img src="' . get_the_post_thumbnail_url() . '" alt="">        ';
            $logo_html .= '<p class="company_name  Candal ume_mincho" style="color:#333333;">Logomarket</p>';
            $logo_html .= '</div>';
            $logo_html .= '<div class="ttl_price">';
            $logo_html .= '<p>「' . get_the_title() . '」のロゴ</p>';
//                        $logo_html .= '<p>¥'.get_post_custom_values('price').'</p>';
            $logo_html .= '</div>';
            $logo_html .= '</a>';
            $logo_html .= '</li>';
        }
        echo $logo_html;
    }
}
