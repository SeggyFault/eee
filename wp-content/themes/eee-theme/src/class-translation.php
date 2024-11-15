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

	/**
	 * Loads Polylang string translations.
	 */
	#[Action( 'after_setup_theme' )]
	public function register_polylang_strings(): void {
		pll_register_string( 'contacts_address', get_theme_mod( 'contact_address' ), 'eee-theme', true );
		pll_register_string( 'contacts_address_label', 'Адреса', 'eee-theme', true );
		pll_register_string( 'contacts_phone_label', 'Телефон', 'eee-theme', true );
		pll_register_string( 'contacts_email_label', 'Пошта', 'eee-theme', true );
		pll_register_string( 'contacts_message_label', 'Відправте нам повідомлення', 'eee-theme', true );
		pll_register_string( 'contacts_required_label', "*Обов'язкові поля", 'eee-theme', true );
		pll_register_string( 'back_button', 'Назад', 'eee-theme', true );
		pll_register_string( 'more_button', 'Дізнатись більше', 'eee-theme', true );
		pll_register_string( 'expertise', 'Експертиза', 'eee-theme', true );
		pll_register_string( 'projects', 'Проекти', 'eee-theme', true );
	}
}
