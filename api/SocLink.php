<?php
namespace app\modules\soc_link\api;

use yii\easyii\components\API;
use yii\easyii\helpers\Data;
use app\modules\soc_link\models\SocLink as SocLinkModel;

class SocLink extends API
{
    public static function allLink()
    {
        $items = SocLinkModel::find()->all();
        $html = '';
        foreach ($items as $item) {
            $html .= '<a href="'.$item->link.'" title="'.$item->name.'"><i class="'.$item->icon.'" aria-hidden="true"></i></a>';
        }
        return $html;
    }

}