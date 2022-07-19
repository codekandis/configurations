<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations;

use LogicException;

/**
 * Represents an exception thrown if an attempt to clone the configuration registry has been made.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
class CloningConfigurationRegistryIsProhibitedException extends LogicException
{
}
