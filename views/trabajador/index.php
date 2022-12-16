<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\widgets\Acciones;
use app\models\Trabajador;
use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trabajadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Trabajador'), ['create'], ['class' => 'btn btn-success']) ?>
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

            //'tra_id',
            //'tra_departamento_id',
            'tra_nombre',
            'tra_appaterno',
            'tra_apmaterno',
            'departamento',
            //'tra_rfc',
            //'tra_direccion',
            //'tra_telefono',
            //'tra_correo',
            Acciones::botones('tra_id'),
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>