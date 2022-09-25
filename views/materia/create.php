<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = Yii::t('app', 'Create Materia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
