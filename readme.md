# Tjoosten\Laravel-countries 

This package contains some country dataset. 

## Requirements 

- PHP >= 5.6.0
- Laravel Application. 


## Installation 

Require the package with composer. 

```bash 
composer require tjoosten/countries
```

After updating composer, add the ServiceProvider to the providers array in `conifg/app.php`

### Laravel 5.x

```php 
Tjoosten\Countries\ServiceProvider::class
```

After that u need to register the seeder. 

```php
$this->call(Tjoosten\Countries\Database\Seeds\CountryNameSeeder::class); 
```

## Security vurnabilities 

If you discover any security related issues, please mail Topairy@gmail.com instead of using the issue tracker. 

## Copyright and licensing 

The repo is under the MIT License (MIT). Please see [License File](LICENSE) for more information. 

## Veersioning 

For transparency into our release cycle and in striving to maintain backward compatibility, scouts en gidsen template is maintained under the [Semantic Versioning guidelines](http://semver.org/). Sometimes we screw up, but we'll adhere to those rules whenever possible.

See the [Releases section](https://github.com/tjoosten/countries-package/releases) of our GitHub project for changelogs for each release version of this repo.