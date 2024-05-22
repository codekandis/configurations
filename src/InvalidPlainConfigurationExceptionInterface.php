<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any exception thrown if a plain configuration is invalid.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface InvalidPlainConfigurationExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $configurationPath The path of the configuration which is invalid.
	 */
	public static function with_configurationPath( string $configurationPath ): static;
}
