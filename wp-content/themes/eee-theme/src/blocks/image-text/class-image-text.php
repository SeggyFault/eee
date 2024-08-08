<?php
/**
 * Contains EEE\Theme\BLocks\Image_Text\Image_Text Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Image_Text;

use EEE\Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Image_Text extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_image_text';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Image and Text', 'eee-theme' ),
			'fields'   => array(
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
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
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
					'key'           => 'field_' . static::$acf_block_prefix . '_subtext',
					'label'         => __( 'Subtext', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_subtext',
					'type'          => 'textarea',
					'required'      => 1,
					'return_format' => 'string',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/image-text',
					),
				),
			),
		);
	}
}
