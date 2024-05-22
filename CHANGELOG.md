# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog 1.1.0][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [1.0.0] - 2024-07-14

### Fixed

* type hints
* renamed arguments
* class determination
* made configuration default value `null`
* made abstract configuration nonabstract
* configuration registry instantiation
* PHPDoc

### Changed

* composer package
  * changed
    * description
    * keywords
    * require
      * `php` [>=8.3]
    * require-dev
      * `codekandis/phpunit` [^5.0.0]
  * added
    * version
    * require-dev
      * `rector/rector` [^1.0.5]
    * autoload-dev
      * psr-4
        * `CodeKandis\Configurations\Build\`
          * `build/`
* exception handling
* PHPUnit
  * configuration
* `CODE_OF_CONDUCT.md`
* `README.md`
  * PHP version `8.3`

### Added

* imports
* type hints
* `Override` attributes
* constructor properties
* plain configuration validity check
* rector
  * configuration script
  * shell script
* PHPUnit
  * tests
* documentation
* `.gitattributes` to ignore dev-assets

[1.0.0]: https://github.com/codekandis/configurations/compare/0.6.1...1.0.0

---
## [0.6.1] - 2023-12-10

### Fixed

* removed `final` keyword on private methods

[0.6.1]: https://github.com/codekandis/configurations/compare/0.6.0...0.6.1

---
## [0.6.0] - 2022-07-19

### Added

* reading nested configuration indices

[0.6.0]: https://github.com/codekandis/configurations/compare/0.5.0...0.6.0

---
## [0.5.0] - 2022-05-21

### Added

* method `AbstractConfiguration::readOrNull()`

[0.5.0]: https://github.com/codekandis/configurations/compare/0.4.2...0.5.0

---
## [0.4.2] - 2022-01-03

### Fixed

* merging of multiple plain configurations

[0.4.2]: https://github.com/codekandis/configurations/compare/0.4.1...0.4.2

---
## [0.4.1] - 2021-11-23

### Fixed

* singleton instance creation of inherited configuration registries

[0.4.1]: https://github.com/codekandis/configurations/compare/0.4.0...0.4.1

---
## [0.4.0] - 2021-11-05

### Changed

* introdcued mergability in the plain configuration loader

[0.4.0]: https://github.com/codekandis/configurations/compare/0.3.0...0.4.0

---
## [0.3.0] - 2021-10-18

### Added

* plain configuration loader

[0.3.0]: https://github.com/codekandis/configurations/compare/0.2.0...0.3.0

---
## [0.2.0] - 2021-10-18

### Added

* plain configuration reading with an exception by method

[0.2.0]: https://github.com/codekandis/configurations/compare/0.1.0...0.2.0

---
## [0.1.0] - 2021-07-12

### Added

* configuration interface and base class
* configuration registry interface and base class
* `CODE_OF_CONDUCT.md`
* `LICENSE`
* `composer.json`
* `REAMDE.md`
* `CHANGELOG.md`

[0.1.0]: https://github.com/codekandis/configurations/tree/0.1.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.1.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
