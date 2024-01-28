<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $serial_number
 * @property int|null $storrage
 * @property string|null $created_at
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['serial_number'], 'required'],
            [['serial_number', 'storrage'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['serial_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'serial_number' => 'Serial Number',
            'storrage' => 'Storrage',
            'created_at' => 'Created At',
        ];
    }
}
