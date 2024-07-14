<?php declare( strict_types = 1 );
namespace CodeKandis\Configurations\Tests\Fixtures;

/**
 * Represents an enumeration of values.
 * @package codekandis/configurations
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class Values
{
	/**
	 * Represents a `null` value.
	 */
	public const null NULL = null;

	/**
	 * Represents a valid index.
	 */
	public const string VALID_INDEX_1 = 'index_1';

	/**
	 * Represents a valid index.
	 */
	public const string VALID_INDEX_2 = 'index_2';

	/**
	 * Represents a valid index.
	 */
	public const string VALID_INDEX_3 = 'index_3';

	/**
	 * Represents a valid index.
	 */
	public const string VALID_INDEX_4 = 'index_4';

	/**
	 * Represents a valid nested index.
	 */
	public const string VALID_NESTED_INDEX_1 = 'nestedIndex_1';

	/**
	 * Represents a valid nested index.
	 */
	public const string VALID_NESTED_INDEX_2 = 'nestedIndex_2';

	/**
	 * Represents a valid nested index.
	 */
	public const string VALID_NESTED_INDEX_3 = 'nestedIndex_3';

	/**
	 * Represents a nonexistent index.
	 */
	public const string NONEXISTENT_INDEX = 'nonExistentIndex';

	/**
	 * Represents a valid value.
	 */
	public const string VALID_VALUE_1 = 'value_1';

	/**
	 * Represents a valid value.
	 */
	public const array VALID_VALUE_2 = [
		self::VALID_NESTED_INDEX_1 => self::VALID_NESTED_VALUE_1,
		self::VALID_NESTED_INDEX_2 => self::VALID_NESTED_VALUE_2,
		self::VALID_NESTED_INDEX_3 => self::VALID_NESTED_VALUE_3
	];

	/**
	 * Represents a valid value.
	 */
	public const null VALID_VALUE_3 = null;

	/**
	 * Represents a valid value.
	 */
	public const array VALID_VALUE_4 = [
		self::VALID_NESTED_INDEX_1 => self::VALID_NESTED_VALUE_2,
		self::VALID_NESTED_INDEX_2 => self::VALID_NESTED_VALUE_1,
		self::VALID_NESTED_INDEX_3 => self::VALID_NESTED_VALUE_3
	];

	/**
	 * Represents a valid nested value.
	 */
	public const string VALID_NESTED_VALUE_1 = "nestedValue_1";

	/**
	 * Represents a valid nested value.
	 */
	public const string VALID_NESTED_VALUE_2 = "nestedValue_2";

	/**
	 * Represents a valid nested value.
	 */
	public const null VALID_NESTED_VALUE_3 = self::NULL;

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_1 = 'defaultValue_1';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_2 = 'defaultValue_2';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_3 = 'defaultValue_3';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_4 = 'defaultValue_4';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_5 = 'defaultValue_5';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_6 = 'defaultValue_6';

	/**
	 * Represents a default value.
	 */
	public const string DEFAULT_VALUE_7 = 'defaultValue_7';

	/**
	 * Represents a valid plain configuration.
	 */
	public const array VALID_PLAIN_CONFIGURATION_1 = [
		self::VALID_INDEX_1 => self::VALID_VALUE_1,
		self::VALID_INDEX_2 => self::VALID_VALUE_2,
		self::VALID_INDEX_3 => self::VALID_VALUE_3
	];

	/**
	 * Represents a valid plain configuration.
	 */
	public const array VALID_PLAIN_CONFIGURATION_2 = [
		'index_1' => self::VALID_VALUE_1,
		'index_2' => self::VALID_VALUE_4,
		'index_3' => self::VALID_VALUE_2,
		'index_4' => self::VALID_VALUE_3
	];

	/**
	 * Represents a valid merged plain configuration.
	 */
	public const array VALID_MERGED_PLAIN_CONFIGURATION_1 = [
		'index_1' => self::VALID_VALUE_1,
		'index_2' => self::VALID_VALUE_4,
		'index_3' => self::VALID_VALUE_2,
		'index_4' => self::VALID_VALUE_3
	];

	/**
	 * Represents a valid merged plain configuration.
	 */
	public const array VALID_MERGED_PLAIN_CONFIGURATION_2 = [
		'index_1' => self::VALID_VALUE_1,
		'index_2' => self::VALID_VALUE_2,
		'index_3' => self::VALID_VALUE_3,
		'index_4' => self::VALID_VALUE_3
	];

	/**
	 * Represents an invalid plain configuration.
	 */
	public const string INVALID_PLAIN_CONFIGURATION = 'invalidPlainConfiguration';

	/**
	 * Represents a nonexistent configuration path template.
	 */
	public const string CONFIGURATION_PATH_TEMPLATE = '%s/%s.php';

	/**
	 * Represents a valid directory path.
	 */
	public const string VALID_DIRECTORY_PATH = __DIR__;

	/**
	 * Represents a nonexistent directory path.
	 */
	public const string NONEXISTENT_DIRECTORY_PATH = 'nonExistent/directory/path';

	/**
	 * Represents a valid valid configuration name.
	 */
	public const string VALID_VALID_CONFIGURATION_NAME_1 = 'validPlainConfiguration_1';

	/**
	 * Represents a valid valid configuration name.
	 */
	public const string VALID_VALID_CONFIGURATION_NAME_2 = 'validPlainConfiguration_2';

	/**
	 * Represents an valid invalid configuration name.
	 */
	public const string VALID_INVALID_CONFIGURATION_NAME = 'invalidPlainConfiguration';

	/**
	 * Represents a nonexistent configuration name.
	 */
	public const string NONEXISTENT_CONFIGURATION_NAME = 'nonExistentConfigurationName';
}
