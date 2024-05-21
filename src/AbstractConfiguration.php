<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use Override;
use function array_key_exists;
use function is_array;

/**
 * Represents the base class of any configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
	/**
	 * Constructor method.
	 * @param array $plainConfiguration The plain configuration data.
	 */
	public function __construct( protected readonly array $plainConfiguration )
	{
	}

	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function read( string ...$indices ): mixed
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
	#[Override]
	public function readOrNull( string ...$indices ): mixed
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
	#[Override]
	public function readOrDefault( mixed $defaultValue = null, string ...$indices ): mixed
	{
		try
		{
			return $this->read( ...$indices );
		}
		catch ( UnknownPlainConfigurationIndexException )
		{
			return $defaultValue;
		}
	}
}
