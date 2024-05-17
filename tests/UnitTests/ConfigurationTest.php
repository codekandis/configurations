<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\Configuration;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationTest\ConfigurationClassNamesWithPlainConfigurationDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\Configurations\Configuration`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationTest extends TestCase
{
	/**
	 * Tests if the method `Configuration::__construct()` instantiates the configuration correctly.
	 * @param string $configurationClassName The class name of the configuration to test.
	 * @param array $plainConfiguration The plain configuration to pass.
	 */
	#[DataProviderExternal( ConfigurationClassNamesWithPlainConfigurationDataProvider::class, 'provideData' )]
	public function testIfConstructorInstantiatesConfigurationCorrectly( string $configurationClassName, array $plainConfiguration ): void
	{
		$resultedConfiguration = new $configurationClassName( $plainConfiguration );

		static::assertInstanceOf( Configuration::class, $resultedConfiguration );
	}
}
