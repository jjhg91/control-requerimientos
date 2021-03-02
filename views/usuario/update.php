<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Actualizar Usuario: ' . $model->p00;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p00, 'url' => ['view', 'id' => $model->p00]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
        'listaCargo' => $listaCargo,
        'listaDepartamento' => $listaDepartamento,
        'listaEstatusUsuario' => $listaEstatusUsuario,
        'modelPerfiles' => $modelPerfiles,
        'listaPerfiles' => $listaPerfiles,
        'perfilActivo' => $perfilActivo,
    ]) ?>

</div>
