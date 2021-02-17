<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuarioUsuario */

$this->title = 'Actualizar Perfil Usuario Usuario: ' . $model->id_perfil_usuario__usuario;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Usuario Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil_usuario__usuario, 'url' => ['view', 'id' => $model->id_perfil_usuario__usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-usuario-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
