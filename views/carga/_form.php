<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_reticula_id')->textInput() ?>

    <?= $form->field($model, 'car_materia_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
