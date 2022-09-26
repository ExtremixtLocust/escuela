<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
//se importan las librerías para usar arrays
use yii\helpers\ArrayHelper;
use app\models\Reticula;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */

$reticulas = ArrayHelper::map(Reticula::find()->all(), 'ret_id', 'ret_carrera');

?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_appaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_apmaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_reticula_id')->dropDownList($reticulas, ['prompt' => 'Seleccionar:']) ?>

    <?= $form->field($model, 'alu_nocontrol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_semestre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
