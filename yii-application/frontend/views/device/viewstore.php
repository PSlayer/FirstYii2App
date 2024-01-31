<?php

use frontend\models\Device;
use frontend\models\Store;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var frontend\models\DeviceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Devices on Store';
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Devices on Store' ;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php


    ?>

</div>
