<?php

use frontend\models\Device\Device;
use frontend\models\Store\Store;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \frontend\models\Device\DeviceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'serial_number',
            //'storrage',
            //'storeName',
            [
                'attribute'=>'storrage',

                'filter' => Select2::widget([
                        'model'=>$searchModel,
                        'attribute' => 'storrage',
                        'name' => 'storrage',
                        'data' => ArrayHelper::map(Store::find()->all(),'id','name'),
                        'options' => ['placeholder' => 'Select store',],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],

                ]),
                'value' => function ($data) {
                    return empty($data->storeName) ? null: $data->storeName;
                },

                ],
            ['attribute'=>'created_at',  'filter'=> DateTimePicker::widget([
                'model'=>$searchModel,
                'attribute'=>'created_at',
                'layout' => '{picker}  {input}',
                'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd hh:ii:ss'
                ]
            ])],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>