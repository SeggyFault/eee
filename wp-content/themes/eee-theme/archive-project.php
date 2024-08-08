<?php
/**
 * The Index Template File.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use Timber\Timber as TimberLibrary;

$context             = TimberLibrary::context();
$context['projects'] = TimberLibrary::get_posts(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 9,
		'paged'          => get_query_var( 'paged' ),
	)
);

TimberLibrary::render( 'archive-project.twig', $context );
