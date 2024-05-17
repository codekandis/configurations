<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\PlainConfigurationLoaderInterfaceTest;

use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing plain configuration loaders with valid directory path and valid configuration name.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class PlainConfigurationLoadersWithValidDirectoryPathAndValidValidConfigurationNameDataProvider implements DataProviderInterface
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
				'validPaths'                  => [
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_1
					]
				],
				'expectedPlainConfigurations' => [
					Values::VALID_PLAIN_CONFIGURATION_1
				]
			],
			1 => [
				'plainConfigurationLoader'    => new PlainConfigurationLoader(),
				'validPaths'                  => [
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_2
					]
				],
				'expectedPlainConfigurations' => [
					Values::VALID_PLAIN_CONFIGURATION_2
				]
			],
			2 => [
				'plainConfigurationLoader'    => new PlainConfigurationLoader(),
				'validPaths'                  => [
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_1
					],
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_2
					]
				],
				'expectedPlainConfigurations' => [
					Values::VALID_PLAIN_CONFIGURATION_1,
					Values::VALID_MERGED_PLAIN_CONFIGURATION_1
				]
			],
			3 => [
				'plainConfigurationLoader'    => new PlainConfigurationLoader(),
				'validPaths'                  => [
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_2
					],
					[
						'directoryPath'          => Values::VALID_DIRECTORY_PATH,
						'validConfigurationName' => Values::VALID_VALID_CONFIGURATION_NAME_1
					]
				],
				'expectedPlainConfigurations' => [
					Values::VALID_PLAIN_CONFIGURATION_2,
					Values::VALID_MERGED_PLAIN_CONFIGURATION_2
				]
			]
		];
	}
}
