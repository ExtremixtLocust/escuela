<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reticula */

$this->title = Yii::t('app', 'Create Reticula');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reticulas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reticula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
