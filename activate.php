<?php
if(!rcl_get_option('pfm_description_enable'))
    rcl_update_option('pfm_description_enable', true);
if(!rcl_get_option('pfm_description_force'))
    rcl_update_option('pfm_description_force', false);
if(!rcl_get_option('pfm_description_blur'))
    rcl_update_option('pfm_description_blur', false);