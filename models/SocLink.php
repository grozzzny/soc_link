<?php
namespace grozzzny\soc_link\models;

use yii\easyii2\behaviors\CacheFlush;

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
            'name' => 'Наименование',
            'link' => 'Ссылка',
            'icon' => 'Иконка',
        ];
    }

    public function behaviors()
    {
        return [
            CacheFlush::className()
        ];
    }
}