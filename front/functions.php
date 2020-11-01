<?php 

if (!defined('ABSPATH')) exit;
global $PrimeForum; // Get Forum global

class PrimeDescription {
    static public $enable_pfm_description;
    static public $required;
    static public $blur;
    
    public function load_settings(bool $enable_pfm_description, bool $required, bool $blur) {
        static::$enable_pfm_description = $enable_pfm_description;
        static::$required = $required;
        static::$blur = $blur;
    }

    public function add_pfm_description($fields) {
        if(self::$enable_pfm_description == false)
            return $fields;

        $fields[] = array(
            'type' => 'textarea',
            'slug' => 'pfm_description',
            'title' => __('Подпись на форуме'),
            'placeholder' => __('Страйтесь не захламлять подпись...'),
            'required' => self::$required,
            'notice' => __('Вывод подписи в топиках форумов.')
        );

        return $fields;
    }


    public function pfm_add_description_content($content) {
        global $PrimePost; // Get Post global
        
        if(self::$enable_pfm_description == false || !$pfm_description = get_user_meta($PrimePost->user_id, 'pfm_description', true)) { // Start Get meta info
            if(!$pfm_description = get_user_meta($PrimePost->user_id, 'description', true)) 
                return $content;
        }

        return $content .= '<div class="prime-topic-description">' . $pfm_description . '</div>';
    }

    public function search_pfm_description_styles($styles){
        if(self::$blur) {
            $styles .= '
                .prime-topic-description {
                    -webkit-filter: blur(4px);
                    filter: blur(4px);
                    transition-duration: 1s;
                }
                
                .prime-topic-description:hover {
                    filter: none;
                    -webkit-filter: none;
                }
            ';        
        }

        return $styles;
    }

}

