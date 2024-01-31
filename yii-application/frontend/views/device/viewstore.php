<?php

use frontend\models\Device;
use frontend\models\Store;
use kartik\datetime\DateTimePicker;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var frontend\models\DeviceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<?php

if (Yii::$app->user->isGuest) {

    ?>
    <div class="site-index">
        <div class="p-5 mb-4 bg-transparent rounded-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-4">Please LOGIN!</h1>
                <p class="fs-5 fw-light">If you wanna use this system, you need to logIn in this site </p>
                <p><a class="btn btn-lg btn-success" href="/site/login">Log In</a></p>
            </div>
        </div>

        <div class="body-content">

        </div>
    </div>
    <?php
}
else{
    ?>
    <div class="device-index">

        <h1>Devices on selected store</h1>


        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model->serial_number), ['/device', 'DeviceSearch[serial_number]' => $model->serial_number]);
            },
        ]) ?>


    </div>
    <?php

}
?>