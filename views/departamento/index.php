<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Departamento;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Departamentos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Departamento'), ['create'], ['class' => 'btn btn-success']) ?>
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

            'dep_nombre',
            //no necesitamos el ID
            //'dep_id',
            //cambiamos el id de proveedor por su nombre
            //'dep_proveedor_id',
            'proveedor',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Departamento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dep_id' => $model->dep_id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>