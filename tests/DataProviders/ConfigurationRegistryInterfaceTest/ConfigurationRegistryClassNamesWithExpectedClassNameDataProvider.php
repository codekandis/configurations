<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\ConfigurationRegistryInterfaceTest;

use CodeKandis\Configurations\Tests\Fixtures\ConfigurationRegistry;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configuration registry class names with expectedClassName.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationRegistryClassNamesWithExpectedClassNameDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'configurationRegistryClassName' => $configurationClassName = ConfigurationRegistry::class,
				'expectedClassName'              => $configurationClassName
			]
		];
	}
}
