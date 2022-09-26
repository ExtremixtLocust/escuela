<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */

$this->title = Yii::t('app', 'Update Administrativo: {name}', [
    'name' => $model->adm_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administrativos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->adm_id, 'url' => ['view', 'adm_id' => $model->adm_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="administrativo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
