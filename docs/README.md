# Documentation

## Index

* [`Configuration`](#configuration)
  * [Constructor](#constructor)
  * [Reading configuration data](#reading-configuration-data)
    * [`Configuration::read()`](#configurationread)
    * [`Configuration::readOrNull()`](#configurationreadornull)
    * [`Configuration::readOrDefault()`](#configurationreadordefault)
* [`PlainConfigurationLoader`](#plainconfigurationloader)
  * [Constructor](#constructor-1)
  * [Loading plain configuration data](#loading-plain-configuration-data)
    * [`PlainConfigurationLoader::load()`](#plainconfigurationloaderload)
* [`AbstractConfigurationRegistry`](#abstractconfigurationregistry)
  * [Constructor](#constructor-2)
  * [`AbstractConfigurationRegistry::__clone()`](#abstractconfigurationregistry__clone)
  * [`AbstractConfigurationRegistry::_()`](#abstractconfigurationregistry_)

## [`Configuration`][srclink-configuration]

A configuration manages reading of nested plain configuration data (multidimensional arrays).

### [Constructor][srclink-configuration-construct]

**Definition**

`Configuration::__construct( array $plainConfiguration )`

* `$plainConfiguration`- any array representing so-called plain configuration data

**Examples**

```php
$plainConfiguration = [
    'index_1' => 'value_1',
    'index_2' => [
        'nestedIndex_1' =>'nestedValue_1',
        'nestedIndex_2' =>'nestedValue_2',
        'nestedIndex_3' => NULL
    ],
    'index_3' =>  NULL
];

$configuration = new Configuration( $plainConfiguration );
```

### Reading configuration data

There are 3 methods to read any configuration data.

#### [`Configuration::read()`][srclink-Configuration-read]

Reads a value from the plain configuration.

**Definition**

`Configuration::read( string ...$indices )`

* `$indices` - a variadic amount of nested configuration keys

**Exceptions**

* [`PlainConfigurationIndexNotFoundException`][srclink-PlainConfigurationIndexNotFoundException] - if any of the indices does not exist

**Examples**

```php
$configuration->read();
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' => [
 *         'nestedIndex_1' =>'nestedValue_1',
 *         'nestedIndex_2' =>'nestedValue_2',
 *         'nestedIndex_3' => NULL
 *     ],
 *     'index_3' =>  NULL
 * ]
 */

$configuration->read( 'index_1' );
/**
 * 'value_1'
 */

$configuration->read( 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */

$configuration->read( 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */

$configuration->read( 'index_2', 'nestedIndex_4' );
/**
 * @throws PlainConfigurationIndexNotFoundException
 */
```

#### [`Configuration::readOrNull()`][srclink-Configuration-readOrNull]

Reads a value from the plain configuration.

**Definition**

`Configuration::readOrNull( string ...$indices )`

* `$indices` - a variadic amount of nested configuration keys

**Notes**

This method behaves nearly identical as [`Configuration::read()`](#configurationread). The only exception is if any of the indices does not exist `null` will be returned.

**Examples**

```php
$configuration->readOrNull();
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' => [
 *         'nestedIndex_1' =>'nestedValue_1',
 *         'nestedIndex_2' =>'nestedValue_2',
 *         'nestedIndex_3' => NULL
 *     ],
 *     'index_3' =>  NULL
 * ]
 */

$configuration->readOrNull( 'index_1' );
/**
 * 'value_1'
 */

$configuration->readOrNull( 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */

$configuration->readOrNull( 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */

$configuration->readOrNull( 'index_2', 'nestedIndex_4' );
/**
 * null
 */
```

#### [`Configuration::readOrDefault()`][srclink-Configuration-readOrDefault]

Reads a value from the plain configuration.

**Definition**

`Configuration::readOrDefault( mixed $defaultValue, string ...$indices )`

* `$defaultValue` - the default value to return if any of the indices does not exist
* `$indices` - a variadic amount of nested configuration keys

**Notes**

This method behaves nearly identical as [`Configuration::read()`](#configurationread). The only exception is if any of the indices does not exist the default value will be returned.

**Examples**

```php
$configuration->readOrDefault();
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' => [
 *         'nestedIndex_1' =>'nestedValue_1',
 *         'nestedIndex_2' =>'nestedValue_2',
 *         'nestedIndex_3' => NULL
 *     ],
 *     'index_3' =>  NULL
 * ]
 */

$configuration->readOrDefault( 'defaultValue' );
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' => [
 *         'nestedIndex_1' =>'nestedValue_1',
 *         'nestedIndex_2' =>'nestedValue_2',
 *         'nestedIndex_3' => NULL
 *     ],
 *     'index_3' =>  NULL
 * ]
 */

$configuration->readOrDefault( 'defaultValue', 'index_1' );
/**
 * 'value_1'
 */

$configuration->readOrDefault( 'defaultValue', 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */

$configuration->readOrDefault( 'defaultValue', 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */

$configuration->readOrDefault( 'defaultValue', 'index_2', 'nestedIndex_4' );
/**
 * 'defaultValue'
 */
```

## [`PlainConfigurationLoader`][srclink-PlainConfigurationLoader]

A plain configuration reader manages to load any PHP file returning nested plain configuration data (multidimensional array).

### Constructor

**Definition**

`PlainConfigurationLoader::__construct()`

**Examples**

```php
$plainConfigurationLoader = new PlainConfigurationLoader();
```

### Loading plain configuration data

#### [`PlainConfigurationLoader::load()`][srclink-PlainConfigurationLoader-load]

Loads a plain configuration file.

**Definition**

`PlainConfigurationLoader::load( string $directoryPath, string $configurationName )`

* `$directoryPath` - the path of the plain configuration file
* `$configurationName` - the name of the plain configuration file

**Exceptions**

* [`PlainConfigurationNotFoundException`][srclink-PlainConfigurationNotFoundException] - the plain configuration file does not exist
* [`InvalidPlainConfigurationException`][srclink-InvalidPlainConfigurationException] - the plain configuration file does not return plain configuration data

**Examples**

Assume you have a plain configuration file in `/path/to/plainConfiguration.php`.

```php
return [
    'index_1' => 'value_1',
    'index_2' => [
        'nestedIndex_1' =>'nestedValue_1',
        'nestedIndex_2' =>'nestedValue_2',
        'nestedIndex_3' => NULL
    ],
    'index_3' =>  NULL
];
```

Load that plain configuration file.

```php
$plainConfiguration = $plainConfigurationLoader
    ->load( '/path/to', 'plainConfiguration' )
    ->getPlainConfiguration();
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' => [
 *         'nestedIndex_1' =>'nestedValue_1',
 *         'nestedIndex_2' =>'nestedValue_2',
 *         'nestedIndex_3' => NULL
 *     ],
 *     'index_3' =>  NULL
 * ]
 */
```

Assume you have another plain configuration file in `/path/to/anotherPlainConfiguration.php`.

```php
return [
    'index_1' => 'value_1',
    'index_2' =>
        [
            'nestedIndex_1' => 'nestedValue_2',
            'nestedIndex_2' => 'nestedValue_1',
            'nestedIndex_3' => null,
        ],
    'index_3' =>
        [
            'nestedIndex_1' => 'nestedValue_1',
            'nestedIndex_2' => 'nestedValue_2',
            'nestedIndex_3' => null,
        ],
    'index_4' => null,
];
```

If you load that plain configuration file with the same plain configuration loader the plain configuration data will be merged.

```php
$plainConfigurationLoader->load( '/path/to', 'anotherPlainConfiguration' );
$plainConfiguration = $plainConfigurationLoader->getPlainConfiguration();
/**
 * [
 *     'index_1' => 'value_1',
 *     'index_2' =>
 *         [
 *             'nestedIndex_1' => 'nestedValue_2',
 *             'nestedIndex_2' => 'nestedValue_1',
 *             'nestedIndex_3' => null,
 *         ],
 *     'index_3' =>
 *         [
 *             'nestedIndex_1' => 'nestedValue_1',
 *             'nestedIndex_2' => 'nestedValue_2',
 *             'nestedIndex_3' => null,
 *         ],
 *     'index_4' => null,
 * ];
 */
```

## [`AbstractConfigurationRegistry`][srclink-AbstractConfigurationRegistry]

The configuration registry is a singleton based class intended to manage multiple configurations. It is also designed to get inherited by multiple configuration registries. So an application is able to provide different configuration regitries on purpose.

### [Constructor][srclink-AbstractConfigurationRegistry-construct]

**Definition**

`AbstractConfigurationRegistry::__construct()`

**Notes**

The constructor is protected, hence it must not be called from a public context.

### [`AbstractConfigurationRegistry::__clone()`][srclink-AbstractConfigurationRegistry-clone]

**Definition**

`AbstractConfigurationRegistry::__clone()`

**Exceptions**

* [`CloningConfigurationRegistryIsProhibitedException`][srclink-CloningConfigurationRegistryIsProhibitedException] - cloning of the configuration registry is prohibited

### [`AbstractConfigurationRegistry::_()`][srclink-AbstractConfigurationRegistry-_]

Returns the singleton instance of the configuration registry.

**Definition**

`AbstractConfigurationRegistry::_()`

**Examples**

```php
class ConfigurationRegistry extends AbstractConfigurationRegistry
{
}

$configurationRegistry_1 = ConfigurationRegistry::_();
$configurationRegistry_2 = ConfigurationRegistry::_();

$areIdentical = $configurationRegistry_1 === $configurationRegistry_2;
/**
 * true
 */
```

### [`AbstractConfigurationRegistry::initialize()`][srclink-AbstractConfigurationRegistry-initialize]

Initializes the configuration registry.

**Definition**

`AbstractConfigurationRegistry::initialize()`

**Notes**

The method is abstract, hence it must be implemented.

**Examples**

```php
class ConfigurationRegistry extends AbstractConfigurationRegistry
{
    public readonly ConfigurationInterface $configurationA;

    public readonly ConfigurationInterface $configurationB;

    #[Override]
    public function initialize(): void
    {
        $this->configurationA = new Configuration(
            ( new PlainConfigurationLoader() )
                ->load( '/path/to/', 'plainConfiguration' )
                ->getPlainConfiguration()
        );
        $this->configurationB = new Configuration(
            ( new PlainConfigurationLoader() )
                ->load( '/path/to/', 'anotherPlainConfiguration' )
                ->getPlainConfiguration()
        );
    }
}
```



[srclink-Configuration]: ../src/Configuration.php
[srclink-Configuration-construct]: ../src/Configuration.php#L19
[srclink-Configuration-read]: ../src/Configuration.php#L27
[srclink-Configuration-readOrNull]: ../src/Configuration.php#L48
[srclink-Configuration-readOrDefault]: ../src/Configuration.php#L64
[srclink-PlainConfigurationLoader]: ../src/PlainConfigurationLoader.php
[srclink-PlainConfigurationLoader-load]: ../src/PlainConfigurationLoader.php#L35
[srclink-AbstractConfigurationRegistry]: ../src/AbstractConfigurationRegistry.php
[srclink-AbstractConfigurationRegistry-construct]: ../src/AbstractConfigurationRegistry.php#L22
[srclink-AbstractConfigurationRegistry-clone]: ../src/AbstractConfigurationRegistry.php#L31
[srclink-AbstractConfigurationRegistry-_]: ../src/AbstractConfigurationRegistry.php#L40
[srclink-AbstractConfigurationRegistry-initialize]: ../src/AbstractConfigurationRegistry.php#L52
[srclink-CloningConfigurationRegistryIsProhibitedException]: ../src/CloningConfigurationRegistryIsProhibitedException.php
[srclink-InvalidPlainConfigurationException]: ../src/InvalidPlainConfigurationException.php
[srclink-PlainConfigurationIndexNotFoundException]: ../src/PlainConfigurationIndexNotFoundException.php
[srclink-PlainConfigurationNotFoundException]: ../src/PlainConfigurationNotFoundException.php
