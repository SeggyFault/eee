<?php
/**
 * Contains EEE\Theme\BLocks\Service\Service Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Service;

use EEE\Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Service extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_service';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Service', 'eee-theme' ),
			'fields'   => array(
				array(
					'key'         => 'field_' . static::$acf_block_prefix . '_image_position',
					'label'       => __( 'Image Position', 'eee-theme' ),
					'name'        => static::$acf_block_prefix . '_image_position',
					'type'        => 'true_false',
					'ui_on_text'  => __( 'Right', 'eee-theme' ),
					'ui_off_text' => __( 'Left', 'eee-theme' ),
					'ui'          => 1,
				),
				array(
					'key'         => 'field_' . static::$acf_block_prefix . '_background_color',
					'label'       => __( 'Background Color', 'eee-theme' ),
					'name'        => static::$acf_block_prefix . '_background_color',
					'type'        => 'true_false',
					'ui_on_text'  => __( 'Dark', 'eee-theme' ),
					'ui_off_text' => __( 'Light', 'eee-theme' ),
					'ui'          => 1,
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_heading',
					'label'         => __( 'Heading', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_heading',
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
				),
				array(
					'key'   => 'field_' . self::$acf_block_prefix . '_image',
					'label' => __( 'Image', 'eee-theme' ),
					'name'  => self::$acf_block_prefix . '_image',
					'type'  => 'image',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_text',
					'label'         => __( 'Text', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_text',
					'type'          => 'wysiwyg',
					'required'      => 1,
					'return_format' => 'string',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/service',
					),
				),
			),
		);
	}
}
