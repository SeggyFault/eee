<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Timeline\Timeline Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Timeline;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Timeline extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_timeline';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Timeline', 'sc-starter-theme' ),
			'fields'   => array(
        	array(
					'key'           => 'field_' . static::$acf_block_prefix . '_items',
					'label'         => __( 'Items', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_items',
					'type'          => 'repeater',
          'layout' => 'row',
          'sub_fields'   => array(
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_year',
              'label'         => __( 'Year', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_year',
              'type'          => 'text',
              'required'      => 1,
              'return_format' => 'string',
              'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
				    ),
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_text',
              'label'         => __( 'Text', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_text',
              'type'          => 'textarea',
              'required'      => 1,
              'return_format' => 'string',
              'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
            ),
          )
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/timeline',
					),
				),
			),
		);
	}
}
