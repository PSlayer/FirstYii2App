<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \frontend\models\Device\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serial_number')->textInput() ?>

    <?= $form->field($model, 'storrage')->widget(Select2::classname(), [

        'data' => ArrayHelper::map($model->getStoreNames(),'id','name'),
        'options' => ['placeholder' => 'Select store ...'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ]);?>
    <?php //$form->field($model, 'storrage')->textInput() ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ])->hiddenInput()->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
