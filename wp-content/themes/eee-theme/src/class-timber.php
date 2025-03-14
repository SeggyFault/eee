<?php
/**
 * Contains EEE\Theme\Timber Class.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use EEE\Theme\Attributes\Action;
use EEE\Theme\Attributes\Filter;
use Symfony\Component\VarDumper\VarDumper;
use Timber\Timber as TimberLibrary;
use Twig\TwigFunction;
use Twig\Environment as TwigEnvironment;

/**
 * Timber Management Class.
 */
class Timber {

	/**
	 * Timber Initialization.
	 *
	 * @throws \Exception If Timber Class Does Not Exist.
	 */
	#[Action( 'after_setup_theme', 9 )]
	public function init(): void {
		TimberLibrary::init();

		if ( ! class_exists( 'Timber' ) ) {
			throw new \Exception( 'Timber not found.' );
		}

		TimberLibrary::$dirname = array(
			'templates',
			'templates/components',
			'templates/parts',
		);
	}

	/**
	 * Adds Additional Variables to Global Context.
	 *
	 * @param array $context Timber Context.
	 *
	 * @return array Global Context Data.
	 */
	#[Filter( 'timber/context' )]
	public function add_to_global_context( array $context ): array {
		$context['homepage_url'] = get_home_url();

		$context = $this->get_menus( $context );

		$context['logo_white'] = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/logo-white.svg';
		$context['logo_black'] = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/logo-black.svg';

		$context['contacts'] = array(
			'email'   => get_theme_mod( 'contact_email' ),
			'phone'   => get_theme_mod( 'contact_phone' ),
			'address' => pll__( get_theme_mod( 'contact_address' ) ),
		);

		$context['social_media'] = array(
			'facebook' => get_theme_mod( 'facebook_link' ),
			'linkedin' => get_theme_mod( 'linkedin_link' ),
		);

		$context['wp_footer_exists'] = function_exists( 'wp_footer' );

		$context['copyright_text'] = sprintf(
			'&copy;%s %s %s',
			gmdate( 'Y' ),
			__( 'Ertle Custom Theme by', 'eee-theme' ),
			'<a class="underline" href="https://github.com/SeggyFault">Alex</a>'
		);

		return $context;
	}

	/**
	 * Returns Timber Context.
	 *
	 * @return array
	 */
	public function context(): array {
		return TimberLibrary::context();
	}

	/**
	 * Renders a Given Template.
	 *
	 * @param string $template Template Path.
	 * @param array  $context  Context Data.
	 */
	public function render(
		string $template,
		array $context = array(),
	): void {
		TimberLibrary::render( $template, $context );
	}

	/**
	 * Adds Registered Menus to Timber Global Context.
	 *
	 * As documented in
	 * https://timber.github.io/docs/v2/guides/menus/#set-up-all-menus-globally
	 * Timber allows to add the registered menu to the global context. For unknown
	 * reasons, this is not fully working for us since the current menu item is
	 * not set (always false) and WordPress current item classes (e.g.
	 * current-menu-item) are not added.
	 *
	 * @param array $context The Timber Global Context.
	 *
	 * @return array The Updated Timber Global Context.
	 */
	public function get_menus( array $context ): array {
		foreach ( array_keys( get_registered_nav_menus() ) as $location ) {
			if ( ! has_nav_menu( $location ) ) {
				continue;
			}

			$context[ $location ] = TimberLibrary::get_menu( $location );
		}

		return $context;
	}

	/**
	 * Adds Custom Functions to Twig.
	 *
	 * @param TwigEnvironment $twig The Twig Environment.
	 *
	 * @return TwigEnvironment The Modified Twig Environment.
	 */
	#[Filter( 'timber/twig' )]
	public function extend_timber_functions( TwigEnvironment $twig ): TwigEnvironment {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			$twig->addFunction(
				new TwigFunction( 'dump', array( $this, 'dump' ) )
			);

			$twig->addFunction(
				new TwigFunction( 'dd', array( $this, 'dd' ) )
			);
		}

