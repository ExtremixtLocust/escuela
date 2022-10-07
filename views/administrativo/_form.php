<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\icons\Icon;
use kartik\typeahead\TypeaheadBasic;
use app\models\Departamento;
//use kartik\typeahead\Typeahead;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */
/* @var $form yii\widgets\ActiveForm */
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

<div class="administrativo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adm_departamento_id')->dropDownList(Departamento::map(), ['prompt' => Yii::t('app', 'Seleccione el Departamento')]) ?>

    <?= $form->field($model, 'adm_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_appaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosM,
        'options' => ['placeholder' => 'Escriba su apellido paterno...'],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'adm_apmaterno')->widget(TypeaheadBasic::classname(), [
        'data' => $apellidosM,
        'options' => ['placeholder' => 'Escriba su apellido materno...'],
        'pluginOptions' => ['highlight'=>true],
    ]) ?>

    <?= $form->field($model, 'adm_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
