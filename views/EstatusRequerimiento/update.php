<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimiento */

$this->title = 'Update Estatus Requerimiento: ' . $model->id_estatus_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Estatus Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estatus_requerimiento, 'url' => ['view', 'id' => $model->id_estatus_requerimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estatus-requerimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
