<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\LatLng;
use app\widgets\facebook;
use app\widgets\twitter;

$this->title = Yii::t('app', 'Contacto');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <?php
    $coord = new LatLng(['lat' => 18.023244933091046, 'lng' => -92.90368321800027]);
    $map = new Map([
        'center' => $coord,
        'zoom' => 14,
    ]);
    ?>
    <?php echo $map->display(); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport) : ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else : ?>


        <div class="row row-cols-md-2">
            <br>
            <div class="col-lg-5">
                <p>
                    If you have business inquiries or other questions, please fill out the following form to contact us.
                    Thank you.
                </p>

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-6">
                <?= facebook::widget();
                ?>
                <?= twitter::widget();
                ?>
            </div>
        </div>

    <?php endif; ?>
</div>