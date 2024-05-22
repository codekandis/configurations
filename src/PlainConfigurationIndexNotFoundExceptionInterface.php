<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any exception thrown if an index does not exist in a plain configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PlainConfigurationIndexNotFoundExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $index The index which does not exist.
	 */
	public static function with_index( string $index ): static;
}
