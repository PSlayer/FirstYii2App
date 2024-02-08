<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \frontend\models\device\DeviceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'storrage')->dropDownList(\yii\helpers\ArrayHelper::map(
            \frontend\models\store\Store::find()->all(), 'id', 'name'))
     ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
