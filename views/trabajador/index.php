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
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                //ícono para limpiar
                'header' => Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="20  " height="20" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
              </svg>', ['index'])
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