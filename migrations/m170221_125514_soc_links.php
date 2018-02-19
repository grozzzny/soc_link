<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170221_125514_soc_links extends Migration
{
    public $engine = 'ENGINE=MyISAM DEFAULT CHARSET=utf8';

    public function up()
    {

        $this->createTable('soc_link', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING,
            'link' => Schema::TYPE_STRING,
            'icon' => Schema::TYPE_STRING,
        ], $this->engine);

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
