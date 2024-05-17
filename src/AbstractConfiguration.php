<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use function array_key_exists;

/**
 * Represents the base class of any configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
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
				throw UnknownPlainConfigurationIndexException::with_unknownIndex( $index );
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
		catch ( UnknownPlainConfigurationIndexException )
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
		catch ( UnknownPlainConfigurationIndexException )
		{
			return $default;
		}
	}
}
