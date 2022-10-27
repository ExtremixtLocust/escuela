<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
//se importan las librerías para usar arrays
use yii\helpers\ArrayHelper;
use app\models\Reticula;
use kartik\icons\Icon;
use kartik\typeahead\TypeaheadBasic;
use kartik\file\FileInput;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */

$reticulas = ArrayHelper::map(Reticula::find()->all(), 'ret_id', 'ret_carrera');
//variables para texto
$seleccionar = Yii::t('app', 'Seleccionar').':';
$escribirApPaterno = Yii::t('app' , 'Escriba su apellido paterno').'...';
$escribirApMaterno = Yii::t('app' , 'Escriba su apellido materno').'...';

$apellidosM = [
    'García', 'Salvador', 'Hernández', 'Valencia', 'Jiménez', 'Gutiérrez', 'Magaña', 'Pérez', 'López', 'Gómez', 'Valencia', 'Velázquez',
    'Gordillo', 'Gallardo', 'Arias', 'Alcudia', 'Baeza', 'Lara', 'Cabrera', 'Cabrales', 'Soberano', 'Jesús', 'Peralta', 'Morales', 'Villanueva',
    'Felix', 'Aquino', 'Ruiz', 'Collado', 'Flores', 'Estrada', 'Sánchez', 'Ramírez', 'Aguilar', 'Salazar', 'Cruz', 'De la Cruz', 'González', 'Díaz',
    'Rodriguez', 'Sosa', 'Fernández', 'Martínez', 'Lázaro', 'Mendoza', 'Muñoz', 'Romero', 'Ramoz', 'Benítez'
];

$apellidosP = [
    'García', 'Salvador', 'Hernández', 'Valencia', 'Jiménez', 'Gutiérrez', 'Magaña', 'Pérez', 'López', 'Gómez', 'Valencia', 'Velázquez',
    'Gordillo', 'Gallardo', 'Arias', 'Alcudia', 'Baeza', 'Lara', 'Cabrera', 'Cabrales', 'Soberano', 'Jesús', 'Peralta', 'Morales', 'Villanueva',
    'Felix', 'Aquino', 'Ruiz', 'Collado', 'Flores', 'Estrada', 'Sánchez', 'Ramírez', 'Aguilar', 'Salazar', 'Cruz', 'De la Cruz', 'González', 'Díaz',
    'Rodriguez', 'Sosa', 'Fernández', 'Martínez', 'Lázaro', 'Mendoza', 'Muñoz', 'Romero', 'Ramoz', 'Benítez'
];
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_appaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosP,
        'options' => ['placeholder' => $escribirApPaterno],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'alu_apmaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosM,
        'options' => ['placeholder' => $escribirApMaterno],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'alu_reticula_id')->dropDownList($reticulas, ['prompt' => $seleccionar]) ?>

    <?= $form->field($model, 'alu_nocontrol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alu_semestre')->textInput() ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'file/*'],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
