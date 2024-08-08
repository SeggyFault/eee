<?php
/**
 * Contains Somoscuatro\Starter_Theme\BLocks\Contacts\Contacts Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme\Blocks\Contacts;

use Somoscuatro\Starter_Theme\Blocks\Block;
use Timber\Timber as TimberLibrary;

/**
 * Block Main Functionality.
 */
class Contacts extends Block {

	/**
	 * The Prefix Used for ACF Blocks.
	 *
	 * @var string
	 */
	public static $acf_block_prefix = 'block_contacts';

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
				// array(
				// 	'key'           => 'field_' . static::$acf_block_prefix . '_map',
				// 	'label'         => __( 'Map', 'sc-starter-theme' ),
				// 	'name'          => static::$acf_block_prefix . '_map',
				// 	'type'          => 'google_map',
				// 	'required'      => 1,
				// ),
			),
			'location' => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/contacts',
					),
				),
			),
		);
	}

  public function set_custom_context( array $context, array $block ): array {
    $global_context = TimberLibrary::context();
    $context = array_merge_recursive( 
      $context, 
      array( 
        'contacts' => $global_context['contacts'],
        'social_media' => $global_context['social_media']
      ),
    );
    
		return $context;
	}
}
