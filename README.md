<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

## Lawn is a Ground Cover

Lawn is a laravel package which supports your CRUD application developement.  
You can generate base classes by defining entities in config file:

### Generatable classes
- Controllers
- Models
- Migrations
- Factories
- Seeders
- Routes
- Views
- Tests

## How to Use

1. Require this package in your project

2. Edit config file
``` php artisan vendor:publish ```
Choose "lawn-config".  
Now you have "lawn.php" at config dir.  
Define entities here.  

3. Run build command
``` php artisan lawn:build ```  

4. Publish generated files
``` php artisan vendor:publish ```  
Choose "lawn-build".  
You can find generated files in your project.  

## License

Lawn is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
