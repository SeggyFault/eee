<?php
/**
 * Contains EEE\Theme\BLocks\Icon_Text\Icon_Text Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Icon_Text;

use EEE\Theme\Blocks\Block;
use Timber\Timber as TimberLibrary;

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
			'title'    => __( 'Block: Icon and Text', 'eee-theme' ),
			'fields'   => array(
				array(
					'key'        => 'field_' . static::$acf_block_prefix . '_items',
					'label'      => __( 'Items', 'eee-theme' ),
					'name'       => static::$acf_block_prefix . '_items',
					'type'       => 'repeater',
					'layout'     => 'row',
					'sub_fields' => array(
						array(
							'key'             => 'field_' . static::$acf_block_prefix . '_icon',
							'label'           => __( 'Icon', 'eee-theme' ),
							'name'            => static::$acf_block_prefix . '_icon',
							'type'            => 'image',
							'required'        => 1,
							'parent_repeater' => 'field_' . static::$acf_block_prefix . '_items',
						),
						array(
							'key'             => 'field_' . static::$acf_block_prefix . '_text',
							'label'           => __( 'Text', 'eee-theme' ),
							'name'            => static::$acf_block_prefix . '_text',
							'type'            => 'text',
							'required'        => 1,
							'return_format'   => 'string',
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
						'value'    => 'acf/icon-text',
					),
				),
			),
		);
	}


	/**
	 * Sets the Custom Context for the Block.
	 *
	 * This method can be overridden in a particular block to modify the default
	 * Timber context.
	 *
	 * @param array $context The Timber Context.
	 * @param array $block The Gutenberg block.
	 *
	 * @return array The Modified Timber Context.
	 */
	public function set_custom_context( array $context, array $block ): array {
		$global_context = TimberLibrary::context();
		$context        = array_merge_recursive(
			$context,
			array(
				'service_page_url' => get_the_permalink( pll_get_post( 314 ) ),
			),
		);

		return $context;
	}
}
