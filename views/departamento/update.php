<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

/*$this->title = Yii::t('app', 'Update Departamento: {name}', [
    'name' => $model->dep_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->dep_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dep_nombre, 'url' => ['view', 'dep_id' => $model->dep_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="departamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