		$twig->addFunction(
			new TwigFunction( 'enqueue_script', array( $this, 'enqueue_script' ) )
		);

		$twig->addFunction(
			new TwigFunction( 'enqueue_style', array( $this, 'enqueue_style' ) )
		);

		$twig->addFunction(
			new TwigFunction( 'get_static_asset', array( $this, 'get_static_asset' ) )
		);

		$twig->addFunction(
			new TwigFunction( 'get_image_srcset', array( $this, 'get_image_srcset' ) )
		);

		$twig->addFunction(
			new TwigFunction( 'get_language_switcher', array( $this, 'get_language_switcher' ) )
		);

		$twig->addFunction(
			new TwigFunction( 'get_reading_time', array( $this, 'get_reading_time' ) )
		);

		return $twig;
	}

	/**
	 * Dumps a list of variables.
	 *
	 * @param mixed ...$vars Variables to dump.
	 */
	public function dump( mixed ...$vars ): void {
		foreach ( $vars as $var ) {
			VarDumper::dump( $var );
		}
	}

	/**
	 * Dumps a list of variables and dies.
	 *
	 * @param mixed ...$vars Variables to dump.
	 */
	public function dd( ...$vars ) {
		foreach ( $vars as $var ) {
			dd( $var );
		}
	}

	/**
	 * Enqueue Block Scripts.
	 *
	 * @param string $handle The Script Handle.
	 */
	public function enqueue_script( string $handle ): void {
		wp_enqueue_script( $handle );
	}

	/**
	 * Enqueue Block Styles.
	 *
	 * @param string $handle The Style Handle.
	 */
	public function enqueue_style( string $handle ): void {
		wp_enqueue_style( $handle );
	}

	/**
	 * Get Static Asset URL.
	 *
	 * @param string $rel_file_path The Asset File Path Relative to the Theme Dir.
	 *
	 * @return string The Asset URL.
	 */
	public function get_static_asset( string $rel_file_path ): string {
		return esc_url( get_stylesheet_directory_uri() ) . "/$rel_file_path";
	}

	/**
	 * Gets Images Source Sets.
	 *
	 * @param array        $sizes The WordPress Image Sizes.
	 * @param array|string $allowed_sizes The Image Sizes to Generate for This Particular Image.
	 *
	 * @return array The Image Source Set.
	 */
	public function get_image_srcset( array $sizes, array|string $allowed_sizes = array( 'xs', 'sm', 'md', 'lg', 'xl' ) ): array {
		$srcset = array();

		$min_widths = array(
			'xl' => '1440px',
			'lg' => '1280px',
			'md' => '1024px',
			'sm' => '768px',
			'xs' => '',
		);

		foreach ( $min_widths as $image_size => $min_width ) {
			if ( isset( $sizes[ $image_size ] ) && in_array( $image_size, $allowed_sizes, true ) ) {
				$srcset[] = array(
					'srcset'    => $sizes[ $image_size ],
					'srcset@2x' => $sizes[ $image_size . '@2x' ],
					'srcset@3x' => $sizes[ $image_size . '@3x' ],
					'media'     => '(min-width: ' . $min_width . ')',
					'width'     => $sizes[ $image_size . '-width' ],
					'height'    => $sizes[ $image_size . '-height' ],
				);
			}
		}

		return $srcset;
	}

	/**
	 * Gets the post reading time.
	 *
	 * @return string The post reading time.
	 */
	public function get_reading_time(): string {
		$post_content = get_post_field( 'post_content', get_the_ID() );

		$word_count   = str_word_count( wp_strip_all_tags( $post_content ) );
		$reading_time = ceil( $word_count / 200 );

		// translators: "%d = reading time minutes".
		return sprintf( __( '%d minutes', 'eee-theme' ), $reading_time );
	}

	/**
	 * Gets Language Switcher.
	 */
	public function get_language_switcher() {
		ob_start();
		pll_the_languages( array( 'dropdown' => 1 ) );
		$languages = ob_get_clean();

		$languages = preg_replace( '@class="pll-switcher-select"@', 'class="bg-transparent appearence-none"', $languages );

		return $languages;
	}
}
