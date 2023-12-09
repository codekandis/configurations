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
	 * Represents the error message if the clone method of the configuration registry has been called.
	 * @var string
	 */
	protected const ERROR_CLONING_IS_PROHIBITED = 'The cloning of the configuration registry is prohibited.';

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
	 * @throws CloningConfigurationRegistryIsProhibitedException The cloning of the configuration registry is prohibited.
	 */
	private function __clone()
	{
		throw new CloningConfigurationRegistryIsProhibitedException( static::ERROR_CLONING_IS_PROHIBITED );
	}

	/**
	 * Creates the singleton instance of the configuration registry.
	 * @return ConfigurationRegistryInterface The singleton instance of the configuration registry.
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
