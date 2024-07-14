<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use Override;
use RuntimeException;
use function sprintf;

/**
 * Represents an exception thrown if a plain configuration is invalid.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidPlainConfigurationException extends RuntimeException implements InvalidPlainConfigurationExceptionInterface
{
	/**
	 * Represents the exception message if the plain configuration is invalid.
	 */
	public const string EXCEPTION_MESSAGE_INVALID_PLAIN_CONFIGURATION = 'The plain configuration `%s` is invalid.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_configurationPath( string $configurationPath ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_INVALID_PLAIN_CONFIGURATION, $configurationPath )
		);
	}
}
