<?php
    /*Plugin Name: mobile_switch_theme*/
    function mobile_switch_theme($theme){
        if( wp_is_mobile() ){
            $theme = 'master_mobile';    //theme为主题名
        }
        return $theme;
    }
    add_filter('template', 'mobile_switch_theme');
    add_filter('stylesheet', 'mobile_switch_theme');
?>