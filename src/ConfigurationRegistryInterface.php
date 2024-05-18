<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any configuration registry.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConfigurationRegistryInterface
{
	/**
	 * Static constructor method.
	 */
	public static function _(): static;
}
