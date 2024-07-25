<?php
/**
 * Contains Somoscuatro\Starter_Theme\Customizer Class.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme;

use Somoscuatro\Starter_Theme\Attributes\Action;

/**
 * WordPress Theme Customizer Functionality.
 */
class Customizer {

	/**
	 * Adds Google Tag Manager Controls to the Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize WP_customize_manager Instance.
	 */
	#[Action( 'customize_register' )]
	public function add_customizer_gtm_controls( \WP_Customize_Manager $wp_customize ): void {
		// Section.
		$wp_customize->add_section(
			'gtm',
			array(
				'title'      => __( 'Google Tag Manager', 'sc-starter-theme' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'gtm_id',
			array(
				'default'    => '',
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'gtm_id',
				array(
					'label'    => __( 'GTM ID', 'sc-starter-theme' ),
					'section'  => 'gtm',
					'settings' => 'gtm_id',
					'type'     => 'text',
				),
			),
		);
	}

  // Contacts
  #[Action( 'customize_register' )]
  public function add_customizer_contacts_controls( \WP_Customize_Manager $wp_customize ): void {
    // Section.
		$wp_customize->add_section(
			'contacts',
			array(
				'title'      => __( 'Contacts', 'sc-starter-theme' ),
				'priority'   => 25,
				'capability' => 'edit_theme_options',
			)
		);

    // Email 
      $wp_customize->add_setting(
			'contact_email',
			array(
				'default'    => '',
				'type'       => 'theme_mod',  
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'contact_email',
				array(
					'label'    => __( 'Email', 'sc-starter-theme' ),
					'section'  => 'contacts',
					'settings' => 'contact_email',
					'type'     => 'text',
				),
			),
		);

    // Phone
    $wp_customize->add_setting(
			'contact_phone',
			array(
				'default'    => '',
				'type'       => 'theme_mod',  
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'contact_phone',
				array(
					'label'    => __( 'Phone', 'sc-starter-theme' ),
					'section'  => 'contacts',
					'settings' => 'contact_phone',
					'type'     => 'text',
				),
			),
		);

    // Address
    $wp_customize->add_setting(
			'contact_address',
			array(
				'default'    => '',
				'type'       => 'theme_mod',  
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'contact_address',
				array(
					'label'    => __( 'Address', 'sc-starter-theme' ),
					'section'  => 'contacts',
					'settings' => 'contact_address',
					'type'     => 'text',
				),
			),
		);
  }

  // Social Media
  #[Action( 'customize_register' )]
  public function add_customizer_social_media_controls( \WP_Customize_Manager $wp_customize ): void {
    // Section.
		$wp_customize->add_section(
			'social_media',
			array(
				'title'      => __( 'Social Media', 'sc-starter-theme' ),
				'priority'   => 15,
				'capability' => 'edit_theme_options',
			)
		);

     // Facebook
      $wp_customize->add_setting(
			'facebook_link',
			array(
				'default'    => '',
				'type'       => 'theme_mod',  
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'facebook_link',
				array(
					'label'    => __( 'Facebook', 'sc-starter-theme' ),
					'section'  => 'social_media',
					'settings' => 'facebook_link',
					'type'     => 'text',
				),
			),
		);

    // LinkedIn
      $wp_customize->add_setting(
			'linkedin_link',
			array(
				'default'    => '',
				'type'       => 'theme_mod',  
				'capability' => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				'linkedin_link',
				array(
					'label'    => __( 'LinkedIn', 'sc-starter-theme' ),
					'section'  => 'social_media',
					'settings' => 'linkedin_link',
					'type'     => 'text',
				),
			),
		);
  }
}
