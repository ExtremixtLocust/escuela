<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Aula;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Aulas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Aula'), ['create'], ['class' => 'btn btn-success']) ?>
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
            //no necesitamos el id
            //'aul_id',
            'aul_numero',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Aula $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'aul_id' => $model->aul_id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>