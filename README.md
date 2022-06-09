# Unofficial Mutasi.co.id API

[![Latest Stable Version](http://poser.pugx.org/nurfaizfy/mutasi-php-library/v)](https://packagist.org/packages/nurfaizfy/mutasi-php-library)
[![Total Downloads](http://poser.pugx.org/nurfaizfy/mutasi-php-library/downloads)](https://packagist.org/packages/nurfaizfy/mutasi-php-library)
[![License](http://poser.pugx.org/nurfaizfy/mutasi-php-library/license)](https://packagist.org/packages/nurfaizfy/mutasi-php-library)

This library is unofficial, already compatible with Composer, for more details please visit [Documentation](https://documenter.getpostman.com/view/3279923/TWDTNKcR).

IMPORTANT: Make sure you read the documentation and understand what these methods are used for!

## Instalation
```
composer require nurfaizfy/mutasi-php-library
```

## Configuration

you must define or import library
```php
use Mutasi\Main;
```

after that configure token obtained from [Dashboard](https://app.mutasi.co.id/home/api_token)
```php
$main = new Main(
    'your-token',
);
```

## Contents available
content method available so far

| Method  | Contents  | Status |
|---|---|---|
| `initUserInfo()` | `User Info` | OK |
| `initAccountList()` | `Account List` | OK |
| `initAccountDetail` | `Account Detail` | OK |
| `initTransaction()` | `Transactions` | OK |
| `initSearchAmount()` | `Search Amount` | OK |
| `initCallback()` | `Callback` | OK |

## Request available

request can return the available content, the list of available methods is as follows

| Method  | Description  |
|---|---|
| `getRequest(string $url)`  | return return guzzle http client |
| `getResponse()`  | return response |
| `getJson()`  | return json decode  |
| `getStatus()`  | return boolean  |
| `getData()`  | return data response  |

## User Info

This API is used to get user info

```php
$main->initUserInfo()
```

the next method can be seen in the [request method](#request-available)

## Account List

This API is used to retrieve all bank account list

```php
$init = $main->initAccountList($code)
```

the next method can be seen in the [request method](#request-available)

## Account Detail

This API is used to retrieve detail bank account

```php 
$data = ['account_id'=>id] // id retrieved from Account List or can be seen in dashboard
$init = $main->initAccountDetail();
$init->setForm($data);
```

the next method can be seen in the [request method](#request-available)

## Transactions
This API is used to obtain detailed transaction based on a specified date

```php
$data = [
    'account_id'    =>  id, // Optional
    'from'          =>  date,
    'to'            =>  date,
]
$init = $main->initTransaction();
$init->setForm($data);
```

the next method can be seen in the [request method](#request-available)

## Search Amount
This API is used to Get a list of transactions by amount

```php
$data = [
    'account_id'    =>  id, // Optional
    'from'          =>  date,
    'to'            =>  date,
    'nominal'       =>  amount,
    'type'          =>  type, // Optional (C = Credit, D = Debet)
]
$init = $main->initSearchAmount();
$init->setForm($data);
);
```

the next method can be seen in the [request method](#request-available)

## Callback

Callback is a method of sending transaction notifications from the Mutasi server to the user's server. When the payment from the customer is completed, the TriPay system will provide a notification containing transaction data which can then be further managed by the user's system.

please define the method below before starting

```php
$init = $main->initCallback(); // return callback
```

### Receive JSON

to get the json that was sent by tripay you can use the method below

```php 
$init->get(); // get all callback
```

### Decode JSON

rather than wasting time on json_decode, this package provides that

```php 
$init->getJson(); // get json callback
```

## Contribute
If you want to contribute this SDK, you can fork, edit and create pull request. And we will review your request and if we finish to review your request. We will merge your request to developemnt branch. Thanks
