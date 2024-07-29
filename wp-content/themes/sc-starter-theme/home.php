<?php
/**
 * The Index Template File.
 *
 * @package sc-starter-theme
 */

declare(strict_types=1);

namespace Somoscuatro\Starter_Theme;

use Timber\Timber as TimberLibrary;

$context = TimberLibrary::context();
$context['posts'] = TimberLibrary::get_posts();

TimberLibrary::render( 'home.twig', $context );
