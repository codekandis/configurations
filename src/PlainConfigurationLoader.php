<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use function array_merge;
use function file_exists;
use function sprintf;

/**
 * Represents the interface of any plain configuration loader.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoader implements PlainConfigurationLoaderInterface
{
	/**
	 * Represents the error message if the plain configuration does not exist.
	 * @var string
	 */
	protected const ERROR_PLAIN_CONFIGURATION_NOT_FOUND = 'The plain configuration `%s` does not exist.';

	/**
	 * Stores the merged plain configuration;
	 * @var array
	 */
	private array $plainConfiguration = [];


	/**
	 * {@inheritDoc}
	 */
	public function getPlainConfiguration(): array
	{
		return $this->plainConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function load( string $directoryPath, string $configurationName ): PlainConfigurationLoaderInterface
	{
		$plainConfigurationPath = sprintf(
			'%s/%s.php',
			$directoryPath,
			$configurationName
		);

		if ( false === file_exists( $plainConfigurationPath ) )
		{
			throw new PlainConfigurationNotFoundException(
				sprintf(
					static::ERROR_PLAIN_CONFIGURATION_NOT_FOUND,
					$plainConfigurationPath
				)
			);
		}

		$this->plainConfiguration = array_merge(
			$this->plainConfiguration,
			require $plainConfigurationPath
		);

		return $this;
	}
}
