<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Reticula;
use app\widgetsPersonalizados\TablaConPermisos;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReticulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Retículas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reticula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Retícula'), ['create'], ['class' => 'btn btn-success']) ?>
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
                //se agrega un botón para limpiar el buscador
                'header' => Html::a('<i class="bi bi-recycle"></i>', ['index'])
            ],

            //'ret_id',
            'ret_carrera',
            [
                //'class' => ActionColumn::className(),
                //'urlCreator' => function ($action, Reticula $model, $key, $index, $column) {
                   // return Url::toRoute([$action, 'ret_id' => $model->ret_id]);
                //}
                TablaConPermisos::widget([
                    'botonera' => ['Alumno'],
                ])

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>