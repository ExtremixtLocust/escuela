<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Alumno;
use app\widgets\Acciones;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\widgets\MiActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Alumnos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Alumno'), [/*'user-management/user/create'*/'create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                //se agrega un botón para limpiar el buscador
                'header' => Html::a('<i class="bi bi-recycle"></i>', ['index'])
            ],
            [
                'attribute' => 'alu_nocontrol',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => 'width: 150px;',
                ],
                'value' => function ($model) {
                    return "<center>{$model->alu_nocontrol}<br>{$model->img}</center>";
                }
            ],
            'alu_nombre',
            'alu_appaterno',
            'alu_apmaterno',
            //añadimos el campo que creamos (así se llama el método)
            'reticula',
            /* [
                'class' => MiActionColumn::className(),
                'urlCreator' => function ($action, Alumno $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'alu_id' => $model->alu_id]);
                }
            ],*/
            Acciones::botones('alu_id'),
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>