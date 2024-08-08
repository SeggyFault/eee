<?php
/**
 * The Index Template File.
 *
 * @package eee-theme
 */

declare(strict_types=1);

namespace EEE\Theme;

use Timber\Timber as TimberLibrary;

$context = TimberLibrary::context();

TimberLibrary::render( 'index.twig', $context );
