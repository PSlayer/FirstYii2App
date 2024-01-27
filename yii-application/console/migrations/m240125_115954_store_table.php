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
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created_at' => $this->date(),
        ], $tableOptions);
        $this->createIndex('store_created_at', 'store', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('store_created_at', 'store');
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
