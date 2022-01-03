<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use RuntimeException;

/**
 * Represents an exception thrown if a plain configuration does not exist.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationNotFoundException extends RuntimeException
{
}
