Qr Code Generator
========================================

Created for playing.


Installation via composer
-------------

1. [Add current repository to composer.json](https://getcomposer.org/doc/05-repositories.md#vcs)
2. Require library: `composer require "dredger/qr-render"`


Usage
-------

Open [functional test](tests/Functional/RendererTest.php) for example of usage

Recommendation
-------------
If you can use Dependency Container  just use it. For example for symfony2
```yaml
# app/config/services.yml
services:
    guzzle_client: 
        class:        GuzzleHttp\Client
    dredger.qrcode.renderer.google_renderer:
        class:        DredgerQr\QrCode\Renderer\GoogleChartsRenderer
        arguments:     [@guzzle_client]
    dredger.qrcode.generator:
        class:        DredgerQr\QrCode\QrCodeGenerator
        arguments:    [@dredger.qrcode.renderer.google_renderer]
```

And you will be able to use it:  
```php

use DredgerQr\QrCode\Renderer\GoogleChartsRenderer;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
  
  $renderer = new GoogleChartsRenderer($c);
  $renderer->render('TrekkSoft', 50, 60);  // text, width, height
```
 


