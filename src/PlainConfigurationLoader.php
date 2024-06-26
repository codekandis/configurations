<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use Override;
use function array_replace_recursive;
use function file_exists;
use function is_array;
use function sprintf;

/**
 * Represents the interface of any plain configuration loader.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoader implements PlainConfigurationLoaderInterface
{
	/**
	 * Stores the merged plain configuration.
	 */
	private array $plainConfiguration = [];

	/**
	 * @inheritDoc
	 */
	#[Override]
	public function getPlainConfiguration(): array
	{
		return $this->plainConfiguration;
	}

	/**
	 * @inheritDoc
	 */
	#[Override]
	public function load( string $directoryPath, string $configurationName ): static
	{
		$plainConfigurationPath = sprintf(
			'%s/%s.php',
			$directoryPath,
			$configurationName
		);

		if ( false === file_exists( $plainConfigurationPath ) )
		{
			throw PlainConfigurationNotFoundException::with_configurationPath( $plainConfigurationPath );
		}

		$loadedPlainConfiguration = require $plainConfigurationPath;

		if ( false === is_array( $loadedPlainConfiguration ) )
		{
			throw InvalidPlainConfigurationException::with_configurationPath( $plainConfigurationPath );
		}

		$this->plainConfiguration = array_replace_recursive( $this->plainConfiguration, $loadedPlainConfiguration );

		return $this;
	}
}
