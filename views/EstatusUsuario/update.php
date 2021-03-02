<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusUsuario */

$this->title = 'Actualizar Estatus Usuario: ' . $model->id_estatus_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Estatus Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estatus_usuario, 'url' => ['view', 'id' => $model->id_estatus_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estatus-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
