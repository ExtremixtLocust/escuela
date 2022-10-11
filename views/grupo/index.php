<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Grupo;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Grupos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Grupo'), ['create'], ['class' => 'btn btn-success']) ?>
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
            //ocultamos el id
            //'gru_id',
            //cambiamos el id de la materia por el nombre
            //'gru_materia_id',
            'materia',
            //cambiamos el id del maestro por el nombre
            //'gru_maestro_id',
            'maestro',
            //cambiamos el id del aula por el no de aula
            //'gru_aula_id',
            'aula',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Grupo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'gru_id' => $model->gru_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
