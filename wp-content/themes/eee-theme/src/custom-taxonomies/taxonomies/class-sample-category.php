<?php
/**
 * Contains EEE\Theme\Custom_Taxonomies\Taxonomies\Sample_Category Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme\Custom_Taxonomies\Taxonomies;

use EEE\Theme\Custom_Taxonomies\Custom_Taxonomy;

/**
 * Sample Category Custom Taxonomy.
 */
class Sample_Category extends Custom_Taxonomy {

	/**
	 * Taxonomy Singular Name.
	 *
	 * @var string
	 */
	protected string $singular_name = 'Sample Category';

	/**
	 * Taxonomy Plural Name.
	 *
	 * @var string
	 */
	protected string $plural_name = 'Sample Categories';

	/**
	 * Custom Post Types Using This Taxonomy.
	 *
	 * @var array
	 */
	protected array $post_types = array( 'sample' );
}
