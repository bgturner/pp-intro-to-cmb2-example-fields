<?php
/**
 * The Passions Play Example CMB2 custom fields plugin bootstrap file
 *
 * Plugin Name:       Passions Play Example CMB2 custom fields
 * Description:       A plugin to showcase registering custom fields using CMB2
 * Version:           0.0.1
 * Author:            Benjamin Turner
 * Author URI:        http://passionsplay.com
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * This code is taken almost verbatim from the CMB2 example-functions.php file.
 *
 * To see more usage examples, review that file:
 *
 *     https://github.com/CMB2/CMB2/blob/trunk/example-functions.php
 */
add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
function yourprefix_register_demo_metabox() {
	$prefix = 'yourprefix_demo_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Test Text', 'cmb2' ),
		'desc'       => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Test wysiwyg', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Test Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'oEmbed', 'cmb2' ),
		'desc' => sprintf(
			/* translators: %s: link to codex.wordpress.org/Embeds */
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'cmb2' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

    // The above fields are included in with CMB2 out of the box.
    //
    // The below map custom field requires the `cmb_field_map` CMB2 addon:
    //
    //     https://github.com/passionsplay/cmb_field_map
    //
    $cmb_demo->add_field( array(
        'name'         => __( 'Location', 'pp-provider' ),
        'id'           => $prefix . 'location',
        'type'         => 'pw_map',
        'split_values' => true,
    ) );

}

