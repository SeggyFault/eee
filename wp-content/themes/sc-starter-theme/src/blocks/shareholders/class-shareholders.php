<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Shareholders\Shareholders Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Shareholders;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Shareholders extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_shareholders';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Shareholders', 'sc-starter-theme' ),
			'fields'   => array(
				 array(
			    'key' => 'field_' . static::$acf_block_prefix . '_heading',
			    'label' => 'Heading',
			    'name' => static::$acf_block_prefix . '_heading',
			    'type' => 'text',
         ),
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
              'key'           => 'field_' . static::$acf_block_prefix . '_shareholder_name',
              'label'         => __( 'Shareholder name', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_shareholder_name',
              'type'          => 'text',
              'required'      => 1,
              'return_format' => 'string',
              'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
            ),
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_text',
              'label'         => __( 'Text', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_text',
              'type'          => 'wysiwyg',
              'required'      => 1,
              'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
            ),
          ),
        ),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/shareholders',
					),
				),
			),
		);
	}
}
