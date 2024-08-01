<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Article_Page\Article_Page Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Article_Page;

use Somoscuatro\Starter_Theme\Blocks\Block;

/**
 * Block Main Functionality.
 */
class Article_Page extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_article_page';

	/**
	 * Gets the ACF Block Fields.
	 *
	 * @return array The ACF Block Fields.
	 */
	public function get_acf_fields(): array {
		return array(
			'key'      => 'group_' . static::$acf_block_prefix,
			'title'    => __( 'Block: Sample', 'sc-starter-theme' ),
			'fields'   => array(
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_heading',
					'label'         => __( 'Heading', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_heading',
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
				),
        array(
					'key'           => 'field_' . static::$acf_block_prefix . '_date',
					'label'         => __( 'Date', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_date',
					'type'          => 'date_picker',
					'required'      => 1,
					'return_format' => 'string',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_reading_time',
					'label'         => __( 'Reading time', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_reading_time',
					'type'          => 'text',
					'required'      => 1,
					'return_format' => 'string',
				),
        array(
					'key'   => 'field_' . self::$acf_block_prefix . '_image',
					'label' => __( 'Image', 'sc-starter-theme' ),
					'name'  => self::$acf_block_prefix . '_image',
					'type'  => 'image',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_text',
					'label'         => __( 'Text', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_text',
					'type'          => 'wysiwyg',
					'required'      => 1,
					'return_format' => 'string',
				),
				array(
					'key'           => 'field_' . static::$acf_block_prefix . '_button',
					'label'         => __( 'Button', 'sc-starter-theme' ),
					'name'          => static::$acf_block_prefix . '_button',
					'type'          => 'link',
					'required'      => 1,
					'return_format' => 'string',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/article-page',
					),
				),
			),
		);
	}
}
