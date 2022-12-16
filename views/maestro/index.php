<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\Maestro;
use app\widgets\Acciones;
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
            ],
            [
                'attribute' => 'mae_rfc',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => 'width: 150px;',
                ],
                'value' => function ($model) {
                    return "<center>{$model->mae_rfc}<br>{$model->img}</center>";
                }
            ],
            'mae_nombre',
            'mae_appaterno',
            'mae_apmaterno',
            'departamento',
            Acciones::botones('mae_id'),
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>