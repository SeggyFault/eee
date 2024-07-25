<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Expertise\Expertise Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Expertise;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Expertise extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_expertise';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Expertise', 'sc-starter-theme' ),
			'fields'   => array(
        array(
          'key'           => 'field_' . static::$acf_block_prefix . '_items',
          'label'         => __( 'Items', 'sc-starter-theme' ),
          'name'          => static::$acf_block_prefix . '_items',
          'type'          => 'repeater',
          'layout' => 'row',
          'sub_fields'   => array(
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_image',
              'label'         => __( 'Image', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_image',
              'type'          => 'image',
              'required'      => 1,
              'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
            ),
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_text',
              'label'         => __( 'Text', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_text',
              'type'          => 'text',
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
						'value'    => 'acf/expertise',
					),
				),
			),
		);
	}
}
