<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\DataProviders\ConfigurationTest;

use CodeKandis\Configurations\Configuration;
use CodeKandis\Configurations\Tests\Fixtures\Values;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing configuration class names with plain configuration.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConfigurationClassNamesWithPlainConfigurationDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'configurationClassName' => Configuration::class,
				'plainConfiguration'     => Values::VALID_PLAIN_CONFIGURATION_1
			]
		];
	}
}
