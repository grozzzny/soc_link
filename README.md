Links social networks for EasyiiCMS
==============================

This module allows to [Easy yii2 cms](http://github.com/noumo/easyii) 

## Installation guide

Please, install [User module for EasyiiCMS by following these instructions](https://github.com/grozzzny/soc_link) before going further

```bash
$ php composer.phar require grozzzny/soc_link "dev-master"
$ composer require grozzzny/soc_link "dev-master"
```

v2.0 for easyii2
```bash
$ php composer.phar require grozzzny/soc_link "v2.x-dev"
$ composer require grozzzny/soc_link "v2.x-dev"
```

Run migrations
```bash
php yii migrate --migrationPath=@vendor/grozzzny/soc_link/migrations
```

```php
<? foreach (\grozzzny\soc_link\models\SocLink::find()->all() as $item):?>
    <li>
        <a href="<?=$item->link?>" title="<?=$item->name?>">
            <i class="<?=$item->icon?>"></i>
        </a>
    </li>
<? endforeach;?>
```
