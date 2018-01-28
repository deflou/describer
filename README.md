# describer
Service describer for DeFlou.

# install

## via composer

```
composer require deflou\service-describer "1.0"
```

# using

```
use deflou\components\services\ServiceDescriberAbstract;

class DescriberMyService extends ServiceDescriberAbstract
{
}
```

You can reset base config path if you need it:

```
use deflou\components\services\ServiceDescriberAbstract;

class DescriberMyService extends ServiceDescriberAbstract
{
    protected $basePath = __DIR__ . '/own/path/to/df/';
}
```
