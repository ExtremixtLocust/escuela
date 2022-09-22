<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reticula */

$this->title = Yii::t('app', 'Update Reticula: {name}', [
    'name' => $model->ret_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reticulas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ret_id, 'url' => ['view', 'ret_id' => $model->ret_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reticula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
