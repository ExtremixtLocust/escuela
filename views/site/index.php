<?php
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Escuela';
?>
<div class="site-index">
    


    <div class="body-content">

    <div class="row">
        <div class="col-lg-4">
            <h2>Alumnos</h2>
            <p>Accederl al menú de los alumnos.</p>
            <?= Html::a(Yii::t('app', 'Alumnos'), ['/alumno/index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Retículas</h2>

                <p>Acceder al menú de las retículas.</p>

                <?= Html::a(Yii::t('app', 'Retículas'), ['/reticula/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
