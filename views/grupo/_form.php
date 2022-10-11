<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Materia;
use app\models\Maestro;
use app\models\Aula;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */
/* @var $form yii\widgets\ActiveForm */

$materia = ArrayHelper::map(Materia::find()->all(), 'mat_id', 'mat_nombre');
$maestro = ArrayHelper::map(Maestro::find()->all(), 'mae_id', 'mae_nombre');
$aula = ArrayHelper::map(Aula::find()->all(), 'aul_id', 'aul_numero');
$seleccionar = Yii::t('app', 'Seleccionar').':';

?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gru_materia_id')->dropDownList($materia, ['prompt' => $seleccionar]) ?>

    <?= $form->field($model, 'gru_maestro_id')->dropDownList($maestro, ['prompt' => $seleccionar]) ?>

    <?= $form->field($model, 'gru_aula_id')->dropDownList($aula, ['prompt' => $seleccionar]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
