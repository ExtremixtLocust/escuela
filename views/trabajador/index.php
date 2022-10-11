<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Trabajador;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trabajadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Trabajador'), ['create'], ['class' => 'btn btn-success']) ?>
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

            //'tra_id',
            //'tra_departamento_id',
            'tra_nombre',
            'tra_appaterno',
            'tra_apmaterno',
            'departamento',
            //'tra_rfc',
            //'tra_direccion',
            //'tra_telefono',
            //'tra_correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trabajador $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tra_id' => $model->tra_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
