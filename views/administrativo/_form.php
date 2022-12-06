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

//se crean varaibles que almacenen el texto que se traducirá
$seleccionar = Yii::t('app', 'Seleccionar') . ':';
$seleccionarApellidoPaterno = Yii::t('app', 'Escriba su apellido paterno') . '...';
$seleccionarApellidoMaterno = Yii::t('app', 'Escriba su apellido materno') . '...';

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
    <!--contenedor del form-->
    <div class="row">
        <div class="col-7 m-5">
            <!--Elementos del form-->
            <div class="row">
                <div class="col"><?= $form->field($model, 'adm_departamento_id')->dropDownList(Departamento::map(), ['prompt' => Yii::t('app', $seleccionar)]) ?></div>
                <div class="col"><?= $form->field($model, 'adm_nombre')->textInput(['maxlength' => true]) ?></div>
                <div class="col">
                    <?= $form->field($model, 'adm_appaterno')->widget(TypeaheadBasic::classname(), [
                        'data' => $apellidosM,
                        'options' => ['placeholder' => $seleccionarApellidoPaterno],
                        'pluginOptions' => ['highlight' => true],
                    ]) ?>
                </div>
            </div>

            <!--Elementos del form-->
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'adm_apmaterno')->widget(TypeaheadBasic::classname(), [
                        'data' => $apellidosM,
                        'options' => ['placeholder' => $seleccionarApellidoMaterno],
                        'pluginOptions' => ['highlight' => true],
                    ]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'adm_apmaterno')->widget(TypeaheadBasic::classname(), [
                        'data' => $apellidosM,
                        'options' => ['placeholder' => $seleccionarApellidoMaterno],
                        'pluginOptions' => ['highlight' => true],
                    ]) ?>
                </div>
                <div class="col"><?= $form->field($model, 'adm_telefono')->textInput(['maxlength' => true]) ?></div>
            </div>

            <!--Elementos del form-->
            <div class="row">
                <div class="col"><?= $form->field($model, 'adm_direccion')->textInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'adm_rfc')->textInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'adm_correo')->textInput(['maxlength' => true]) ?></div>
            </div>
        </div>

        <!--Columna para la foro-->
        <div class="col">

        </div>
    </div> <!-- Cierre de fila contenedora -->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>