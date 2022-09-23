<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = Yii::t('app', 'Update Alumno: {name}', [
    'name' => $model->alu_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alu_id, 'url' => ['view', 'alu_id' => $model->alu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alumno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
