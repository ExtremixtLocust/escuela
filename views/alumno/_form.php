<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_appaterno')->textInput() ?>

    <?= $form->field($model, 'alu_apmaterno')->textInput() ?>

    <?= $form->field($model, 'alu_reticula_id')->textInput() ?>

    <?= $form->field($model, 'alu_nocontrol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_semestre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
