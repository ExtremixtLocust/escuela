<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
//se importan las librerías para usar arrays
use yii\helpers\ArrayHelper;
use app\models\Reticula;
use kartik\icons\Icon;
use kartik\typeahead\TypeaheadBasic;
use kartik\file\FileInput;
use webvimark\modules\UserManagement\models\User;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */

$isUpdate = !$model->isNewRecord;
if ($isUpdate) {
    $model->contrasenia1 = '******';
    $model->contrasenia2 = '******';
    $model->correo = $model->email;
}
$seleccionarUsuario = $kfuser != null ? ArrayHelper::map(User::find()->where(['id' => $kfuser])->all(), 'id', 'username') : ArrayHelper::map(User::find()->all(), 'id', 'username');
$reticulas = ArrayHelper::map(Reticula::find()->all(), 'ret_id', 'ret_carrera');
//variables para texto
$seleccionar = Yii::t('app', 'Seleccionar') . ':';
$escribirApPaterno = Yii::t('app', 'Escriba su apellido paterno') . '...';
$escribirApMaterno = Yii::t('app', 'Escriba su apellido materno') . '...';
//imagen
$img = $model->archivo_imagen ? $model->archivo_imagen : '';

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
    <br>
    <div class="row">
        <div class="col-md-8 h-100%">
            <div class="row">
                <div class="col"><?= $form->field($model, 'alu_nombre')->textInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'alu_appaterno')->widget(TypeaheadBasic::classname(), [
                                        'data' => $apellidosP,
                                        'options' => ['placeholder' => $escribirApPaterno],
                                        'pluginOptions' => ['highlight' => true],
                                    ]) ?></div>
                <div class="col"><?= $form->field($model, 'alu_apmaterno')->widget(TypeaheadBasic::classname(), [
                                        'data' => $apellidosM,
                                        'options' => ['placeholder' => $escribirApMaterno],
                                        'pluginOptions' => ['highlight' => true],
                                    ]) ?></div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'alu_reticula_id')->dropDownList($reticulas, ['prompt' => $seleccionar]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'alu_nocontrol')->textInput(['maxlength' => true, 'readonly' => $isUpdate,]) ?>
                </div>
                <div class="col"><?= $form->field($model, 'alu_semestre')->textInput() ?></div>
            </div>

            <div class="row">
                <div class="col"><?= $form->field($model, 'contrasenia1')->passwordInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'contrasenia2')->passwordInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col"><?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?></div>
            </div>
        </div> <!-- fin de col-8 form -->
        <div class="col col-md-4">

            <?= //codigo para la foto del alumno
            $form->field($model, 'archivo_imagen')->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['png'],
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview' => $img,
                    'initialPreviewAsData' => true,
                    'initialCaption' => Yii::t('app', 'Imagen del alumno: ' . $model->archivo_imagen),
                    'overwriteInitial' => false,
                ],
            ]); ?>

        </div> <!-- Cierre de la foto -->
    </div> <!-- Cierre de fila maestra -->


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>