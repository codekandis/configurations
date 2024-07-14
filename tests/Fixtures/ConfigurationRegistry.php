<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\Fixtures;

use CodeKandis\Configurations\AbstractConfigurationRegistry;
use Override;

/**
 * Represents a configuration registry.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationRegistry extends AbstractConfigurationRegistry
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @inheritDoc
	 */
	#[Override]
	public function initialize(): void
	{
	}
}
