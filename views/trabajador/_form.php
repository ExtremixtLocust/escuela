<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tra_departamento_id')->textInput() ?>

    <?= $form->field($model, 'tra_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_appaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_apmaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
