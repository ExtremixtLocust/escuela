<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

//idioma nueva version
$actual = Yii::$app->session->get('language', 'es-MX');
$items = [];
foreach (Yii::$app->params['languages'] as $lang) {
    if ($lang != $actual) {
        $items[] = [
            'label' => Html::img("/img/{$lang}.png", ['width' => '30px']),
            'url' => ['/site/language', 'language' => $lang]
        ];
    }
}

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
]);
//lenguaje version anterior
/*
$default = Yii::$app->session->get('language', 'en-USA');
$language = $default == 'en-USA' ? 'es-ES' : 'en-USA';
$bandera = Yii::$app->params['languages'][$language];
*/
echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => Yii::t('app', 'Inicio'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'Acerca de'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contacto'), 'url' => ['/site/contact']],
        [
            'label' => Html::img("/img/{$actual}.png", ['width' => '30px']),
            'items' => $items
        ],
        //lenguaje version anterior
        //['label' => $bandera, 'url' => ['/site/language', 'language' => $language]],
        Yii::$app->user->isSuperAdmin
            ? [
                'label' => Yii::t('app', 'Administracion'),
                'items' => UserManagementModule::menuItems()
            ] : '',
        Yii::$app->user->isGuest
            ? ['label' => 'Login', 'url' => ['/user-management/auth/login']]
            : '<li class="nav-item">'
            . Html::beginForm(['/user-management/auth/logout'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
    ]
]);
NavBar::end();
