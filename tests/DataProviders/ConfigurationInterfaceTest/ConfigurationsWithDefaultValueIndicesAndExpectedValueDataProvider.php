<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest;

use CodeKandis\Configurations\Configuration;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configurations with indices and expected value.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationsWithDefaultValueIndicesAndExpectedValueDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			1  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_1,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			2  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_2,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			3  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_3,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			4  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_4,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			5  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_5,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			6  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_6,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			7  => [
				'configuration' => new Configuration( $plainConfiguration = Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::DEFAULT_VALUE_7,
				'indices'       => [],
				'expectedValue' => $plainConfiguration
			],
			8  => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_1,
				'indices'       => [
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			9  => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_2,
				'indices'       => [
					Values::VALID_INDEX_1,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			10 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_3,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			11 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_4,
				'indices'       => [
					Values::VALID_INDEX_3,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			12 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_5,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_1,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			13 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_6,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_2,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			14 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => $defaultValue = Values::DEFAULT_VALUE_7,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_3,
					Values::NONEXISTENT_INDEX
				],
				'expectedValue' => $defaultValue
			],
			15 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_1
				],
				'expectedValue' => Values::VALID_VALUE_1
			],
			16 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_2
				],
				'expectedValue' => Values::VALID_VALUE_2
			],
			17 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_3
				],
				'expectedValue' => Values::VALID_VALUE_3
			],
			18 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_1
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_1
			],
			19 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_2
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_2
			],
			20 => [
				'configuration' => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'defaultValue'  => Values::NULL,
				'indices'       => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_3
				],
				'expectedValue' => Values::VALID_NESTED_VALUE_3
			]
		];
	}
}
