# Documentation

## Index

* [`Configuration`](#configuration)
  * [`Configuration::__construct()`](#configuration__construct)
    * [Defintion](#definition)
    * [Examples](#examples)
  * [`Configuration::read()`](#configurationread)
    * [Defintion](#definition-1)
    * [Exceptions](#exceptions)
    * [Examples](#examples-1)
  * [`Configuration::readOrNull()`](#configurationreadornull)
    * [Defintion](#definition-2)
    * [Examples](#examples-2)
  * [`Configuration::readOrDefault()`](#configurationreadordefault)
    * [Defintion](#definition-3)
    * [Examples](#examples-3)
* [`PlainConfigurationLoader`](#plainconfigurationloader)
  * [`PlainConfigurationLoader::__construct()`](#plainconfigurationloader__construct)
    * [Defintion](#definition-4)
    * [Examples](#examples-4)
  * [`PlainConfigurationLoader::load()`](#plainconfigurationloaderload)
    * [Defintion](#definition-5)
    * [Exceptions](#exceptions-1)
    * [Examples](#examples-5)
* [`AbstractConfigurationRegistry`](#abstractconfigurationregistry)
  * [`AbstractConfigurationRegistry::__construct()`](#abstractconfigurationregistry__construct)
    * [Defintion](#definition-6)
    * [Examples](#examples-6)
  * [`AbstractConfigurationRegistry::__clone()`](#abstractconfigurationregistry__clone)
    * [Defintion](#definition-7)
    * [Exceptions](#exceptions-2)
    * [Examples](#examples-7)
  * [`AbstractConfigurationRegistry::_()`](#abstractconfigurationregistry_)
    * [Defintion](#definition-8)
    * [Examples](#examples-8)

## [`Configuration`][srclink-Configuration]

Represents a configuration.

A configuration manages reading of nested plain configuration data (multidimensional associative arrays).

### [`Configuration::__construct()`][srclink-Configuration-__construct]

Constructor method.

#### Definition

```php
Configuration::__construct( array $plainConfiguration )
```

* `$plainConfiguration` - The plain configuration data.

#### Examples

##### #1

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

### [`Configuration::read()`][srclink-Configuration-read]

Reads a value from the plain configuration.

#### Definition

```php
Configuration::read( string[] ...$indices ): mixed
```

* `$indices` - The nested indices of the value to read.

#### Exceptions

* [`UnknownPlainConfigurationIndexException`][srclink-UnknownPlainConfigurationIndexException] - The index does not exist in the plain configuration.

#### Examples

##### #1

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
```

##### #2

```php
$configuration->read( 'index_1' );
/**
 * 'value_1'
 */
```

##### #3

```php
$configuration->read( 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */
```

##### #4

```php
$configuration->read( 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */
```

##### #5

```php
$configuration->read( 'index_2', 'nestedIndex_4' );
/**
 * @throws PlainConfigurationIndexNotFoundException
 */
```

### [`Configuration::readOrNull()`][srclink-Configuration-readOrNull]

Reads a value from the plain configuration or null.

This method behaves nearly identical as [`Configuration::read()`](#configurationread). The only exception is if any of the indices does not exist `null` will be returned.

#### Definition

```php
Configuration::readOrNull( string[] ...$indices ): mixed
```

* `$indices` - The nested indices of the value to read.

#### Examples

##### #1

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
```

##### #2

```php
$configuration->readOrNull( 'index_1' );
/**
 * 'value_1'
 */
```

##### #3

```php
$configuration->readOrNull( 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */
```

##### #4

```php
$configuration->readOrNull( 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */
```

##### #5

```php
$configuration->readOrNull( 'index_2', 'nestedIndex_4' );
/**
 * null
 */
```

### [`Configuration::readOrDefault()`][srclink-Configuration-readOrDefault]

Reads a value from the plain configuration or a default value.

This method behaves nearly identical as [`Configuration::read()`](#configurationread). The only exception is if any of the indices does not exist the default value will be returned.

#### Definition

```php
Configuration::readOrDefault( mixed $defaultValue, string[] ...$indices ): mixed
```

* `$defaultValue` - The default value to return if the value does not exist.
* `$indices` - The nested indices of the value to read.

#### Examples

##### #1

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
```

##### #2

```php
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
```

##### #3

```php
$configuration->readOrDefault( 'defaultValue', 'index_1' );
/**
 * 'value_1'
 */
```

##### #4

```php
$configuration->readOrDefault( 'defaultValue', 'index_2' );
/**
 * [
 *     'nestedIndex_1' =>'nestedValue_1',
 *     'nestedIndex_2' =>'nestedValue_2',
 *     'nestedIndex_3' => NULL
 * ]
 */
```

##### #5

```php
$configuration->readOrDefault( 'defaultValue', 'index_2', 'nestedIndex_1' );
/**
 * 'nestedValue_1'
 */
```

##### #6

```php
$configuration->readOrDefault( 'defaultValue', 'index_2', 'nestedIndex_4' );
/**
 * 'defaultValue'
 */
```

## [`PlainConfigurationLoader`][srclink-PlainConfigurationLoader]

Represents the interface of any plain configuration loader.

### [`PlainConfigurationLoader::getPlainconfiguration()`][srclink-PlainConfigurationLoader-getPlainConfiguration]

Gets the merged plain configuration.

#### Definition

`PlainConfigurationLoader::getPlainConfiguration(): array`

### [`PlainConfigurationLoader::load()`][srclink-PlainConfigurationLoader-load]

Loads the plain configuration. If a plain configuration has already been loaded the new plain configuration will be merged recusively.

#### Definition

`PlainConfigurationLoader::load( string $directoryPath, string $configurationName ): static`

* `$directoryPath` - the path of the plain configuration file
* `$configurationName` - the name of the plain configuration file

#### Exceptions

* [`PlainConfigurationNotFoundException`][srclink-PlainConfigurationNotFoundException] - the plain configuration file does not exist
* [`InvalidPlainConfigurationException`][srclink-InvalidPlainConfigurationException] - the plain configuration file does not return plain configuration data

#### Examples

##### #1

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

Load the plain configuration.

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

##### #2

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

If you load that plain configuration with the same plain configuration loader the plain configuration data will be merged.

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

### [`AbstractConfigurationRegistry::__construct()`][srclink-AbstractConfigurationRegistry-__construct]

Constructor method.

The constructor is protected, hence it must not be called from a public context.

#### Definition

`AbstractConfigurationRegistry::__construct()`

### [`AbstractConfigurationRegistry::__clone()`][srclink-AbstractConfigurationRegistry-clone]

Clones the configuration registry.

#### Definition

`AbstractConfigurationRegistry::__clone(): void`

#### Exceptions

* [`CloningConfigurationRegistryUnsupportedException`][srclink-CloningConfigurationRegistryUnsupportedException] - cloning of the configuration registry is prohibited

### [`AbstractConfigurationRegistry::_()`][srclink-AbstractConfigurationRegistry-_]

Static constructor method.

Returns the singleton instance of the configuration registry.

#### Definition

`static AbstractConfigurationRegistry::_(): static`

#### Examples

##### #1

```php
class ConfigurationRegistry extends AbstractConfigurationRegistry
{
    #[Override]
    public function initialize(): void
    {
    }
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

This method is abstract, hence it must be implemented.

#### Definition

`AbstractConfigurationRegistry::initialize(): void`

#### Examples

##### #1

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
[srclink-Configuration-__construct]: ../src/Configuration.php#L19
[srclink-Configuration-read]: ../src/Configuration.php#L27
[srclink-Configuration-readOrNull]: ../src/Configuration.php#L48
[srclink-Configuration-readOrDefault]: ../src/Configuration.php#L64
[srclink-PlainConfigurationLoader]: ../src/PlainConfigurationLoader.php
[srclink-PlainConfigurationLoader-getPlainConfiguration]: ../src/PlainConfigurationLoader.php#L26
[srclink-PlainConfigurationLoader-load]: ../src/PlainConfigurationLoader.php#L35
[srclink-AbstractConfigurationRegistry]: ../src/AbstractConfigurationRegistry.php
[srclink-AbstractConfigurationRegistry-__construct]: ../src/AbstractConfigurationRegistry.php#L22
[srclink-AbstractConfigurationRegistry-clone]: ../src/AbstractConfigurationRegistry.php#L31
[srclink-AbstractConfigurationRegistry-_]: ../src/AbstractConfigurationRegistry.php#L40
[srclink-AbstractConfigurationRegistry-initialize]: ../src/AbstractConfigurationRegistry.php#L52
[srclink-CloningConfigurationRegistryUnsupportedException]: ../src/CloningConfigurationRegistryUnsupportedException.php
[srclink-InvalidPlainConfigurationException]: ../src/InvalidPlainConfigurationException.php
[srclink-PlainConfigurationNotFoundException]: ../src/PlainConfigurationNotFoundException.php
[srclink-UnknownPlainConfigurationIndexException]: ../src/UnknownPlainConfigurationIndexException.php
