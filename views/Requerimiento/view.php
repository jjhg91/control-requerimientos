<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */

$this->title = $model->id_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="requerimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_requerimiento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_requerimiento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php 
    $model->id_frecuencia = $model->frecuencia->descripcion; 
    $model->id_tipo_requerimiento = $model->tipoRequerimiento->descripcion;
    $model->nombres = 'Hola';
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_requerimiento',
            'fecha_solicitud',
            'objetivo',
            'descripcion',
            'datos',
            'fecha_requerida',
            // 'fecha_registro',
            'p00_solicitante',
            'id_frecuencia',
            'id_tipo_requerimiento',
        ],
    ]) ?>

</div>
