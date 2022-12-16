<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use kartik\file\FileInput;
use app\models\Departamento;

//librerías para el array de departamentos
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use webvimark\modules\UserManagement\models\User;

//use kartik\typeahead\Typeahead;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */
/* @var $form yii\widgets\ActiveForm */

//se revisa si es update
$isUpdate = !$model->isNewRecord;
if ($isUpdate) {
    $model->contrasenia1 = '******';
    $model->contrasenia2 = '******';
    //$model->correo = $model->mae_correo;
}
//se establece el usuario
//$seleccionarUsuario = $fkUser != null ? ArrayHelper::map(User::find()->where(['id' => $fkUser])->all(), 'id', 'username') : ArrayHelper::map(User::find()->all(), 'id', 'username');
//imagen
$img = $model->archivo_imagen ? $model->archivo_imagen : '';

//se crean varaibles que almacenen el texto que se traducirá
$seleccionar = Yii::t('app', 'Seleccionar') . ':';
$seleccionarApellidoPaterno = Yii::t('app', 'Escriba su apellido paterno') . '...';
$seleccionarApellidoMaterno = Yii::t('app', 'Escriba su apellido materno') . '...';

//variable que trae los departamentos
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
    <!--Contenedor del form-->
    <div class="row">
        <!--Columna-->
        <div class="col-7 m-5">
            <!--Elementos del form-->
            <div class="row">

                <div class="col">
                    <?= $form->field($model, 'mae_departamento_id')->dropDownList($departamentos, ['prompt' => $seleccionar]) ?>
                </div>
                <div class="col"><?= $form->field($model, 'mae_nombre')->textInput(['maxlength' => true]) ?></div>

            </div>

            <!--elementos del form-->
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'mae_appaterno')->widget(TypeaheadBasic::classname(), [
                        'data' => $apellidosP,
                        'options' => ['placeholder' => $seleccionarApellidoPaterno],
                        'pluginOptions' => ['highlight' => true],
                    ]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'mae_apmaterno')->widget(TypeaheadBasic::classname(), [
                        'data' => $apellidosM,
                        'options' => ['placeholder' => $seleccionarApellidoMaterno],
                        'pluginOptions' => ['highlight' => true],
                    ]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'mae_rfc')->textInput(['maxlength' => true, 'readonly' => $isUpdate,]) ?>
                </div>
            </div>

            <!--Elementos form-->
            <div class="row">
                <div class="col"><?= $form->field($model, 'mae_telefono')->textInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'mae_direccion')->textInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'mae_correo')->textInput(['maxlength' => true]) ?></div>
            </div>

            <!-- Contraseñas-->
            <div class="row">
                <div class="col"><?= $form->field($model, 'contrasenia1')->passwordInput(['maxlength' => true]) ?></div>
                <div class="col"><?= $form->field($model, 'contrasenia2')->passwordInput(['maxlength' => true]) ?></div>
            </div>
        </div>

        <!--Columna para la foto-->
        <div class="col">
            <?= //codigo para la foto del alumno
            $form->field($model, 'archivo_imagen')->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['png'],
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview' => $img,
                    'initialPreviewAsData' => true,
                    'initialCaption' => Yii::t('app', 'Imagen del maestro: ' . $model->archivo_imagen),
                    'overwriteInitial' => false,
                ],
            ]); ?>
        </div><!-- Cierre de la foto -->
    </div><!-- Cierre de fila maestra -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>