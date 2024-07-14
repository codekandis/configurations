<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any exception thrown if a plain configuration does not exist.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PlainConfigurationNotFoundExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $configurationPath The path of the configuration which does not exist.
	 */
	public static function with_configurationPath( string $configurationPath ): static;
}
