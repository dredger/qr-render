Skeleton 
========================================

This is a test library.

Installation via composer
-------------

1. [Add current repository to composer.json](https://getcomposer.org/doc/05-repositories.md#vcs)
2. Require library: `composer require "dredger/skeleton1"`

or `php701  composer.phar require  dredger/skeleton1`

Usage
-------

Open [functional test](tests/Functional/HelloTest.php) for example of usage

Recommendation
-------------
If you can use Dependency Container  just use it. For example for symfony2
```yaml
# app/config/services.yml
services:
    guzzle_client:
        class:        
    ciklum.qr.google_renderer:
        class:        
        arguments:    
    ciklum.qr.generator:
        class:        
        arguments:    
```

And you will be able to use it:  
```php
class HelloController extends Controller
{
    // ...

    public function hello()
    {
       
    }
}
```

For TAZ server usage  
===================
  
  to call  php 7.1 use `php701 test.php` 
  
  to call composer `php701  composer.phar install`
  
  to call unit tests            `php701  ./vendor/bin/phpunit run   tests/Unit/HelloTest.php -vvv`
  
  to call unit functional tests `php701  ./vendor/bin/phpunit run   tests/Functional/HelloTest.php -vvv`
  
  `php701  ./vendor/bin/phpunit run   tests/Functional/RendererTest.php -vvv`
  
  
 

 
 
For code reviewers
===================
It isn't completed library. 


