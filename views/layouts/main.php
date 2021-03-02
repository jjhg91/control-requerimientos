<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\PerfilUsuarioUsuario;

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

    function algo($label, $url, $perfiles)
    {
        if(  !Yii::$app->user->isGuest ){
            
            $listas = PerfilUsuarioUsuario::findAll(['p00'=>Yii::$app->user->identity->p00, 'estatus_perfil' => true]);
            $pass = false;
            
            foreach ($perfiles as $perfil) {
                foreach ($listas as $lista) {
                    if ($perfil == $lista->id_perfil_usuario ) {
                       $pass = true;
                       break;
                   }
               }
           }

           
           if ($pass === true) {
               return ['label' => $label, 'url' => [$url]];
           }


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
            
            algo('Inicio', '/site/index',['1','2','3','4','5','6','7','8'] ),
            algo('Usuario', '/usuario/index',['8','']),
            algo('Cargo', '/cargo/index',['8']),
            algo('Departamento', '/departamento/index',['8']),
            algo('Area Responsable', '/arearesponsable/index',['8']),
            algo('Estatus Usuario', '/estatususuario/index',['8']),
            algo('Tipo de Requerimiento', '/tiporequerimiento/index',['8']),
            algo('Estatus de Requerimiento', '/estatusrequerimiento/index',['8']),
            algo('Estatus Requerimiento Requerimiento','/estatusrequerimientorequerimiento/index',['8']),
            algo('Frecuencia', '/frecuencia/index',['8']),
            algo('Requerimiento', '/requerimiento/index',['8','4','2','3','4','6','7']),
            algo('Perfil Usuario', '/perfilusuario/index',['8']),
            algo('Perfil Usuario Usuario','/perfilusuariousuario/index',['8']),
            

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li class="navbar-right">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Cerrar Sesion (' . Yii::$app->user->identity->username . ')',
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

        <!-- <p class="pull-left">&copy; My Company <?= date('Y') ?></p> -->

        <p class="pull-right">- version-beta: 1.0</p>
        <p class="pull-right">realizado por GGCSTI -</p>
    </div>
</footer>

<!-- <?php $this->endBody() ?> -->
</body>
</html>
<?php $this->endPage() ?>
