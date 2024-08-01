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
$context['expertises'] = TimberLibrary::get_posts(
  array(
    'post_type' => 'expertise',
    'posts_per_page' => -1
  )
);

TimberLibrary::render( 'archive-expertise.twig', $context );
