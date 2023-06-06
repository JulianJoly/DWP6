<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    if (is_user_logged_in()) {
        wp_enqueue_style('margintop-style', get_stylesheet_directory_uri() . '/css/margintop.css', array(), filemtime(get_stylesheet_directory() . '/css/margintop.css'));
    }
}

add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu');
function add_extra_item_to_nav_menu($items) {
    if (is_user_logged_in()) {
        $items = '
        <li id="menu-item-46" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-46"><a href="'. get_permalink(get_page_by_title('Nous Rencontrez')) .'">Nous rencontrez</a></li>
        <li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="'. admin_url() .'">Admin</a></li>
        <li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45"><a href="'. get_permalink(get_page_by_title('Commander')) .'">Commander</a></li>
        ';
    }
    return $items;
}