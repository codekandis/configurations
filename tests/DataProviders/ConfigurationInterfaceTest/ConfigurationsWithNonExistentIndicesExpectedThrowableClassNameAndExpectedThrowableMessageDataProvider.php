<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\ConfigurationInterfaceTest;

use CodeKandis\Configurations\Configuration;
use CodeKandis\Configurations\PlainConfigurationIndexNotFoundException;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing configurations with nonexistent indices, expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationsWithNonExistentIndicesExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			1 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_1,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			2 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_2,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			3 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_3,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			4 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_1,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			5 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_2,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			],
			6 => [
				'configuration'              => new Configuration( Values::VALID_PLAIN_CONFIGURATION_1 ),
				'nonExistentIndices'         => [
					Values::VALID_INDEX_2,
					Values::VALID_NESTED_INDEX_3,
					$nonExistentIndex = Values::NONEXISTENT_INDEX
				],
				'expectedThrowableClassName' => PlainConfigurationIndexNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( PlainConfigurationIndexNotFoundException::EXCEPTION_MESSAGE_INDEX_NOT_FOUND, $nonExistentIndex )
			]
		];
	}
}
