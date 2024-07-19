<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Icon_Text\Icon_Text Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Icon_Text;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Icon_Text extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_icon_text';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Icon and Text', 'sc-starter-theme' ),
			'fields'   => array(
        array(
          'key'           => 'field_' . static::$acf_block_prefix . '_items',
          'label'         => __( 'Items', 'sc-starter-theme' ),
          'name'          => static::$acf_block_prefix . '_items',
          'type'          => 'repeater',
          'layout' => 'row',
          'sub_fields'   => array(
            array(
              'key'           => 'field_' . static::$acf_block_prefix . '_icon',
              'label'         => __( 'Icon', 'sc-starter-theme' ),
              'name'          => static::$acf_block_prefix . '_icon',
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
						'value'    => 'acf/icon-text',
					),
				),
			),
		);
	}
}
