<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use Override;
use function array_key_exists;

/**
 * Represents the base class of any configuration registry.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	/**
	 * Stores the singleton instances of the configuration registries.
	 * @var static[]
	 */
	private static array $instances = [];

	/**
	 * Constructor method.
	 */
	protected function __construct()
	{
		$this->initialize();
	}

	/**
	 * Clones the configuration registry.
	 * @throws CloningConfigurationRegistryUnsupportedExceptionInterface The cloning of the configuration registry is unsupported.
	 */
	private function __clone(): void
	{
		throw new CloningConfigurationRegistryUnsupportedException();
	}

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function _(): static
	{
		$calledClass = static::class;

		return false === array_key_exists( $calledClass, static::$instances )
			? static::$instances[ $calledClass ] = new static()
			: static::$instances[ $calledClass ];
	}

	/**
	 * Initializes the configuration registry.
	 */
	abstract protected function initialize(): void;
}
