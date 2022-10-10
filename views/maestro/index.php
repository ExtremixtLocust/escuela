<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Maestro;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaestroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maestros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maestro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Maestro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                //se agrega un botón para limpiar el buscador (Cambiar por ícono)
                'header' => Html::a('Limpiar',['index'])
            ],
            //comentamos ID porque no necesitamos verlo
            //'mae_id',
            //comentamos el campo que solo muestra ID
            //'mae_departamento_id',
            'mae_nombre',
            'mae_appaterno',
            'mae_apmaterno',
            'departamento',
            //'mae_rfc',
            //'mae_telefono',
            //'mae_direccion',
            //'mae_correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Maestro $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'mae_id' => $model->mae_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
