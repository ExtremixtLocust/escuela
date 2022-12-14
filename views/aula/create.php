<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = Yii::t('app', 'Create Aula');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aulas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
