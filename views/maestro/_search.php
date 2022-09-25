<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaestroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maestro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'mae_id') ?>

    <?= $form->field($model, 'mae_departamento_id') ?>

    <?= $form->field($model, 'mae_nombre') ?>

    <?= $form->field($model, 'mae_appaterno') ?>

    <?= $form->field($model, 'mae_apmaterno') ?>

    <?php // echo $form->field($model, 'mae_rfc') ?>

    <?php // echo $form->field($model, 'mae_telefono') ?>

    <?php // echo $form->field($model, 'mae_direccion') ?>

    <?php // echo $form->field($model, 'mae_correo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
