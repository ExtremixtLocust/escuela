<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = Yii::t('app', 'Update Materia: {name}', [
    'name' => $model->mat_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mat_id, 'url' => ['view', 'mat_id' => $model->mat_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
