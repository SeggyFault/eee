<?php
/**
 * Contains EEE\Theme\Asset Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use DI\Attribute\Inject;
use EEE\Theme\Attributes\Action;
use EEE\Theme\Helpers\Filesystem;

/**
 * Assets Management Class.
 */
class Asset {

	use Filesystem;

	/**
	 * The Theme Class.
	 *
	 * @var Theme
	 */
	#[Inject]
	protected Theme $theme;

	/**
	 * Enqueues Frontend Theme Styles and Scripts.
	 */
	#[Action( 'wp_enqueue_scripts' )]
	public function enqueue_assets(): void {
		$theme_prefix = $this->theme->get_prefix();

		// Custom Fonts.
		wp_enqueue_style( $theme_prefix . '-fonts-preload', $this->get_base_url() . '/dist/styles/fonts.css', false, $this->get_filemtime( 'styles/fonts.css' ) );

		// Theme Styles.
		wp_enqueue_style( $theme_prefix . '-main-styles', $this->get_base_url() . '/dist/styles/main.css', array( $theme_prefix . '-fonts-preload' ), $this->get_filemtime( 'styles/main.css' ) );

		// Contact Form Styles.
		wp_enqueue_style( $theme_prefix . '-contact-form-styles', $this->get_base_url() . '/dist/styles/contact-form.css', array(), $this->get_filemtime( 'styles/contact-form.css' ) );

		// Theme Script.
		wp_enqueue_script( $theme_prefix, $this->get_base_url() . '/dist/scripts/main.js', array(), $this->get_filemtime( 'scripts/main.js' ), true );
	}

	/**
	 * Enqueues Editor Theme Styles and Scripts.
	 */
	#[Action( 'admin_enqueue_scripts' )]
	public function enqueue_admin_assets(): void {
	}

	/**
	 * Enqueues wp-login Theme Styles and Scripts.
	 */
	#[Action( 'login_enqueue_scripts' )]
	public function enqueue_login_assets(): void {
	}
}
