<?php

use yii\helpers\Html;
//variables para insertar contenido dentro de un boton
$titulo = Yii::t('app', $model->dash_titulo);
$descripcion = Yii::t('app', $model->dash_descripcion);
$img = Html::img("@web/img/dashboard/{$model->dash_img}.png", ['style' => 'height: 10rem;']);
$boton = <<< HTML5
    <h3>{$titulo}</h3>
    {$img}
    <p>{$descripcion}</p>
HTML5;
?>

<!--Boton generando el contenido-->
<?= Html::a($boton, [$model->dash_url], ['class' => 'btn dashboard']) ?>
