<?php

use yii\db\Migration;

/**
 * Class m240125_113211_device_table
 */
class m240125_113211_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {

            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'serial_number' => $this->integer()->unique()->notNull(),
            'storrage' => $this-> integer(),
            'created_at' => $this->date(),
        ], $tableOptions);



    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {

        $this->dropTable('device');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240125_113211_device_table cannot be reverted.\n";

        return false;
    }
    */
}
