<?php

use frontend\models\store\Store;
use kartik\datetime\DateTimePicker;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \frontend\models\store\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    Modal::begin(['id'=>'modal']);
    Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            //'name',
            ['class' => 'yii\grid\DataColumn',
               'attribute'=>'name',
                'format'   => 'raw',
                'value'=> function ($data) {
                   return Html::a($data->name, ['view', 'id'=>$data->id ],
                   [
                       'title' => $data->name,
                       'data' => [
                           'target' => '#devices-info',
                           'toggle' => 'modal',
                           'backdrop' => 'static',
                       ]
                   ]);
                 /*return Html::a(Yii::t('app', '{modelClass}',[
                         'modelClass'=>$data->name,]),['/device?DeviceSearch[storrage]', 'id' =>$data->id ],
                     ['id'=>'popupModal']

                 );*/
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
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
<div class="modal fade" id="devices-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<?php
$this ->registerJs("
$('.grid-view tbody tr').on('click',function(){
var data = $(this).data();
$('#devices-info').modal('show');
$('#devices-info').find('.modal-title').text('id store:' + data.key);
$('#devices-info').find('.modal-body').load('/device/devicein?&DeviceSearch[storrage]=' + data.key);
});
");
?>