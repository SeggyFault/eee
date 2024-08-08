<?php
/**
 * Contains EEE\Theme\BLocks\Slider\Slider Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Slider;

use EEE\Theme\Blocks\Block;
use EEE\Theme\Helpers\Filesystem;

/**
 * Block Main Functionality.
 */
class Slider extends Block {

	use Filesystem;

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_slider';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Slider', 'eee-theme' ),
			'fields'   => array(
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_heading',
					'label'         => __( 'Heading', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_heading',
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
				),
				array(
					'key'        => 'field_' . static::$acf_block_prefix . '_slides',
					'label'      => __( 'Slides', 'eee-theme' ),
					'name'       => static::$acf_block_prefix . '_slides',
					'type'       => 'repeater',
					'layout'     => 'row',
					'sub_fields' => array(
						array(
							'key'             => 'field_' . static::$acf_block_prefix . '_logo',
							'label'           => __( 'Logo', 'eee-theme' ),
							'name'            => static::$acf_block_prefix . '_logo',
							'type'            => 'image',
							'required'        => 1,
							'parent_repeater' => 'field_' . static::$acf_block_prefix . '_slides',
						),
						array(
							'key'             => 'field_' . static::$acf_block_prefix . '_bg_image',
							'label'           => __( 'Background image', 'eee-theme' ),
							'name'            => static::$acf_block_prefix . '_bg_image',
							'type'            => 'image',
							'instructions'    => __( 'The minimum size of the image must be 2400x1200', 'eee-theme' ),
							'min_width'       => 2400,
							'min_height'      => 1200,
							'required'        => 1,
							'parent_repeater' => 'field_' . static::$acf_block_prefix . '_slides',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/slider',
					),
				),
			),
		);
	}

	/**
	 * Registers Block Assets.
	 */
	public function register_assets(): void {
		wp_register_script( 'glide-js', 'https://cdn.jsdelivr.net/npm/@glidejs/glide@3.6.2/dist/glide.min.js', array(), '3.6.2', array( 'footer' => true ) );
		wp_register_style( 'glide-css', 'https://cdn.jsdelivr.net/npm/@glidejs/glide@3.6.2/dist/css/glide.core.min.css', array(), '3.6.2' );

		wp_register_script( 'slider-js', $this->get_base_url() . '/dist/scripts/slider.js', array(), $this->get_filemtime( 'scripts/slider.js' ), true );
	}
}
