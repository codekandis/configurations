<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use function file_exists;

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
	 * Stores the path of the directory containing the plain configuration.
	 * @var string
	 */
	private string $directoryPath;

	/**
	 * Stores the name of the plain configuration.
	 * @var string
	 */
	private string $configurationName;

	/**
	 * Constructor method.
	 * @param string $directoryPath The path of the directory containing the plain configuration.
	 * @param string $configurationName The name of the plain configuration.
	 */
	public function __construct( string $directoryPath, string $configurationName )
	{
		$this->directoryPath     = $directoryPath;
		$this->configurationName = $configurationName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function load(): array
	{
		$plainConfigurationPath = sprintf(
			'%s/%s.php',
			$this->directoryPath,
			$this->configurationName
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

		return require $plainConfigurationPath;
	}
}
