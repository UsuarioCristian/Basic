<?php

use yii\db\Schema;
use yii\db\Migration;

class m151124_003938_create_all_tables extends Migration
{
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'code' => $this->string(2)->notNull(),
            'name' => $this->string(20)->notNull(),
            'population' => $this->integer(11),
        ]);

        $this->createTable('city', [
            'id' => $this->primaryKey(),            
            'name' => $this->string(20)->notNull(),
            'population' => $this->integer(11),
            'country_id' => $this->integer(),
        ]);

        $this->createIndex('inx-country-id','country','id');

        $this->addForeignKey('fk-country-country_id', 'city', 'country_id', 'country', 'id', 'CASCADE');

    }

    public function down()
    {
        echo "m151124_003938_create_all_tables cannot be reverted.\n";

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
