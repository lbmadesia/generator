# Generator
A Laravel Module Generator Package for Laravel AdminPanel &lt; https://github.com/lbmadesia/laravel-adminpanel &gt;

# License
This Module Generator is open-sourced software licensed under the MIT license

# Official Documentation
To get started with Generator, use Composer to add the package to your project's dependencies:

`composer require lbmadesia/generator`

Since you would be having work of this generator, while creating your project, hence only require it in the dev environment.

### Configuration

After installing the Generator, register the `Lbmadesia\Generator\Provider\CrudGeneratorServiceProvider` in your `config/app.php` configuration file:

```php
'providers' => [
    // Other service providers...

    Lbmadesia\Generator\Provider\CrudGeneratorServiceProvider::class
],
```

If you need to change what the stubs are generating for you, you can always publish the package's views files by below command:
```
php artisan vendor:publish --tag=generator
```

and you can get the title "Module Management" from package's translation file by using:

```
{{ trans('generator::menus.modules.management') }}
```

Link Api management with route 

```
{{ route('admin.modules.index') }}
```


# Contribute
You can contribute to this project, by just taking fork of it. We are open for suggestion and PRs. If you have any new suggestions or anything for that matter, contact me at lbmadesia@gmail.com


