<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Frecuencia */

$this->title = 'Actualizar Frecuencia: ' . $model->id_frecuencia;
$this->params['breadcrumbs'][] = ['label' => 'Frecuencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_frecuencia, 'url' => ['view', 'id' => $model->id_frecuencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frecuencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
