<?php

use yii\helpers\Html;
?>

<center class="dashboard">
    <!--Centra los elementos-->
    <h2><?= Html::a(Yii::t('app', $model->dash_titulo)) ?></h2>
    <?php echo Html::img("@web/img/dashboard/{$model->dash_img}.png", ['style' => 'height: 10rem;']) ?>
    <p><?= Html::a(Yii::t('app', $model->dash_descripcion)) ?> </p>
    <?= Html::a(Yii::t('app', 'Ver'), [$model->dash_url], ['class' => 'btn btn-primary']) ?>
</center>