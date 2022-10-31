<?php

//use app\models\User;
use yii\helpers\Html;
use yii\widgets\ListView;
use webvimark\modules\UserManagement\models\User;

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
                    'class' => 'row row-cols-md-3 g-4',
                ],
                'summary' => false,
            ]); ?>
        </div>