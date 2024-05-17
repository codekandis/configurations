<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationIndexNotFoundExceptionInterfaceTest;

use CodeKandis\Configurations\PlainConfigurationIndexNotFoundException;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with nonexistent index, expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithNonExistentIndexExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = PlainConfigurationIndexNotFoundException::class,
				'nonExistentIndex'           => $nonExistentIndex = Values::NONEXISTENT_INDEX,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			]
		];
	}
}
