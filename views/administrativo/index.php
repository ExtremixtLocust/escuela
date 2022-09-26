<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Administrativo;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AdministrativoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administrativos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administrativo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Administrativo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'adm_id',
            'adm_departamento_id',
            'adm_nombre',
            'adm_appaterno',
            'adm_apmaterno',
            //'adm_telefono',
            //'adm_direccion',
            //'adm_rfc',
            //'adm_correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Administrativo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'adm_id' => $model->adm_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
