<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $titulo;
$this->params['breadcrumbs'][] = $this->title;
function nombreAleatorio()
{

    $nombres = ["Juan", "María", "Carlos", "Guadalupe"];
    return $nombres[rand(0, count($nombres) - 1)];
}
?>
<div style="text-align: center;">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Este es el reporte de alumnos</p>
    <table border="1" style="margin: 0 auto;">

        <tr>
            <th>Número</th>
            <th>Nombre</th>
            <th>Semestre</th>
        </tr>
        <?php for ($i = 1; $i <= 50; $i++) { ?>

        <tr>
            <td><?= $i ?></td>
            <td><?= nombreAleatorio() ?></td>
            <td><?= rand(1, 9) ?></td>
        </tr>

        <?php } ?>

    </table>
</div>