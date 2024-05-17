<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\ConfigurationRegistryInterface;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationRegistryInterfaceTest\ConfigurationRegistryClassNamesWithExpectedClassNameDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\Configurations\ConfigurationRegistryInterface`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationRegistryInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `ConfigurationRegistryInterface::_()` returns the configuration registry correctly.
	 * @param string $configurationRegistryClassName The class name of the configuration registry to test.
	 * @param string $expectedClassName The expected class name.
	 */
	#[DataProviderExternal( ConfigurationRegistryClassNamesWithExpectedClassNameDataProvider::class, 'provideData' )]
	public function testIfMethod_ReturnsConfigurationRegistryCorrectly( string $configurationRegistryClassName, string $expectedClassName ): void
	{
		$resultedConfigurationRegistry = $configurationRegistryClassName::{'_'}();

		static::assertInstanceOf( $expectedClassName, $resultedConfigurationRegistry );
		static::assertInstanceOf( ConfigurationRegistryInterface::class, $resultedConfigurationRegistry );
	}
}
