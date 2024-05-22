<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use Override;
use RuntimeException;
use function sprintf;

/**
 * Represents an exception thrown if an index does not exist in a plain configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationIndexNotFoundException extends RuntimeException implements PlainConfigurationIndexNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if an index does not exist in the plain configuration.
	 */
	public const string EXCEPTION_MESSAGE_INDEX_NOT_FOUND = 'The index `%s` does not exist in the plain configuration.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_index( string $index ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $index )
		);
	}
}
