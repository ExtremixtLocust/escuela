<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Maestro;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaestroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maestros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maestro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--If para decidir quienes pueden ver el botón crear-->
        <?= User::hasRole(['Administrativo']) ? Html::a(Yii::t('app', 'Crear Maestro'), ['create'], ['class' => 'btn btn-success']) : '' ?>
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
                    'header' => Html::a('<i class="bi bi-recycle"></i>', ['index']),
                    //se añade codigo para centrar el boton de limpiar
                    'headerOptions' => [
                        'style' => 'text-align:center'
                    ],
                    //centramos el contenido de ids
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'text-align:center'];
                    }
                ],
                'mae_nombre',
                'mae_appaterno',
                'mae_apmaterno',
                'departamento',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Maestro $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'mae_id' => $model->mae_id]);
                    },
                    //sentencia para que solo administrativos
                    //puedan ver las acciones
                    'visible' => User::hasRole(['Administrativo']),
                ],
            ],
        ]);
        ?>

    <?php Pjax::end(); ?>

</div>