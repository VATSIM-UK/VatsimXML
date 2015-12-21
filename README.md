VatsimXMLFeeds
=========

The Vatsim Xmlfeeds package is a useful laravel 5 package for accessing data publically presented via VATSIMs XML feeds.

Version
----

2.0

Installation
--------------

Use [Composer](http://getcomposer.org) to install the VatsimXML and dependencies.

```sh
$ composer require vatsim/xml 2.*
```

### Laravel
#### Set up
Using VatsimXML in Laravel is made easy through the use of Service Providers. Add the service provider to your `config/app.php` file:
```php
'providers' => array(
    // ...
    'Vatsim\Xml\XmlServiceProvider',
),
```

Followed by the alias:
```php
'aliases' => array(
    // ...
    'VatsimXML'       => 'Vatsim\Xml\Facades\Xml',
),
```

#### Configuration file
You should not need to modify the default configuration file supplied by the package.


## Usage
### Getting data

This lightweight package only has one main function: getData

If you don't specify a URL to use, you will be given basic user details.
```php
VatsimXML::getData(980234)
```

Other possible data requests are as follows.

```php
VatsimXML::getData(980234, "idstatusint") // Receive basic data, but with numeric ratings rather than verbose.
VatsimXML::getData(980234, "idstatusprat") // Receive the previous rating, for ADM, SUP or INS accounts.
VatsimXML::getData(980234, "idstatusrat") // Get the number of hours controlled at each rating level.
```
