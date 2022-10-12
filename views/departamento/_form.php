<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proveedor;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */
/* @var $form yii\widgets\ActiveForm */

//se crean varaibles que almacenen el texto que se traducirá
$seleccionar = Yii::t('app', 'Seleccionar').':';

//variable que trae los proveedores
$proveedor = ArrayHelper::map(Proveedor::find()->all(), 'pro_id', 'pro_nombre');

?>

<div class="departamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dep_proveedor_id')->dropDownList($proveedor, ['prompt' => Yii::t('app', $seleccionar)]) ?>

    <?= $form->field($model, 'dep_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
