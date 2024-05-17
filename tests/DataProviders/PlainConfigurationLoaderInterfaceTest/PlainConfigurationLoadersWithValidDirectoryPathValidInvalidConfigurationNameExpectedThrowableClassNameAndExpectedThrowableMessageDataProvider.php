<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest;

use CodeKandis\Configurations\InvalidPlainConfigurationException;
use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configurations with valid directory path, valid invalid configuration name, expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoadersWithValidDirectoryPathValidInvalidConfigurationNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'plainConfigurationLoader'      => new PlainConfigurationLoader(),
				'validDirectoryPath'            => $validDirectoryPath = Values::VALID_DIRECTORY_PATH,
				'validInvalidConfigurationName' => $validInvalidConfigurationName = Values::VALID_INVALID_CONFIGURATION_NAME,
				'expectedThrowableClassName'    => InvalidPlainConfigurationException::class,
				'expectedThrowableMessage'      => sprintf(
					InvalidPlainConfigurationException::EXCEPTION_MESSAGE_INVALID_PLAIN_CONFIGURATION,
					sprintf(
						Values::CONFIGURATION_PATH_TEMPLATE,
						$validDirectoryPath,
						$validInvalidConfigurationName
					)
				)
			]
		];
	}
}
