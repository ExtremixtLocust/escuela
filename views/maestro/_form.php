<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Maestro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maestro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mae_departamento_id')->textInput() ?>

    <?= $form->field($model, 'mae_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_appaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_apmaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
