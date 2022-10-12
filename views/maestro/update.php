<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maestro */

/*$this->title = Yii::t('app', 'Update Maestro: {name}', [
    'name' => $model->mae_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->mae_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maestros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mae_nombre, 'url' => ['view', 'mae_id' => $model->mae_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="maestro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
