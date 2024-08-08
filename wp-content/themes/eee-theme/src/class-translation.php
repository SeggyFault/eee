<?php
/**
 * Contains EEE\Theme\Translation Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use EEE\Theme\Attributes\Action;
use EEE\Theme\Helpers\Filesystem;

/**
 * Translations Management Class.
 */
class Translation {

	use Filesystem;

	/**
	 * Loads the Theme Translation Domain.
	 */
	#[Action( 'after_setup_theme' )]
	public function load_text_domain(): void {
		load_theme_textdomain( 'eee-theme', $this->get_base_path() . '/languages' );
	}
}
