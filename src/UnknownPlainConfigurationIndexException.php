<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use CodeKandis\Types\UnknownIndexException;

/**
 * Represents an exception thrown if an index does not exist in a plain configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class UnknownPlainConfigurationIndexException extends UnknownIndexException implements UnknownPlainConfigurationIndexExceptionInterface
{
}
