<?php 

if(is_admin()) {
    require_once 'admin/settings.php';
}
require_once 'front/functions.php';

add_action('rcl_enqueue_scripts','pfm_description_scripts',0);

function pfm_description_scripts() {
    rcl_enqueue_style('pfm_description', rcl_addon_url('style.css', __FILE__));
}

$PrimeDescriptionEx = new PrimeDescription();
$PrimeDescriptionEx->load_settings(
    rcl_get_option('pfm_description_enable'),
    rcl_get_option('pfm_description_force'),
    rcl_get_option('pfm_description_blur')
);

add_filter('rcl_profile_fields', array('PrimeDescription', 'add_pfm_description'), 10);
add_filter('pfm_the_post_content', array('PrimeDescription', 'pfm_add_description_content'), 10, 1);
add_filter('rcl_inline_styles', array('PrimeDescription', 'search_pfm_description_styles'), 10, 1);
