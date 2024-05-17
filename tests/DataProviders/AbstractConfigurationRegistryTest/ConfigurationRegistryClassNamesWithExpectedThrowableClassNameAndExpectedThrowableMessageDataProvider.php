<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\AbstractConfigurationRegistryTest;

use CodeKandis\Configurations\CloningConfigurationRegistryIsProhibitedException;
use CodeKandis\Configurations\Tests\Fixtures\ConfigurationRegistry;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configuration registry class names with expected throwable class name and expected throwable message.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationRegistryClassNamesWithExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'configurationRegistryClassName' => ConfigurationRegistry::class,
				'expectedThrowableClassName'     => CloningConfigurationRegistryIsProhibitedException::class,
				'expectedThrowableMessage'       => CloningConfigurationRegistryIsProhibitedException::EXCEPTION_MESSAGE_CLONING_IS_PROHIBITED
			]
		];
	}
}
