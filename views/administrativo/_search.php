<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdministrativoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrativo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'adm_id') ?>

    <?= $form->field($model, 'adm_departamento_id') ?>

    <?= $form->field($model, 'adm_nombre') ?>

    <?= $form->field($model, 'adm_appaterno') ?>

    <?= $form->field($model, 'adm_apmaterno') ?>

    <?php // echo $form->field($model, 'adm_telefono') ?>

    <?php // echo $form->field($model, 'adm_direccion') ?>

    <?php // echo $form->field($model, 'adm_rfc') ?>

    <?php // echo $form->field($model, 'adm_correo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
