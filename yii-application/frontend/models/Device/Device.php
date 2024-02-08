<?php

namespace frontend\models\Device;

use frontend\models\Store\Store;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $serial_number
 * @property int|null $storrage
 * @property string $created_at
 *
 * @property Store $storrage0
 */
class Device extends ActiveRecord
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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['serial_number'], 'required'],
            [['serial_number', 'storrage'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['serial_number'], 'unique'],
            [['storrage'], 'exist', 'skipOnError' => true, 'targetClass' => Store::class, 'targetAttribute' => ['storrage' => 'id']],
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
            'storeName' => 'Store Name',
        ];
    }

    /**
     * Gets query for [[Storrage0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoreNames()
    {
       return Store::find()->all();
    }
    public function getStorrage0()
    {
        return $this->hasOne(Store::className(), ['id' => 'storrage']);
    }
    public function getStoreName()
    {
        return $this->storrage0 ? $this->storrage0->name:'';
    }
}
