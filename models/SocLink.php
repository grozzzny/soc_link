<?php
namespace grozzzny\soc_link\models;

use yii\easyii2\behaviors\CacheFlush;

/**
 * Class SocLink
 * @package grozzzny\soc_link\models
 *
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $link [varchar(255)]
 * @property string $icon [varchar(255)]
 */
class SocLink extends \yii\easyii2\components\ActiveRecord
{
    const CACHE_KEY = 'soc_link';

    public static function tableName()
    {
        return 'soc_link';
    }

    public function rules()
    {
        return [
            ['id', 'number', 'integerOnly' => true],
            [['name', 'link', 'icon'], 'required'],
            [['name', 'link', 'icon'], 'trim']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app/soclink', 'Name'),
            'link' => Yii::t('app/soclink', 'Link'),
            'icon' => Yii::t('app/soclink', 'Icon'),
        ];
    }

    public function behaviors()
    {
        return [
            CacheFlush::className()
        ];
    }
}