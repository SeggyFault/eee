<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\EEE_Heading\EEE_Heading Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\EEE_Heading;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class EEE_Heading extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_eee_heading';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: EEE Heading', 'sc-starter-theme' ),
			'fields'   => array(
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_heading',
					'label'         => __( 'Heading', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_heading',
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/eee-heading',
					),
				),
			),
		);
	}
}
