<?php

use yii\db\mysql\Schema;

use grozzzny\soc_link\migrations\Migration;

class m170221_125514_soc_links extends Migration
{
    public function up()
    {
        
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
        $this->delete('easyii_modules',['name' => 'soclink']);

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
