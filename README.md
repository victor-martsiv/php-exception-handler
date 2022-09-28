# php-exception-handler

### Simple Php exception handler

```php
$eHandler = new \KnightWithKnife\Exceptions\Handler();
$eHandler->register();
$eHandler->setHandler(new class {
     public function __invoke(\Exception $exception){
     // TODO: Implement __invoke() method.
    }
});
$eHandler->setHandler(function (\Exception $exception) {
    // TODO: Implement body function.
});

throw new Exception('Some Exception message');

////

$eHandler = new \KnightWithKnife\Exceptions\Handler();
$eHandler->register();
$eHandler->restoreHandler();


////
$eHandler = new \KnightWithKnife\Exceptions\Handler();
$eHandler->register();
$eHandler->setIgnored(\You\Custom\IgnoredExceprion::class);
```