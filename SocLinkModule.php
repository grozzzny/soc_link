<?php
namespace grozzzny\soc_link;

use yii\easyii2\models\ModuleEasyii2Interface;

class SocLinkModule extends \yii\easyii2\components\Module implements ModuleEasyii2Interface
{
    public $settings = [
        'modelSocLink' => '\grozzzny\soc_link\models\SocLink',
    ];

    public static $installConfig = [
        'title' => [
            'en' => 'Text blocks',
            'ru' => 'Ссылки соц. сетей',
        ],
        'icon' => 'font',
        'order_num' => 20,
    ];
}