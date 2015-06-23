<?php

/**
 * Add panels
 */
Kirki::add_panel( 'backgrounds', array(
	'priority'    => 10,
	'title'       => __( 'Backgrounds', 'ornea' ),
	'description' => __( 'Set background options for site areas', 'ornea' ),
) );

Kirki::add_panel( 'typography', array(
	'priority'    => 10,
	'title'       => __( 'Typography', 'ornea' ),
	'description' => __( 'Typography Options', 'ornea' ),
) );
