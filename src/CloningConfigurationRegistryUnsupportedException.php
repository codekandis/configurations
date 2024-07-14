<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use CodeKandis\Types\UnsupportedOperationException;

/**
 * Represents an exception thrown if an attempt to clone the configuration registry has been made.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class CloningConfigurationRegistryUnsupportedException extends UnsupportedOperationException implements CloningConfigurationRegistryUnsupportedExceptionInterface
{
	/**
	 * Represents the default exception message if the clone method of the configuration registry has been called.
	 */
	public const string EXCEPTION_MESSAGE_DEFAULT = 'The cloning of the configuration registry is unsupported.';
}
