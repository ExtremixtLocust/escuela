<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = Yii::t('app', 'Update Curso: {name}', [
    'name' => $model->cur_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cur_id, 'url' => ['view', 'cur_id' => $model->cur_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
