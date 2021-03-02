<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AreaResponsable */

$this->title = 'Actualizar Area Responsable: ' . $model->id_area_responsable;
$this->params['breadcrumbs'][] = ['label' => 'Area Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_area_responsable, 'url' => ['view', 'id' => $model->id_area_responsable]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-responsable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
