<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuarioUsuario */

$this->title = 'Crear Perfil Usuario Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Perfil Usuario Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-usuario-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listaPerfiles' => $listaPerfiles,
    ]) ?>

</div>
