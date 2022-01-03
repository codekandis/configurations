<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any plain configuration loader.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PlainConfigurationLoaderInterface
{
	/**
	 * Loads the plain configuration.
	 * @return array The plain configuration.
	 * @throws PlainConfigurationNotFoundException The configuration to load does not exist.
	 */
	public function load(): array;
}
