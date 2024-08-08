<?php
/**
 * Contains EEE\Theme\Navigation Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use EEE\Theme\Attributes\Action;

/**
 * WordPress Custom Navigation Functionality.
 */
class Navigation {

	/**
	 * Register Navigation Menus.
	 */
	#[Action( 'after_setup_theme' )]
	public function register_nav_menus() {
		register_nav_menu( 'site_header_primary', __( 'Site Header Primary', 'eee-theme' ) );
		register_nav_menu( 'site_footer_primary', __( 'Site Footer Primary', 'eee-theme' ) );
		register_nav_menu( 'site_footer_legals', __( 'Site Footer Legals', 'eee-theme' ) );
	}
}
