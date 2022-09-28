<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);

    $default = Yii::$app->session->get('language', 'en-USA');
    $language = $default == 'en-USA' ? 'es-ES' : 'en-USA';
    $bandera = Yii::$app->params['languages'][$language];

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => Yii::t('app', 'Inicio'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'Acerca de'), 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Contacto'), 'url' => ['/site/contact']],
            ['label' => $bandera, 'url' => ['/site/language', 'language' => $language]],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>