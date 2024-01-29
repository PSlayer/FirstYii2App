<?php

use yii\db\Migration;

/**
 * Class m240129_115810_fk_device
 */
class m240129_115810_fk_device extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_device',
            'device',
            'storrage',
            'store',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_device',
            'device'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240129_115810_fk_device cannot be reverted.\n";

        return false;
    }
    */
}
