nikolag/core
=========
Core package for building additional payment gateway integrations with `nikolag` packages and `Laravel >=5.5`

## Installation guide
`composer require nikolag/core`

---

## Usage
This package contains all of the necessary code to get you started with building the additional integrations of payment gateways
with `nikolag` packages. First of all there are couple of important layers and structure that you must follow:

1. [Configuration file](#1-configuration-file) 
2. [Main service](#2-main-service) 
3. [Dependency Injections](#3-dependency-injections) 
4. [Migrations and Factories](#4-migrations-and-factories) 
5. [Facades](#5-facades) 
6. [Models](#6-models) 
7. [Providers](#7-providers) 
8. [Traits](#8-traits) 
9. [Tests](#9-tests) 
10. [Utility classes](#10-utility-classes) 

### 1. Configuration file
Configuration file is the most important here since it'll contain all of the required pre-set options of your library.
The file must be called **nikolag.php** and it must be inside of **src/config** folder.

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Nikolag Configuration
    |--------------------------------------------------------------------------
    |
    | This represents the default connection name that will be used when
    | u have multiple available connections. For all available connections
    | take a look a the code documentation of 'connections' just below.
    |
    */
    'default' => '{$default}',

    /*
    |--------------------------------------------------------------------------
    | Nikolag Connections
    |--------------------------------------------------------------------------
    |
    | Here you will find all available connections you have in your project.
    | For all available connections you can take a look at the link below.
    |
    | https://github.com/NikolaGavric94/nikolag-core/blob/master/DRIVERS.md
    |
    */
    'connections' => [
      /*
      |--------------------------------------------------------------------------
      | {$default} Configuration
      |--------------------------------------------------------------------------
      |
      | The {$default} configuration determines the default application_id
      | and {$default} token when doing any of the calls to {$default}. These values will
      | be used when there is no merchant provided as a seller. You have to change
      | these values.
      |
      */
      '{$default}' => [
        'namespace' => '{$namespace}',
        'application_id' => env('{$default}_APPLICATION_ID'),
        'access_token' => env('{$default}_TOKEN'),
        'sandbox' => env('{$default}_SANDBOX', false),

        /*
        |--------------------------------------------------------------------------
        | {$default} Merchant Configuration
        |--------------------------------------------------------------------------
        |
        | The {$default} merchant configuration determines the default namespace for
        | merchant model and it's identifier which will be used in various
        | relationships when retrieving models. You are encouraged to change these
        | values to better reflect your application.
        |
        */
        'user' => [
          'namespace' => env('{$default}_USER_NAMESPACE', '\App\User'),
          'identifier' => env('{$default}_USER_IDENTIFIER', 'id')
        ],

        /*
        |--------------------------------------------------------------------------
        | {$default} Order Configuration
        |--------------------------------------------------------------------------
        |
        | The {$default} order configuration determines the default namespace for
        | order model and it's identifier which CAN be used when charging a customer.
        | You can relate that model to a certain transaction. You are encouraged to
        | change these values to better reflect your application.
        |
        */
        'order' => [
          'namespace' => env('{$default}_ORDER_NAMESPACE', '\App\Order'),
          'identifier' => env('{$default}_ORDER_IDENTIFIER', 'id'),
          'service_identifier' => env('SQUARE_PAYMENT_IDENTIFIER', 'payment_service_id')
        ]
      ],
    ]
];
```
This is just a starter snippet which u can start adapting to your own library. There are couple of important `variables` that u gotta change and rules which you must follow.
Change `{$default}` with the name of your package (paypal, payeer, payoneer, ...) and also include the fully qualified name (namespace) of your service instead of `{$namespace}`. You can check [nikolag.php](https://github.com/NikolaGavric94/laravel-square/blob/master/src/config/nikolag.php) example of how config file should look like. 
[SquareConfig.php](https://github.com/NikolaGavric94/laravel-square/blob/master/src/SquareConfig.php) is the example of how your configuration class should look like.

### 2. Main service
Your package must have at least 1 main service which is responsible for all communication between rest calls and your package. 
It also must extend **Nikolag\Core\Abstracts\CorePaymentService** and it must implement **Nikolag\Core\Contracts\PaymentServiceContract** thats explained in the next step. 
Example of that kind of class can be found [SquareService.php](https://github.com/NikolaGavric94/laravel-square/blob/master/src/SquareService.php).

### 3. Dependency Injections
Your library must have at least 1 contract which should be named `{$serviceName}ServiceContract.php` where `{$serviceName}` is the name of service you are trying to integrate with nikolag packages and Laravel
Also it must extends **Nikolag\Core\Contracts\PaymentServiceContract**. 
**Any other contract which is not connected with your service file in any way mustn't extend the above contract**. Some examples of such name are `PaypalServiceContract.php`, `PayeerServiceContract.php`, `PayoneerServiceContract.php`. 
Example of the contract can be found [SquareContract.php](https://github.com/NikolaGavric94/laravel-square/blob/master/src/contracts/SquareContract.php).

### 4. Migrations and Factories
All migrations and factories must be under `src/database` folder and each of them respectively will have it's own subfolder `src/database/factories` and `src/database/migrations`. 
This core package already has couple of migrations so you don't have to write them yourself, but you can extend on them if necessary.

### 5. Facades
All facades are found under `src/facades` and your package must have at least 1 facade which must be alias for your main service class. 
```php
//Facades
$this->app->alias(SquareService::class, 'square');
```

### 6. Models
All models must be located under `src/models`. There are 2 core models: **Customer** and **Transaction**. 

You must extend those 2 core models and create your own from them with all relationships available and also add
```php
/**
 * The model's attributes.
 *
 * @var array
 */
protected $attributes = [
  //where `{$serviceName}` is the name of service you are trying to integrate with nikolag packages and Laravel
  //example: 'paypal', 'payoneer', 'payeer'
  'payment_service_type' => {$serviceName}
];
```
The above is only required for 2 base models, any other models u might make don't have to extend anything and you can create them normally. 
Example can be found [Customer.php](https://github.com/NikolaGavric94/laravel-square/blob/master/src/models/Customer.php).

### 7. Providers
You can register multiple providers and they should be named respectively for their role in the library. You can find them under src/providers folder. Here are some examples:
**ExceptionServiceProvider, MyServiceProvider, ExternalLibrariesProvider, etc..**

### 8. Traits
All traits must be under `src/traits`.

### 9. Tests
All your tests must be under `tests` and they are split into 2 types: `integration` and `unit` where each of them has it's own subfolder. 
```php
src/
tests/
  integration/
  unit/
```

### 10. Utility classes
All your utility classes must be under `src/utils` folder.

## All available core methods

### CoreService
```php
/**
 * Returns instance of the specified service
 *
 * @param string $driver
 * @return Nikolag\Core\Contracts\PaymentServiceContract
 */
public function use(string $driver) {}

/**
 * Returns instance of the default service
 *
 * @return Nikolag\Core\Contracts\PaymentServiceContract
 */
public function default() {}

/**
 * Returns all available drivers
 * which u have installed.
 *
 * @return array
 */
public function availableDrivers() {}
```

**CoreService examples**

Get access to the specific underyling driver for any installed payment API
```php
$squareAPI = Nikolag\Core\Facades\CoreService::use('square');
$squareAPI->setCustomer($customer)->charge($options);

//or

$myServiceAPI = Nikolag\Core\Facades\CoreService::use('my-service');
$myServiceAPI->setCustomer($customer)->charge($options);
```

You can also charge the customer with your default driver
```php
$api = Nikolag\Core\Facades\CoreService::default();

$api->setCustomer($customer)->charge($options);
```

You can also list all available drivers
```php
$drivers = Nikolag\Core\Facades\CoreService::availableDrivers();

echo json_decode(json_encode($drivers));
//or Laravel specific helper method
dd($drivers);

//or plain php
var_dump($drivers);
die();
```

## More examples
For a complete example of how to build upon this core package you can take a look at [nikolag-core-starter](https://github.com/NikolaGavric94/nikolag-core-impl)

## Contributing
Everyone is welcome to contribute to this repository, simply open up an issue
and label the request, whether it is an issue, bug or a feature. For any other
enquiries send an email to nikola.gavric94@gmail.com

### Contributors
| Name                                         | Changes                                                                                              | Date       |
| ---------------------------------------------|:----------------------------------------------------------------------------------------------------:|:----------:|
| [@viangela84](https://github.com/viangela84) | Updated order_product table [pull request #3](https://github.com/NikolaGavric94/nikolag-core/pull/3) | 2017-02-07 |

## License
MIT License

Copyright (c) Nikola Gavrić <nikola.gavric94@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
