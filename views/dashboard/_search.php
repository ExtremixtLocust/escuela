<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DashboardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'dash_id') ?>

    <?= $form->field($model, 'dash_titulo') ?>

    <?= $form->field($model, 'dash_img') ?>

    <?= $form->field($model, 'dash_descripcion') ?>

    <?= $form->field($model, 'dash_url') ?>

    <?php // echo $form->field($model, 'dash_estatus') ?>

    <?php // echo $form->field($model, 'dash_roles') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
