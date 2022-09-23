<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlumnoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'alu_id') ?>

    <?= $form->field($model, 'alu_nombre') ?>

    <?= $form->field($model, 'alu_appaterno') ?>

    <?= $form->field($model, 'alu_apmaterno') ?>

    <?= $form->field($model, 'alu_reticula_id') ?>

    <?php // echo $form->field($model, 'alu_nocontrol') ?>

    <?php // echo $form->field($model, 'alu_semestre') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
