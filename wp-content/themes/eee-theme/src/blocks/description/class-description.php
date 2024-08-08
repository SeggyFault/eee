<?php
/**
 * Contains EEE\Theme\BLocks\Description\Description Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Description;

use EEE\Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Description extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_description';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Description', 'eee-theme' ),
			'fields'   => array(
				array(
					'key'   => 'field_' . static::$acf_block_prefix . '_heading',
					'label' => 'Heading',
					'name'  => static::$acf_block_prefix . '_heading',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_' . static::$acf_block_prefix . '_text',
					'label' => 'Text',
					'name'  => static::$acf_block_prefix . '_text',
					'type'  => 'textarea',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/description',
					),
				),
			),
		);
	}
}
