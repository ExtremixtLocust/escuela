<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */

/*$this->title = Yii::t('app', 'Update Trabajador: {name}', [
    'name' => $model->tra_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->pro_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_nombre, 'url' => ['view', 'pro_id' => $model->pro_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="proveedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
