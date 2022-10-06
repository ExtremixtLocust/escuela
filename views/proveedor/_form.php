<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_fechaAsoc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_telefono')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
