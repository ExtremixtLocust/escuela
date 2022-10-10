<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\icons\Icon;
use kartik\typeahead\TypeaheadBasic;

//librerías para el array de departamentos
use yii\helpers\ArrayHelper;
use app\models\Departamento;

//use kartik\typeahead\Typeahead;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */
/* @var $form yii\widgets\ActiveForm */

$departamentos = ArrayHelper::map(Departamento::find()->all(), 'dep_id', 'dep_nombre');

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

<div class="maestro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mae_departamento_id')->dropDownList($departamentos, ['prompt' => 'Seleccionar:']) ?>

    <?= $form->field($model, 'mae_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_appaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosP,
        'options' => ['placeholder' => 'Escriba su apellido paterno...'],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'mae_apmaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosM,
        'options' => ['placeholder' => 'Escriba su apellido materno...'],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'mae_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mae_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
