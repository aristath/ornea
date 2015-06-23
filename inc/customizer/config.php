<?php

/**
 * The configuration options for Kirki.
 * Change the assets URL for kirki so the customizer styles & scripts are properly loaded.
 */
function ornea_customizer_config( $args ) {

	$args['url_path'] = get_template_directory_uri() . '/inc/kirki/';
	return $args;

}
add_filter( 'kirki/config', 'ornea_customizer_config' );

function ornea_kirki_i18n( $config ) {

    $config['i18n'] = array(
        'background-color'      => __( 'Background Color', 'ornea' ),
        'background-image'      => __( 'Background Image', 'ornea' ),
        'no-repeat'             => __( 'No Repeat', 'ornea' ),
        'repeat-all'            => __( 'Repeat All', 'ornea' ),
        'repeat-x'              => __( 'Repeat Horizontally', 'ornea' ),
        'repeat-y'              => __( 'Repeat Vertically', 'ornea' ),
        'inherit'               => __( 'Inherit', 'ornea' ),
        'background-repeat'     => __( 'Background Repeat', 'ornea' ),
        'cover'                 => __( 'Cover', 'ornea' ),
        'contain'               => __( 'Contain', 'ornea' ),
        'background-size'       => __( 'Background Size', 'ornea' ),
        'fixed'                 => __( 'Fixed', 'ornea' ),
        'scroll'                => __( 'Scroll', 'ornea' ),
        'background-attachment' => __( 'Background Attachment', 'ornea' ),
        'left-top'              => __( 'Left Top', 'ornea' ),
        'left-center'           => __( 'Left Center', 'ornea' ),
        'left-bottom'           => __( 'Left Bottom', 'ornea' ),
        'right-top'             => __( 'Right Top', 'ornea' ),
        'right-center'          => __( 'Right Center', 'ornea' ),
        'right-bottom'          => __( 'Right Bottom', 'ornea' ),
        'center-top'            => __( 'Center Top', 'ornea' ),
        'center-center'         => __( 'Center Center', 'ornea' ),
        'center-bottom'         => __( 'Center Bottom', 'ornea' ),
        'background-position'   => __( 'Background Position', 'ornea' ),
        'background-opacity'    => __( 'Background Opacity', 'ornea' ),
        'ON'                    => __( 'ON', 'ornea' ),
        'OFF'                   => __( 'OFF', 'ornea' ),
        'all'                   => __( 'All', 'ornea' ),
        'cyrillic'              => __( 'Cyrillic', 'ornea' ),
        'cyrillic-ext'          => __( 'Cyrillic Extended', 'ornea' ),
        'devanagari'            => __( 'Devanagari', 'ornea' ),
        'greek'                 => __( 'Greek', 'ornea' ),
        'greek-ext'             => __( 'Greek Extended', 'ornea' ),
        'khmer'                 => __( 'Khmer', 'ornea' ),
        'latin'                 => __( 'Latin', 'ornea' ),
        'latin-ext'             => __( 'Latin Extended', 'ornea' ),
        'vietnamese'            => __( 'Vietnamese', 'ornea' ),
        'serif'                 => _x( 'Serif', 'font style', 'ornea' ),
        'sans-serif'            => _x( 'Sans Serif', 'font style', 'ornea' ),
        'monospace'             => _x( 'Monospace', 'font style', 'ornea' ),
    );

    return $config;

}
add_filter( 'kirki/config', 'ornea_kirki_i18n' );
