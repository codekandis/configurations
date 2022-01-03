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
	 * Stores the singleton instance of the configuration registry.
	 * @var ConfigurationRegistryInterface
	 */
	protected static ConfigurationRegistryInterface $instance;

	/**
	 * Constructor method.
	 */
	private function __construct()
	{
		$this->initialize();
	}

	/**
	 * Clones the configuration registry.
	 */
	private function __clone()
	{
	}

	/**
	 * Creates the singleton instance of the configuration registry.
	 * @return ConfigurationRegistryInterface
	 */
	public static function _(): ConfigurationRegistryInterface
	{
		return static::$instance
			   ?? static::$instance = new static();
	}

	/**
	 * Initializes the configuration registry.
	 */
	abstract protected function initialize(): void;
}
