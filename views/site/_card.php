<?php
use yii\helpers\Html;
?>
<div class="col-lg-4">
    <center> <!--Centra los elementos--> 
    <h2><?= Html::a(Yii::t('app', $model->dash_titulo))?></h2>
    <?php echo Html::img("@web/img/{$model->dash_img}.png", ['style' => 'height: 10rem;']) ?>
    <p><?= Html::a(Yii::t('app', $model->dash_descripcion))?> </p>
    <?= Html::a(Yii::t('app', 'Ver'), [$model->dash_url], ['class' => 'btn btn-primary'])?> </center>
</div>