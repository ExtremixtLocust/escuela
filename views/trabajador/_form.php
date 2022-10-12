<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

//librerías para el array de departamentos
use yii\helpers\ArrayHelper;
use app\models\Departamento;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajador */
/* @var $form yii\widgets\ActiveForm */

//se crean varaibles que almacenen el texto que se traducirá
$seleccionar = Yii::t('app', 'Seleccionar').':';
$seleccionarApellidoPaterno = Yii::t('app', 'Escriba su apellido paterno').'...';
$seleccionarApellidoMaterno = Yii::t('app', 'Escriba su apellido materno').'...';

//variable que trae los departamentos
$departamentos = ArrayHelper::map(Departamento::find()->all(), 'dep_id', 'dep_nombre');

?>

<div class="trabajador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tra_departamento_id')->dropDownList($departamentos, ['prompt' => $seleccionar]) ?>

    <?= $form->field($model, 'tra_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_appaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_apmaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tra_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
