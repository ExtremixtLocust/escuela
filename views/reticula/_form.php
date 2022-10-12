<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reticula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reticula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ret_carrera')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
