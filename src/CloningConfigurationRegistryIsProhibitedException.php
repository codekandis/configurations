<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use LogicException;
use Override;

/**
 * Represents an exception thrown if an attempt to clone the configuration registry has been made.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class CloningConfigurationRegistryIsProhibitedException extends LogicException implements CloningConfigurationRegistryIsProhibitedExceptionInterface
{
	/**
	 * Represents the exception message if the clone method of the configuration registry has been called.
	 */
	public const string EXCEPTION_MESSAGE_CLONING_IS_PROHIBITED = 'The cloning of the configuration registry is prohibited.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_defaultMessage(): static
	{
		return new static( static::EXCEPTION_MESSAGE_CLONING_IS_PROHIBITED );
	}
}
