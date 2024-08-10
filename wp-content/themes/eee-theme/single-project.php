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


$value  = array( 'bgImages' => array( "bg-[url('https://eee.test/wp-content/uploads/2024/08/project-14.jpg')]" ) );
$result = wp_json_encode( $value, JSON_UNESCAPED_SLASHES );
file_put_contents( 'wp-content/themes/eee-theme/tailwind.safelist-classes.json', $result );


TimberLibrary::render( 'single-project.twig', $context );
