<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Usuario;

use app\models\EstatusRequerimientoRequerimiento;
use app\models\EstatusRequerimiento;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */

$this->title = 'REQUERIMIENTO N° - '.$model->id_requerimiento;
$this->params['breadcrumbs'][] = ['label' => 'Requerimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="requerimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_requerimiento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Actualizar Estatus', ['estatus', 'id' => $model->id_requerimiento], ['class' => 'btn btn-primary']) ?>
        
        <!-- <?#= Html::a('Eliminar', ['delete', 'id' => $model->id_requerimiento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?php 
    $model->id_frecuencia = $model->frecuencia->descripcion; 
    $model->id_tipo_requerimiento = $model->tipoRequerimiento->descripcion;
    // $model = 
    // $model->nombres = 'Hola';
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_requerimiento',
            'fecha_solicitud',
            [
                'label' => 'ESTATUS',
                'value' => function ($model)
                    {
                        $estatusR = EstatusRequerimientoRequerimiento::find()->where(['id_requerimiento' => $model->id_requerimiento])->orderBy(['id_estatus_requerimeinto__requerimiento' => SORT_DESC])->all();
                        $estatusReq = $estatusR[0]->id_estatus_requerimiento;
                        $estatus = EstatusRequerimiento::find()->where(['id_estatus_requerimiento' => $estatusReq])->one();
                        // var_dump($estatusR);
                        // exit;
                        return $estatus->descripcion;
                    }
            ],
            'objetivo',
            'descripcion',
            'datos',
            'fecha_requerida',
            // 'fecha_registro',
            [
                'label' => 'SOLICITANTE',
                'value' => function($model){
                    $solicitante = Usuario::findOne($model->p00_solicitante);
                    $respuesta = 'P00-'.$model->p00_solicitante.' | '.$solicitante->nombres.' '.$solicitante->apellidos;

                    return $respuesta;
                }
            ],
            
            'id_frecuencia',
            'id_tipo_requerimiento',
        ],
    ]) ?>

</div>
