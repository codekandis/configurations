<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest;

use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Configurations\PlainConfigurationNotFoundException;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing configurations with nonexistent directory path, nonexistent configuration name, expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoadersWithNonExistentDirectoryPathNonExistentConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'plainConfigurationLoader'     => new PlainConfigurationLoader(),
				'nonExistentDirectoryPath'     => $nonExistentDirectoryPath = Values::NONEXISTENT_DIRECTORY_PATH,
				'nonExistentConfigurationName' => $nonExistentConfigurationName = Values::NONEXISTENT_CONFIGURATION_NAME,
				'expectedThrowableClassName'   => PlainConfigurationNotFoundException::class,
				'expectedThrowableMessage'     => sprintf(
					PlainConfigurationNotFoundException::EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND,
					sprintf(
						Values::CONFIGURATION_PATH_TEMPLATE,
						$nonExistentDirectoryPath,
						$nonExistentConfigurationName
					)
				)
			],
			1 => [
				'plainConfigurationLoader'     => new PlainConfigurationLoader(),
				'nonExistentDirectoryPath'     => $nonExistentDirectoryPath = Values::NONEXISTENT_DIRECTORY_PATH,
				'nonExistentConfigurationName' => $validConfigurationName = Values::VALID_VALID_CONFIGURATION_NAME_1,
				'expectedThrowableClassName'   => PlainConfigurationNotFoundException::class,
				'expectedThrowableMessage'     => sprintf(
					PlainConfigurationNotFoundException::EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND,
					sprintf(
						Values::CONFIGURATION_PATH_TEMPLATE,
						$nonExistentDirectoryPath,
						$validConfigurationName
					)
				)
			],
			2 => [
				'plainConfigurationLoader'     => new PlainConfigurationLoader(),
				'nonExistentDirectoryPath'     => $nonExistentDirectoryPath = Values::NONEXISTENT_DIRECTORY_PATH,
				'nonExistentConfigurationName' => $validConfigurationName = Values::VALID_VALID_CONFIGURATION_NAME_2,
				'expectedThrowableClassName'   => PlainConfigurationNotFoundException::class,
				'expectedThrowableMessage'     => sprintf(
					PlainConfigurationNotFoundException::EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND,
					sprintf(
						Values::CONFIGURATION_PATH_TEMPLATE,
						$nonExistentDirectoryPath,
						$validConfigurationName
					)
				)
			],
			3 => [
				'plainConfigurationLoader'     => new PlainConfigurationLoader(),
				'nonExistentDirectoryPath'     => $validDirectoryPath = Values::VALID_DIRECTORY_PATH,
				'nonExistentConfigurationName' => $nonExistentConfigurationName = Values::NONEXISTENT_CONFIGURATION_NAME,
				'expectedThrowableClassName'   => PlainConfigurationNotFoundException::class,
				'expectedThrowableMessage'     => sprintf(
					PlainConfigurationNotFoundException::EXCEPTION_MESSAGE_PLAIN_CONFIGURATION_NOT_FOUND,
					sprintf(
						Values::CONFIGURATION_PATH_TEMPLATE,
						$validDirectoryPath,
						$nonExistentConfigurationName
					)
				)
			]
		];
	}
}
