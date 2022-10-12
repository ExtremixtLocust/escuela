<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

/*$this->title = Yii::t('app', 'Update Inventario: {name}', [
    'name' => $model->inv_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->inv_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inv_nombre, 'url' => ['view', 'inv_id' => $model->inv_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="inventario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
