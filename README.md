<p align="center"><a href="" target="_blank"><img src="https://user-images.githubusercontent.com/94616880/143237092-17915166-5c4a-48f0-9873-76fca1db373c.png" width="400"></a></p>

<p align="center">
<!-- <a href=""><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> -->
<a href="https://packagist.org/packages/tkusa/lawn"><img src="https://packagist.org/packages/tkusa/lawn" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/tkusa/lawn"><img src="https://packagist.org/packages/tkusa/lawn" alt="License"></a>
</p>

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
``` php artisan vendor:publish --tag="lawn-config"```   
Now you have "lawn.php" at config dir.  
Define entities here.  

3. Run build command   
``` php artisan lawn:build ```  

4. Publish generated files   
``` php artisan vendor:publish --tag="lawn-build"```  
You can find generated files in your project.  



## License

Lawn is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## TODO
- Improve Tests
- Make validation for config
- Check views
- Improve designs
- Register routes
- Relationship

