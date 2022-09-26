<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrativo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adm_departamento_id')->textInput() ?>

    <?= $form->field($model, 'adm_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_appaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_apmaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
