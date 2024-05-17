<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\UnitTests;

use CodeKandis\Configurations\CloningConfigurationRegistryIsProhibitedExceptionInterface;
use CodeKandis\Configurations\Tests\DataProviders\CloningConfigurationRegistryIsProhibitedExceptionInterfaceTest\ThrowableClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\Configurations\CloningConfigurationRegistryIsProhibitedExceptionInterface`.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class CloningConfigurationRegistryIsProhibitedExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `CloningConfigurationRegistryIsProhibitedExceptionInterface::with_defaultMessage()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithInvalidTypeAndExpectedTypesInstantiatesThrowableCorrectly( string $throwableClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_defaultMessage'}();
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( CloningConfigurationRegistryIsProhibitedExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
