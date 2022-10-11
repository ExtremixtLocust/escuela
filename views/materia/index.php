<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Materia;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MateriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Materias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Materia'), ['create'], ['class' => 'btn btn-success']) ?>
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

            //'mat_id',
            'mat_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Materia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'mat_id' => $model->mat_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
