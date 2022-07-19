<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use function array_key_exists;
use function sprintf;

/**
 * Represents the base class of any configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
	/**
	 * Represents an error message if an index does not exist in the plain configuration.
	 * @var string
	 */
	protected const ERROR_INDEX_NOT_FOUND = 'The index `%s` does not exist in the plain configuration.';

	/**
	 * Stores the plain configuration data.
	 * @var array
	 */
	protected array $plainConfiguration;

	/**
	 * Constructor method.
	 * @param array $plainConfiguration The plain configuration data.
	 */
	public function __construct( array $plainConfiguration )
	{
		$this->plainConfiguration = $plainConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function read( string ...$indices )
	{
		$nestedConfigurationData = $this->plainConfiguration;

		foreach ( $indices as $index )
		{
			if ( false === is_array( $nestedConfigurationData ) || false === array_key_exists( $index, $nestedConfigurationData ) )
			{
				throw new PlainConfigurationIndexNotFoundException(
					sprintf(
						static::ERROR_INDEX_NOT_FOUND,
						$index
					)
				);
			}

			$nestedConfigurationData = $nestedConfigurationData[ $index ];
		}

		return $nestedConfigurationData;
	}

	/**
	 * {@inheritDoc}
	 */
	public function readOrNull( string ...$indices )
	{
		try
		{
			return $this->read( ...$indices );
		}
		catch ( PlainConfigurationIndexNotFoundException $throwable )
		{
			return null;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function readOrDefault( $default, string ...$indices )
	{
		try
		{
			return $this->read( ...$indices );
		}
		catch ( PlainConfigurationIndexNotFoundException $throwable )
		{
			return $default;
		}
	}
}
