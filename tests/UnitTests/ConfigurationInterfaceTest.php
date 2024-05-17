<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\ConfigurationInterface;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest\ConfigurationsWithDefaultValueIndicesAndExpectedValueDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest\ConfigurationsWithIndicesAndExpectedValueDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest\ConfigurationsWithNonExistentIndicesExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest\ConfigurationsWithValidIndicesAndExpectedValueDataProvider;
use CodeKandis\Configurations\UnknownPlainConfigurationIndexExceptionInterface;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\Configurations\ConfigurationInterface`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `ConfigurationInterface::read()` throws a `CodeKandis\Configurations\UnknownPlainConfigurationIndexExceptionInterface` on a nonexistent index.
	 * @param ConfigurationInterface $configuration The configuration to test.
	 * @param string[] $nonExistentIndices The nonexistent indices to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ConfigurationsWithNonExistentIndicesExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodReadThrowsPlainConfigurationIndexNotFoundExceptionInterfaceOnInvalidValueType( ConfigurationInterface $configuration, array $nonExistentIndices, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$configuration->read( ...$nonExistentIndices );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( UnknownPlainConfigurationIndexExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the method `ConfigurationInterface::read()` returns a value correctly.
	 * @param ConfigurationInterface $configuration The configuration to test.
	 * @param array $validIndices The valid indices to pass.
	 * @param mixed $expectedValue The expected value.
	 */
	#[DataProviderExternal( ConfigurationsWithValidIndicesAndExpectedValueDataProvider::class, 'provideData' )]
	public function testIfMethodReadReturnsValueCorrectly( ConfigurationInterface $configuration, array $validIndices, mixed $expectedValue ): void
	{
		$resultedValue = $configuration->read( ...$validIndices );

		static::assertSame( $expectedValue, $resultedValue );
	}

	/**
	 * Tests if the method `ConfigurationInterface::readOrNull()` returns a value correctly.
	 * @param ConfigurationInterface $configuration The configuration to test.
	 * @param array $indices The indices to pass.
	 * @param mixed $expectedValue The expected value.
	 */
	#[DataProviderExternal( ConfigurationsWithIndicesAndExpectedValueDataProvider::class, 'provideData' )]
	public function testIfMethodReadOrNullReturnsValueCorrectly( ConfigurationInterface $configuration, array $indices, mixed $expectedValue ): void
	{
		$resultedValue = $configuration->readOrNull( ...$indices );

		static::assertSame( $expectedValue, $resultedValue );
	}

	/**
	 * Tests if the method `ConfigurationInterface::readOrDefault()` returns a value correctly.
	 * @param ConfigurationInterface $configuration The configuration to test.
	 * @param mixed $defaultValue The default value to pass.
	 * @param array $indices The indices to pass.
	 * @param mixed $expectedValue The expected value.
	 */
	#[DataProviderExternal( ConfigurationsWithDefaultValueIndicesAndExpectedValueDataProvider::class, 'provideData' )]
	public function testIfMethodReadOrDefaultReturnsValueCorrectly( ConfigurationInterface $configuration, mixed $defaultValue, array $indices, mixed $expectedValue ): void
	{
		$resultedValue = $configuration->readOrDefault( $defaultValue, ...$indices );

		static::assertSame( $expectedValue, $resultedValue );
	}
}
