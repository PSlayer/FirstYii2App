<?php

use yii\db\Migration;

/**
 * Class m240125_115954_store_table
 */
class m240125_115954_store_table extends Migration
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
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique(),
            'created_at' => $this->timestamp(),
        ], $tableOptions);

        $this->createIndex('store_id', 'store', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex('store_id', 'store');


        $this->dropTable('store');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240125_115954_store_table cannot be reverted.\n";

        return false;
    }
    */
}
