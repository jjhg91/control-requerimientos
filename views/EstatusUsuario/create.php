<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusUsuario */

$this->title = 'Crear Estatus Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Estatus Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estatus-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
