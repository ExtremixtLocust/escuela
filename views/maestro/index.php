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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(User::hasRole('Alumno')){?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    //se agrega un botón para limpiar el buscador (Cambiar por ícono)
                    'header' => Html::a('Limpiar',['index'])
                ],
                'mae_nombre',
                'mae_appaterno',
                'mae_apmaterno',
                'departamento',
            ],
        ]);
        ?>
    <?php }elseif(User::hasRole('Administrativo')){ ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    //se agrega un botón para limpiar el buscador (Cambiar por ícono)
                    'header' => Html::a('Limpiar',['index'])
                ],
                'mae_nombre',
                'mae_appaterno',
                'mae_apmaterno',
                'departamento',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Maestro $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'mae_id' => $model->mae_id]);
                     }
                ],
            ],
        ]);
        ?>
    <?php } ?>

    <?php Pjax::end(); ?>

</div>
