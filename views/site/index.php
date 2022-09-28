<?php
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Escuela';
?>
<div class="site-index">
    


    <div class="body-content">

    <div class="row" style="height: 18rem;">
        <div class="col-lg-4">
            <center> <!--Centra los elementos--> 
            <h2>Alumnos</h2>
            <?php echo Html::img('@web/img/alumnos.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de los alumnos.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/alumno/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>

        <!--cuadricula de maestros-->
        <div class="col-lg-4">
            <center> <!--Centra los elementos-->
            <h2>Maestros</h2>
            <?php echo Html::img('@web/img/maestros.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de los maestros.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/maestro/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>

        <!--cuadricula de administrativo-->
        
        <div class="col-lg-4">
            <center> <!--Centra los elementos--> 
            <h2>Administrativos</h2>
            <?php echo Html::img('@web/img/administrativos.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú del personal Administrativo.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/administrativo/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
        
    </div>
    <br>
    <!--segunda fila de elementos-->
    <div class="row" style="height: 18rem;">
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Retículas</h2>
            <?php echo Html::img('@web/img/reticulas.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de las retículas.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/reticula/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Departamentos</h2>
            <?php echo Html::img('@web/img/departamentos.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de los departamentos.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/departamento/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Trabajador</h2>
            <?php echo Html::img('@web/img/trabajadores.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de los trabajadores.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/trabajador/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
    </div>
    <br>
    <!--tercera fila de elementos-->
    <div class="row" style="height: 18rem;">
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Inventario</h2>
            <?php echo Html::img('@web/img/inventario.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú del inventario.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/inventario/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
        <div class="col-lg-4">
        <center> <!--Centra los elementos-->
            <h2>Proveedores</h2>
            <?php echo Html::img('@web/img/proveedores.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de los proveedores.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/proveedor/index'], ['class' => 'btn btn-primary']) ?> </center>
        </div>
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Materia</h2>
            <?php echo Html::img('@web/img/materias.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de las materias.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/materia/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
    </div>
    <br>
    <!--cuarta fila de elementos-->
    <div class="row" style="height: 18rem;">
        <div class="col-lg-4">
        <center> <!--Centra los elementos--> 
            <h2>Grupos</h2>
            <?php echo Html::img('@web/img/grupos.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de grupos.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/grupo/index'], ['class' => 'btn btn-primary']) ?></center>
        </div>
        <div class="col-lg-4">
        <center> <!--Centra los elementos-->
            <h2>Aulas</h2>
            <?php echo Html::img('@web/img/aulas.png', ['style' => 'height: 10rem;']) ?>
            <p class="pt-3">Acceder al menú de las aulas.</p>
            <?= Html::a(Yii::t('app', 'Ver'), ['/aula/index'], ['class' => 'btn btn-primary']) ?> </center>
        </div>
    </div>
</div>
