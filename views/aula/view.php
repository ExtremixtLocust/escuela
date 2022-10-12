<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = $model->aul_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aulas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'aul_id' => $model->aul_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'aul_id' => $model->aul_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aul_id',
            'aul_numero',
        ],
    ]) ?>

</div>
