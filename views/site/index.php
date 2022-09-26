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
            <?= Html::a(Yii::t('app', 'Alumno'), ['/alumno/index'], ['class' => 'btn btn-primary']) ?>
        </div>

        <!--cuadricula de maestros-->
        <div class="col-lg-4">
            <h2>Maestros</h2>
            <p>Accederl al menú de los maestros.</p>
            <?= Html::a(Yii::t('app', 'Maestro'), ['/maestro/index'], ['class' => 'btn btn-primary']) ?>
        </div>

        <!--cuadricula de administrativo-->
        <div class="col-lg-4">
            <h2>Administrativos</h2>
            <p>Accederl al menú del personal Administrativo.</p>
            <?= Html::a(Yii::t('app', 'Administrativo'), ['/administrativo/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <h2>Retículas</h2>
                <p>Acceder al menú de las retículas.</p>
                <?= Html::a(Yii::t('app', 'Retículas'), ['/reticula/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Departamentos</h2>
                <p>Acceder al menú de los departamentos.</p>
                <?= Html::a(Yii::t('app', 'Departamento'), ['/departamento/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Administrativo</h2>
                <p>Acceder al menú de los administrativos.</p>
                <?= Html::a(Yii::t('app', 'Administrativo'), ['/administrativo/index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>
</div>
