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
	 * Reads a value from the plain configuration.
	 * @param string $index The index of the value to read.
	 * @return mixed The read value.
	 * @throws PlainConfigurationIndexNotFoundException The index does not exist in the plain configuration.
	 */
	protected function read( string $index )
	{
		if ( false === array_key_exists( $index, $this->plainConfiguration ) )
		{
			throw new PlainConfigurationIndexNotFoundException(
				sprintf(
					static::ERROR_INDEX_NOT_FOUND,
					$index
				)
			);
		}

		return $this->plainConfiguration[ $index ];
	}

	/**
	 * Reads a value from the plain configuration or null.
	 * @param string $index The index of the value to read.
	 * @return ?mixed The read value if it exists, otherwise null.
	 */
	protected function readOrNull( string $index )
	{
		try
		{
			return $this->read( $index );
		}
		catch ( PlainConfigurationIndexNotFoundException $throwable )
		{
			return null;
		}
	}

	/**
	 * Reads a value from the plain configuration or a default value.
	 * @param string $index The index of the value to read.
	 * @return mixed The read value if it exists, otherwise the default value.
	 */
	protected function readOrDefault( string $index, $default )
	{
		try
		{
			return $this->read( $index );
		}
		catch ( PlainConfigurationIndexNotFoundException $throwable )
		{
			return $default;
		}
	}
}
