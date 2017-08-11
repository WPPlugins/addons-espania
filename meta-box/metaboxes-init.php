<?php
/*-----------------------------------------------------------------------------------*/
/* Definitions meta box
/*-----------------------------------------------------------------------------------*/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'espania_';

global $meta_boxes;

$meta_boxes = array();


/*-----------------------------------------------------------------------------------*/
/* Create metaboxes 
/*-----------------------------------------------------------------------------------*/

// Metabox for Post Format: Video 
$meta_boxes[] = array(
	'title' => __('Espania Video Options', 'espania'),
	'id' => 'espania_format_video_options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'  => __('Embed Code', 'espania'),
			'id'    => "{$prefix}embed_code",
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),
		array(
			'name'  => __('Youtube / Vimeo Video Url', 'espania'),
			'id'    => "{$prefix}video_url",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),	
		array(
			'name'  => __('MP4 file Url', 'espania'),
			'id'    => "{$prefix}video_mp4",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),	
		array(
			'name'  => __('WebM file Url', 'espania'),
			'id'    => "{$prefix}video_webm",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),	
		array(
			'name'  => __('OGV file Url', 'espania'),
			'id'    => "{$prefix}video_ogv",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
	)
);

// Metabox for Post Format: Audio 
$meta_boxes[] = array(
	'title' => __('Espania Audio Options', 'espania'),
	'id' => 'espania_format_audio_options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'  => __('Mp3 file Url', 'espania'),
			'id'    => "{$prefix}audio_mp3",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		array(
			'name'  => __('OGG file Url', 'espania'),
			'id'    => "{$prefix}audio_ogg",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		array(
			'name'  => __('Wav file Url', 'espania'),
			'id'    => "{$prefix}audio_wav",
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),		
		array(
			'name'  => __('iFrame', 'espania'),
			'id'    => "{$prefix}iframe_audio",
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),
	)
);

		
/*-----------------------------------------------------------------------------------*/
/* Registering metaboxes 
/*-----------------------------------------------------------------------------------*/
function addons_espania_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'addons_espania_register_meta_boxes' );

?>