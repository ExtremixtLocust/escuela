<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajador */

/*$this->title = Yii::t('app', 'Update Trabajador: {name}', [
    'name' => $model->tra_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->tra_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trabajadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tra_nombre, 'url' => ['view', 'tra_id' => $model->tra_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="trabajador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
