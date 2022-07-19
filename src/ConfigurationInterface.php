<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

/**
 * Represents the interface of any configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConfigurationInterface
{
	/**
	 * Reads a value from the plain configuration.
	 * @param string[] $indices The nested indices of the value to read.
	 * @return mixed The read value.
	 * @throws PlainConfigurationIndexNotFoundException The index does not exist in the plain configuration.
	 */
	public function read( string ...$indices );

	/**
	 * Reads a value from the plain configuration or null.
	 * @param string[] $indices The nested indices of the value to read.
	 * @return ?mixed The read value if it exists, otherwise null.
	 */
	public function readOrNull( string ...$indices );

	/**
	 * Reads a value from the plain configuration or a default value.
	 * @param mixed $default The default value to return if the value does not exist.
	 * @param string[] $indices The nested indices of the value to read.
	 * @return mixed The read value if it exists, otherwise the default value.
	 */
	public function readOrDefault( $default, string ...$indices );
}
