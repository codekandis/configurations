<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\PlainConfigurationNotFoundExceptionInterface;
use CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationNotFoundExceptionInterfaceTest\ThrowableClassNamesWithNonExistentConfigurationPathExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\Configurations\InvalidPlainConfigurationExceptionInterface`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidPlainConfigurationExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `InvalidPlainConfigurationExceptionInterface::with_configurationPath()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $nonExistentConfigurationPath The configuration path which does not exist.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithNonExistentConfigurationPathExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithConfigurationPathInstantiatesThrowableCorrectly( string $throwableClassName, string $nonExistentConfigurationPath, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_configurationPath'}( $nonExistentConfigurationPath );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( PlainConfigurationNotFoundExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
