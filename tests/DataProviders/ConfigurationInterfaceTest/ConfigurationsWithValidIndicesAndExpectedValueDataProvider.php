<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest;

use CodeKandis\Configurations\Configuration;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configurations with valid indices and expected value.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationsWithValidIndicesAndExpectedValueDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [],
				'expectedValue' => $plainConfiguration
			],
			1 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_1
				],
				'expectedValue' => Values::VALID_VALUE_1
			],
			2 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_2
				],
				'expectedValue' => Values::VALID_VALUE_2
			],
			3 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_3
				],
				'expectedValue' => Values::VALID_VALUE_3
			],
			4 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_1
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_1
			],
			5 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_2
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_2
			],
			6 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'validIndices'  => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_3
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_3
			]
		];
	}
}
