<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuario */

$this->title = 'Actualizar Perfil Usuario: ' . $model->id_perfil_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil_usuario, 'url' => ['view', 'id' => $model->id_perfil_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
