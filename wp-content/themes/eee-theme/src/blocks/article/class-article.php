<?php
/**
 * Contains EEE\Theme\BLocks\Sample\Sample Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Blocks\Article;

use EEE\Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Article extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_article';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Article', 'eee-theme' ),
			'fields'   => array(
				array(
					'key'   => 'field_' . self::$acf_block_prefix . '_image',
					'label' => __( 'Image', 'eee-theme' ),
					'name'  => self::$acf_block_prefix . '_image',
					'type'  => 'image',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_date',
					'label'         => __( 'Date', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_date',
					'type'          => 'date_picker',
					'required'      => 1,
					'return_format' => 'string',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_reading_time',
					'label'         => __( 'Reading time', 'eee-theme' ),
					'name'          => static::$acf_block_prefix . '_reading_time',
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
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/article',
					),
				),
			),
		);
	}
}
