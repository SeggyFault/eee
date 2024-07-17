<?php
/**
 * Contains Somoscuatro\Starter_Theme\Blocks\Hero\Hero Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Hero;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Hero extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_hero';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Hero', 'sc-starter-theme' ),
			'fields'   => array(
				array(
			    'key' => 'field_' . static::$acf_block_prefix . '_heading',
			    'label' => 'Heading',
			    'name' => static::$acf_block_prefix . '_heading',
			    'type' => 'textarea',
		    ),
        array(
          'key' => 'field_' . static::$acf_block_prefix . '_subheading',
          'label' => 'Subheading',
          'name' => static::$acf_block_prefix . '_subheading',
          'type' => 'textarea'
        ),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/hero',
					),
				),
			),
		);
	}
}

