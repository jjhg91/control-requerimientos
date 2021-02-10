<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    function algo($label, $url)
    {
        if(  !Yii::$app->user->isGuest ){
            
            // if (condition) {
            // }

            return ['label' => $label, 'url' => [$url]];
            #return true; 

        }
        return '';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
       
        'items' => [

            // ['label' => 'Inicio', 'url' => ['/site/index']],
            // ['label' => 'Usuario', 'url' => ['/usuario/index']],
            // ['label' => 'Cargo', 'url' => ['/cargo/index']],
            // ['label' => 'Departamento', 'url' => ['/departamento/index']],
            // ['label' => 'Area Responsable', 'url' => ['/arearesponsable/index']],
            // ['label' => 'Estatus Usuario', 'url' => ['/estatususuario/index']],
            // ['label' => 'Tipo de Requerimiento', 'url' => ['/tiporequerimiento/index']],
            // ['label' => 'Estatus de Requerimiento', 'url' => ['/estatusrequerimiento/index']],
            // ['label' => 'Frecuencia', 'url' => ['/frecuencia/index']],
            // ['label' => 'Requerimiento', 'url' => ['/requerimiento/index']],
            // ['label' => 'Perfil Usuario', 'url' => ['/perfilusuario/index']],
            // ['label' => 'Perfil Usuario Usuario', 'url' => ['/perfilusuariousuario/index']],
            
            algo('Inicio', '/site/index'),
            algo('Usuario', '/usuario/index'),
            algo('Cargo', '/cargo/index'),
            algo('Departamento', '/departamento/index'),
            algo('Area Responsable', '/arearesponsable/index'),
            algo('Estatus Usuario', '/estatususuario/index'),
            algo('Tipo de Requerimiento', '/tiporequerimiento/index'),
            algo('Estatus de Requerimiento', '/estatusrequerimiento/index'),
            algo('Frecuencia', '/frecuencia/index'),
            algo('Requerimiento', '/requerimiento/index'),
            algo('Perfil Usuario', '/perfilusuario/index'),
            algo('Perfil Usuario Usuario','/perfilusuariousuario/index'),
            

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">

        <p class="pull-left">&copy; Telecomunicaciones Movilnet <?= date('Y') ?></p>

        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
        <!-- <p class="pull-left">&copy; My Company <?= date('Y') ?></p> -->

        <p class="pull-right">Debug</p>
    </div>
</footer>

<!-- <?php $this->endBody() ?> -->
</body>
</html>
<?php $this->endPage() ?>
