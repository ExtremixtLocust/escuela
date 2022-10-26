<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */

$this->title = Yii::t('app', 'Update Dashboard: {name}', [
    'name' => $model->dash_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dash_id, 'url' => ['view', 'dash_id' => $model->dash_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dashboard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
