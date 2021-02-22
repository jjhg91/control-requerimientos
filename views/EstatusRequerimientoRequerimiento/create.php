<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimientoRequerimiento */

$this->title = 'Create Estatus Requerimiento Requerimiento';
$this->params['breadcrumbs'][] = ['label' => 'Estatus Requerimiento Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estatus-requerimiento-requerimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
