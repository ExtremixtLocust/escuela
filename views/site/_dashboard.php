<?php

use yii\helpers\Html;
?>
<div class="btn btn-default" style="border: 1px solid lightgray; width: 100%;">
<?= Html::a($model->img, [$model->das_url]) ?>
<h4><?= $model->das_titulo ?></h4>
</div>
<br><br>