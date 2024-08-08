<?php
/**
 * List of Classes to Be Hooked.
 *
 * @package eee-theme
 */

use EEE\Theme\ACF;
use EEE\Theme\Asset;
use EEE\Theme\Customizer;
use EEE\Theme\GTM;
use EEE\Theme\Gutenberg;
use EEE\Theme\Media;
use EEE\Theme\Navigation;
use EEE\Theme\Performance;
use EEE\Theme\Theme;
use EEE\Theme\Timber;
use EEE\Theme\Translation;

/**
 * List of Classes with Hooks
 */
return array(
	Theme::class,

	ACF::class,
	Asset::class,
	Customizer::class,
	GTM::class,
	Gutenberg::class,
	Media::class,
	Navigation::class,
	Performance::class,
	Timber::class,
	Translation::class,
);
