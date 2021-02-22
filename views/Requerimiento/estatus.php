<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */

$this->title = 'ACTUALIZAR ESTATUS DE REQUERIMIENTO N° - ' . $modelR->id_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelR->id_requerimiento, 'url' => ['view', 'id' => $modelR->id_requerimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requerimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_cambio_estatus', [
        'model' => $model,
        'modelR' => $modelR,
        'listaEstatusR' => $listaEstatusR
        
    ]) ?>

</div>
