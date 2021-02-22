<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimientoRequerimiento */

$this->title = 'Update Estatus Requerimiento Requerimiento: ' . $model->id_estatus_requerimeinto__requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Estatus Requerimiento Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estatus_requerimeinto__requerimiento, 'url' => ['view', 'id' => $model->id_estatus_requerimeinto__requerimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estatus-requerimiento-requerimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
