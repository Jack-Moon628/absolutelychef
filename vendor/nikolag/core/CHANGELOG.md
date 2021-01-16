# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2017-10-05
### Added
- Support for main service
- Support for custom exceptions
- Support for both DI and Facade approach
- Core models and migrations
- Core configuration
- Ability to switch drivers on the fly

## [1.0.1] - 2017-10-06
### Added
- Added more examples for core service usage

### Changed
- Code cleanup
- Updated README.md with [all available core methods](https://github.com/NikolaGavric94/nikolag-core#all-available-core-methods)

### Fixed
- Issue with wrong root class of previous Exception inside of Nikolag\Core\Exception constructor
- Issue with incorrect constants
- Issue with using incorrect namespace for Constants inside of migrations file

## [1.0.2] - 2017-10-16
### Fixed
- Issue with migration file `nikolag_customers`, type string can't be unsigned, typo

## [2.0.0] - 2018-04-07
### Added
- Support for order system
- Support for products system
- Support for tax system
- Support for discounts system

### Changed
- Updated README.md with [service_payment_id](https://github.com/NikolaGavric94/nikolag-core#1-configuration-file) property in config file.

## [2.1.0] - 2018-06-17
### Changed
- Transactions table now includes 2 additional fields: `currency, payment_service_id`
- Code cleanup
- Updated `DRIVERS.md, README.md, composer.json`

## [2.1.1] - 2019-02-26
### Fixed
- Rewrite column indices to be < 797 bytes to conform with older MySQL/MariaDB drivers

## [2.2.0] - 2019-09-24
### Added
- Support for Laravel 5.8 & Laravel 6.x
### Changed
- Updated code docs for PaymentServiceContract

## [2.3.0] - 2019-10-14
### Changed
- Change method name from transactions to payments

[Unreleased]: https://github.com/NikolaGavric94/nikolag-core/compare/v2.1.0...HEAD
[1.1.0]: https://github.com/NikolaGavric94/nikolag-core/compare/v1.0.2...v1.1.0
[1.0.2]: https://github.com/NikolaGavric94/nikolag-core/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/NikolaGavric94/nikolag-core/compare/v1.0.0...v1.0.1
[2.0.0]: https://github.com/NikolaGavric94/nikolag-core/compare/v1.0.1...v2.0.0
[2.1.0]: https://github.com/NikolaGavric94/nikolag-core/compare/v2.0.0...v2.1.0
[2.1.1]: https://github.com/NikolaGavric94/nikolag-core/compare/v2.1.0...v2.1.1
[2.2.0]: https://github.com/NikolaGavric94/nikolag-core/compare/v2.1.1...v2.2.0
[2.3.0]: https://github.com/NikolaGavric94/nikolag-core/compare/v2.2.0...v2.3.0
