<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */

$this->title = 'Actualizar Requerimiento: ' . $model->id_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_requerimiento, 'url' => ['view', 'id' => $model->id_requerimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requerimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [



        'model' => $model,
        'listaTipoRequerimiento' => $listaTipoRequerimiento,
        'listaFrecuencia' => $listaFrecuencia
    ]) ?>

</div>
