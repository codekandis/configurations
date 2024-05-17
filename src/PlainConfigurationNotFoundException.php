<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use CodeKandis\Types\RuntimeException;
use Override;
use function sprintf;

/**
 * Represents an exception thrown if a plain configuration does not exist.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationNotFoundException extends RuntimeException implements PlainConfigurationNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if the plain configuration does not exist.
	 */
	public const string EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND = 'The plain configuration `%s` does not exist.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_configurationPath( string $configurationPath ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND, $configurationPath )
		);
	}
}
