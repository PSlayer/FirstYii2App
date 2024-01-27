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
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'serial_number' => $this->integer()->unique(),
            'storrage' => $this-> integer(),
            'created_at' => $this->date(),
        ], $tableOptions);
        $this->createIndex('device_created_at', 'device', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('device_created_at', 'device');
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
