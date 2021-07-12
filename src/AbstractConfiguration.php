<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

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
	protected array $data;

	/**
	 * Constructor method.
	 * @param array $data The plain configuration data.
	 */
	public function __construct( array $data )
	{
		$this->data = $data;
	}
}
