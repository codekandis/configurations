<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest;

use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing plain configuration loaders with valid directory path, valid valid configuration name and expected plain configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoadersWithValidDirectoryPathValidValidConfigurationNameAndExpectedPlainConfigurationDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'plainConfigurationLoader'    => new PlainConfigurationLoader(),
				'validDirectoryPath'          => Values::VALID_DIRECTORY_PATH,
				'validValidConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_1,
				'expectedPlainConfiguration'  => Values::VALID_PLAIN_CONFIGURATION_1
			],
			1 => [
				'plainConfigurationLoader'    => new PlainConfigurationLoader(),
				'validDirectoryPath'          => Values::VALID_DIRECTORY_PATH,
				'validValidConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_2,
				'expectedPlainConfiguration'  => Values::VALID_PLAIN_CONFIGURATION_2
			]
		];
	}
}
