<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_create', [
        'model' => $model,
        'listaCargo' => $listaCargo,
        'listaDepartamento' => $listaDepartamento,
        'listaEstatusUsuario' => $listaEstatusUsuario,
        'modelPerfiles' => $modelPerfiles,
        'listaPerfiles' => $listaPerfiles,
    ]) ?>

</div>