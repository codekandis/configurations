<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\InvalidPlainConfigurationExceptionInterface;
use CodeKandis\Configurations\PlainConfigurationLoaderInterface;
use CodeKandis\Configurations\PlainConfigurationNotFoundExceptionInterface;
use CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest\PlainConfigurationLoadersWithNonExistentDirectoryPathNonExistentConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest\PlainConfigurationLoadersWithValidDirectoryPathAndValidValidConfigurationNameDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest\PlainConfigurationLoadersWithValidDirectoryPathValidInvalidConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest\PlainConfigurationLoadersWithValidDirectoryPathValidValidConfigurationNameAndExpectedPlainConfigurationDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\Configurations\PlainConfigurationLoaderInterface`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoaderInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `PlainConfigurationLoaderInterface::getPlainConfiguration()` returns plain configuration correctly.
	 * @param PlainConfigurationLoaderInterface $plainConfigurationLoader The plain configuration loader to test.
	 * @param string $validDirectoryPath The valid directory path to pass.
	 * @param string $validValidConfigurationName The valid configuration name to pass.
	 * @param array $expectedPlainConfiguration The expected plain configuration.
	 */
	#[DataProviderExternal( PlainConfigurationLoadersWithValidDirectoryPathValidValidConfigurationNameAndExpectedPlainConfigurationDataProvider::class, 'provideData' )]
	public function testIfMethodGetPlainConfigurationReturnsPlainConfigurationCorrectly( PlainConfigurationLoaderInterface $plainConfigurationLoader, string $validDirectoryPath, string $validValidConfigurationName, array $expectedPlainConfiguration ): void
	{
		$plainConfigurationLoader->load( $validDirectoryPath, $validValidConfigurationName );
		$resultedPlainConfiguration = $plainConfigurationLoader->getPlainConfiguration();

		static::assertSame( $expectedPlainConfiguration, $resultedPlainConfiguration );
	}

	/**
	 * Tests if the method `PlainConfigurationLoaderInterface::load()` throws a `CodeKandis\Configurations\PlainConfigurationNotFoundExceptionInterface` on a nonexistent directory path and nonexistent configuration name.
	 * @param PlainConfigurationLoaderInterface $plainConfigurationLoader The plain configuration loader to test.
	 * @param string $nonExistentDirectoryPath The nonexistent directory path to pass.
	 * @param string $nonExistentConfigurationName The nonexistent configuration name to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( PlainConfigurationLoadersWithNonExistentDirectoryPathNonExistentConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodLoadThrowsPlainConfigurationNotFoundExceptionInterfaceOnNonExistentDirectoryPathAndNonExistentConfigurationName( PlainConfigurationLoaderInterface $plainConfigurationLoader, string $nonExistentDirectoryPath, string $nonExistentConfigurationName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$plainConfigurationLoader->load( $nonExistentDirectoryPath, $nonExistentConfigurationName );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( PlainConfigurationNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the method `PlainConfigurationLoaderInterface::load()` throws a `CodeKandis\Configurations\InvalidPlainConfigurationExceptionInterface` on a valid invalid configuration.
	 * @param PlainConfigurationLoaderInterface $plainConfigurationLoader The plain configuration loader to test.
	 * @param string $validDirectoryPath The valid directory path to pass.
	 * @param string $validInvalidConfigurationName The valid invalid configuration name to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( PlainConfigurationLoadersWithValidDirectoryPathValidInvalidConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodLoadThrowsInvalidPlainConfigurationExceptionInterfaceOnNonExistentDirectoryPathAndNonExistentConfigurationName( PlainConfigurationLoaderInterface $plainConfigurationLoader, string $validDirectoryPath, string $validInvalidConfigurationName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$plainConfigurationLoader->load( $validDirectoryPath, $validInvalidConfigurationName );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( InvalidPlainConfigurationExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the method `PlainConfigurationLoaderInterface::load()` loads plain configuration correctly.
	 * @param PlainConfigurationLoaderInterface $plainConfigurationLoader The plain configuration loader to test.
	 * @param array<array<string>> $validPaths The valid paths to pass.
	 * @param array $expectedPlainConfigurations The expected plain configurations.
	 */
	#[DataProviderExternal( PlainConfigurationLoadersWithValidDirectoryPathAndValidValidConfigurationNameDataProvider::class, 'provideData' )]
	public function testIfMethodLoadExecutesCorrectly( PlainConfigurationLoaderInterface $plainConfigurationLoader, array $validPaths, array $expectedPlainConfigurations ): void
	{
		foreach ( $validPaths as $validPathIndex => $validPath )
		{
			$resultedPlainConfiguration = $plainConfigurationLoader
				->load( $validPath[ 'directoryPath' ], $validPath[ 'validConfigurationName' ] )
				->getPlainConfiguration();

			static::assertSame( $expectedPlainConfigurations[ $validPathIndex ], $resultedPlainConfiguration );
		}
	}
}
