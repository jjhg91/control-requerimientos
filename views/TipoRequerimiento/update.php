<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoRequerimiento */

$this->title = 'Actualizar Tipo Requerimiento: ' . $model->id_tipo_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_requerimiento, 'url' => ['view', 'id' => $model->id_tipo_requerimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-requerimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
