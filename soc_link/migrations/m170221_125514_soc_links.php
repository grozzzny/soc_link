<?php

use yii\db\mysql\Schema;

/**
 * Class m170221_125514_soc_links
 * php composer.phar require grozzzny/soc_link "dev-master"
 * composer require grozzzny/soc_link "dev-master"
 * php yii migrate --migrationPath=@vendor/grozzzny/soc_link/migrations
 */
class m170221_125514_soc_links extends \soc_link\migrations\Migration
{
    public function up()
    {
        //Главная таблица - чемпионаты
        $this->createTable('soc_link', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'link' => Schema::TYPE_STRING,
            'icon' => Schema::TYPE_STRING,
        ], $this->tableOptions);


        $this->insert('easyii_modules', [
            'name' => 'soclink',
            'class' => 'grozzzny\soc_link\SocLinkModule',
            'title' => 'Links social networks',
            'icon' => 'glyphicon-asterisk',
            'status' => 1,
            'settings' => '[]',
            'notice' => 0,
            'order_num' => 120
        ]);
    }

    public function down()
    {
        $this->dropTable('soc_link');

        echo "m170221_125514_soc_links cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
