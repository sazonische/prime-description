<?php
if (!defined('ABSPATH')) exit;
add_filter('rcl_options', 'pfm_description_set_settings',10,1); 
function pfm_description_set_settings( $options ) { 

    $options->add_box('pfm-description', array('title' => __('Настройки Prime description.'),'icon' => 'fa-comments-o'));
    
    $options->box('pfm-description')->add_group('read-description', array('title' => __('Настройки Prime description.')));
    $options->box('pfm-description')->group('read-description')->add_options(
        array(
            array('type' => 'select', 'slug' => 'pfm_description_enable', 'title' => __('Отдельная подпись.'),
                'values' => array(0 => 'Откл',1 => 'Вкл'),
                'notice' => __('Добавить отдельную подпись для форума.'),
                'childrens' => array(
                    1 => array(
                        array('type' => 'select', 'slug' => 'pfm_description_force', 'title' => __('Поле обязательно для заполнения.'),
                            'values' => array(0 => 'Откл',1 => 'Вкл'),
                            'notice' => __('Сделать поле обязательным для заполнение в профиле пользователя.')
                        )
                    )
                )
            ),
            array('type' => 'select', 'slug' => 'pfm_description_blur', 'title' => __('Размытие подписи.'),
                'values' => array(0 => 'Откл',1 => 'Вкл'),
                'notice' => __('Добавить размытие подписи под топиком автора.')
            )
        )
    );
    return $options;
}
