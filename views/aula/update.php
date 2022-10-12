<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = Yii::t('app', 'Update Aula: {name}', [
    'name' => $model->aul_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aulas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aul_id, 'url' => ['view', 'aul_id' => $model->aul_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
