<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\CloningConfigurationRegistryIsProhibitedExceptionInterfaceTest;

use CodeKandis\Configurations\CloningConfigurationRegistryIsProhibitedException;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing throwable class names with expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = CloningConfigurationRegistryIsProhibitedException::class,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => CloningConfigurationRegistryIsProhibitedException::EXCEPTION_MESSAGE_CLONING_IS_PROHIBITED
			]
		];
	}
}
