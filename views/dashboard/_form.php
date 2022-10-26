<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dash_id')->textInput() ?>

    <?= $form->field($model, 'dash_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dash_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dash_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dash_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dash_estatus')->textInput() ?>

    <?= $form->field($model, 'dash_roles')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
