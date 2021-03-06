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
	 * Gets the merged plain configuration.
	 * @return array The merged plain configuration.
	 */
	public function getPlainConfiguration(): array;

	/**
	 * Loads the plain configuration.
	 * @param string $directoryPath The path of the directory containing the plain configuration.
	 * @param string $configurationName The name of the plain configuration.
	 * @return self The plain configuration loader.
	 * @throws PlainConfigurationNotFoundException The configuration to load does not exist.
	 */
	public function load( string $directoryPath, string $configurationName ): self;
}
