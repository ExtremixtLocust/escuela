<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

/*$this->title = Yii::t('app', 'Update Trabajador: {name}', [
    'name' => $model->tra_id,
]);*/
//cambiamos el código para concatenar texto y variable nombre
$this->title = Yii::t('app', 'Actualizar información de:').' '.$model->mat_nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mat_nombre, 'url' => ['view', 'mat_id' => $model->mat_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
