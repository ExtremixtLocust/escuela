<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */

$this->title = 'Escuela';
?>
<div class="site-index">

    <div class="body-content">

        <div class="container">

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_card',
                'layout' => '{items}',
                'options' => [
                    //'tag' => 'div',
                    'class' => 'row row-cols-md-3 g-4',
                    //'id' => 'list-wrapper',
                ],
                'summary' => false,
                //'claseColumna' => 'col-md-4',
            ]); ?>
        </div>