<?php
/**
 * Update previous installations to newer versions of the theme.
 *
 * @package Ornea
 * @since 2.0.0
 */
 
/**
 * Update theme_mods to v2.0.0.
 *
 * @since 2.0.0
 */
function ornea_update_background_theme_mod( $theme_mod = '', $defaults = array() ) {
    $theme_mods = get_theme_mods();
    
    // Previous background control was a mess. Migrate to the new structure.
    if ( ! isset( $theme_mods[ $theme_mod ] ) || ! is_array( $theme_mods[ $theme_mod ] ) ) {  
        $choices = array(
            'color',
            'image',
            'repeat',
            'size',
            'position',
        );
        $header_background = get_theme_mod( $theme_mod, $defaults );
        foreach ( $choices as $choice ) {
            if ( isset( $theme_mods["{$theme_mod}_{$choice}"] ) {
                $header_background["background-{$choice}"] = $theme_mods["{$theme_mod}_{$choice}"];
                remove_theme_mod( "{$theme_mod}_{$choice}" );
            }
        }
        $header_background['background-position'] = str_replace( '-', ' ', $header_background['background-position'] );
        set_theme_mod( $theme_mod, $header_background );
    }
}

ornea_update_background_theme_mod( 'header_background', array(
    'background-color'    => '#a46497',
    'background-image'    => '',
    'background-repeat'   => 'repeat',
    'background-size'     => 'inherit',
    'background-position' => 'center center',
) );
ornea_update_background_theme_mod( 'offcanvas_menu_background', array(
    'background-color'    => '#a46497',
    'background-image'    => '',
    'background-repeat'   => 'repeat',
    'background-size'     => 'inherit',
    'background-position' => 'left top',
) );
ornea_update_background_theme_mod( 'offcanvas_sidebar_background', array(
    'background-color'    => '#a46497',
    'background-image'    => '',
    'background-repeat'   => 'repeat',
    'background-size'     => 'inherit',
    'background-position' => 'left top',
) );
ornea_update_background_theme_mod( 'footer_wrapper_background', array(
    'background-color'    => '#ededed',
    'background-image'    => '',
    'background-repeat'   => 'repeat',
    'background-size'     => 'inherit',
    'background-attach'   => 'inherit',
    'background-position' => 'left-top',
) );



$theme_mods = get_theme_mods();

// Keep a backup
set_theme_mod( 'ornea_1_backup', $theme_mods );

base_typography_font_family
base_typography_subsets,
base_typography_font_weight
base_typography_font_size(px)
headers_typography_font_family
headers_typography_font_weight
sitename_typography_font_family