<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\InvalidPlainConfigurationExceptionInterfaceTest;

use CodeKandis\Configurations\InvalidPlainConfigurationException;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with nonexistent configuration path, expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithNonExistentConfigurationPathExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'           => $throwableClassName = InvalidPlainConfigurationException::class,
				'nonExistentConfigurationPath' => $nonExistentConfigurationPath = sprintf(
					Values::CONFIGURATION_PATH_TEMPLATE,
					Values::NONEXISTENT_DIRECTORY_PATH,
					Values::NONEXISTENT_CONFIGURATION_NAME
				),
				'expectedThrowableClassName'   => $throwableClassName,
				'expectedThrowableMessage'     => sprintf( InvalidPlainConfigurationException::EXCEPTION_MESSAGE_INVALID_PLAIN_CONFIGURATION, $nonExistentConfigurationPath )
			]
		];
	}
}
