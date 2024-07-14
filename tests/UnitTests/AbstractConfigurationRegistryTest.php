<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\AbstractConfigurationRegistry;
use CodeKandis\Configurations\CloningConfigurationRegistryUnsupportedExceptionInterface;
use CodeKandis\Configurations\Tests\DataProviders\AbstractConfigurationRegistryTest\ConfigurationRegistryClassNamesDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\AbstractConfigurationRegistryTest\ConfigurationRegistryClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ReflectionClass;
use Throwable;

/**
 * Represents the test case of `CodeKandis\Configurations\AbstractConfigurationRegistry`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class AbstractConfigurationRegistryTest extends TestCase
{
	/**
	 * Tests if the method `AbstractConfigurationRegistry::__construct()` instantiates the configuration correctly.
	 * @param string $configurationRegistryClassName The class name of the configuration to test.
	 */
	#[DataProviderExternal( ConfigurationRegistryClassNamesDataProvider::class, 'provideData' )]
	public function testIfConstructorInstantiatesConfigurationRegistryCorrectly( string $configurationRegistryClassName ): void
	{
		$resultedConfigurationRegistry = new $configurationRegistryClassName();

		static::assertInstanceOf( AbstractConfigurationRegistry::class, $resultedConfigurationRegistry );
	}

	/**
	 * Tests if the method `AbstractConfigurationRegistry::__clone()` throws a `CodeKandis\Configurations\CloningConfigurationRegistryUnsupportedExceptionInterface`.
	 * @param string $configurationRegistryClassName The class name of the configuration to test.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ConfigurationRegistryClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodCloneThrowsCloningConfigurationRegistryUnsupportedExceptionInterface( string $configurationRegistryClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$configurationRegistry         = new $configurationRegistryClassName();
			$reflectedConfigurationRegisty = new ReflectionClass( $configurationRegistry );
			$cloneMethod                   = $reflectedConfigurationRegisty->getMethod( '__clone' );
			$cloneMethod->setAccessible( true );
			$cloneMethod->invoke( $configurationRegistry );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( CloningConfigurationRegistryUnsupportedExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}
}
