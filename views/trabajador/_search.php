<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrabajadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'tra_id') ?>

    <?= $form->field($model, 'tra_departamento_id') ?>

    <?= $form->field($model, 'tra_nombre') ?>

    <?= $form->field($model, 'tra_appaterno') ?>

    <?= $form->field($model, 'tra_apmaterno') ?>

    <?php // echo $form->field($model, 'tra_rfc') ?>

    <?php // echo $form->field($model, 'tra_direccion') ?>

    <?php // echo $form->field($model, 'tra_telefono') ?>

    <?php // echo $form->field($model, 'tra_correo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
