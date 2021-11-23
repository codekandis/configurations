<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the base class of any configuration registry.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractConfigurationRegistry implements ConfigurationRegistryInterface
{
	/**
	 * Stores the singleton instances of the configuration registries.
	 * @var ConfigurationRegistryInterface[]
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
	 */
	final private function __clone()
	{
	}

	/**
	 * Creates the singleton instance of the configuration registry.
	 * @return ConfigurationRegistryInterface
	 */
	public static function _(): ConfigurationRegistryInterface
	{
		$calledClass = get_called_class();

		return static::$instances[ $calledClass ]
			   ?? static::$instances[ $calledClass ] = new static();
	}

	/**
	 * Initializes the configuration registry.
	 */
	abstract protected function initialize(): void;
}
