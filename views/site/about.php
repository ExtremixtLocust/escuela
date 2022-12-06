<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Acerca De');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>

  <!--Contenedor principal-->
  <div class="container">
    <!--imagen tec-->
    <div class="row">
      <?php echo Html::img("@web/img/site/about/escuela.jpg", ['style' => 'height: 20rem;']) ?>
    </div>
    <!--Separacion-->
    <br>
    <!--Contenedor historia y collapse-->
    <div class="row row-cols-md-2">



      <!--historia-->
      <div>
        <h1>Historia</h1>
        <p>El Instituto Tecnológico de Villahermosa fue fundado el 9 de septiembre de 1974, cuando la economía del estado estaba basada en renglones muy específicos: agricultura, ganadería, pesca y sus cuatros principales industrias eran: azucarera, chocolatera, aceitera y petrolera. Hasta ese año, la industria presentaba un desarrollo escaso debido en gran parte, a la carencia de mano de obra calificada.</p>
      </div>
      <!--collapse-->
      <div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Misión
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <!--<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
                <p>Formar profesionistas competitivos, íntegros y con alto sentido de responsabilidad social.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Visión
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <!--<strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. -->
                <p>Ser una Institución líder en Educación Superior Tecnológica reconocida nacional e internacionalmente.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Valores
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <!--<strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. -->
                <ul class="list-group">
                  <li class="list-group-item">Honestidad</li>
                  <li class="list-group-item">Responsabilidad</li>
                  <li class="list-group-item">Respeto</li>
                  <li class="list-group-item">Liderazgo</li>
                  <li class="list-group-item">Compromiso</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>