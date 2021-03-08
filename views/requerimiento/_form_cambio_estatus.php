<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\EstatusRequerimientoRequerimiento;


/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimientoRequerimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estatus-requerimiento-requerimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $model->id_requerimiento = $modelR->id_requerimiento ?>

    <?= $form->field($model, 'id_requerimiento')->textInput()->hiddenInput()->label(false) ?>

    <!-- <?#= $form->field($model, 'id_estatus_requerimiento')->textInput() ?> -->
    <?php
        $estatusR = EstatusRequerimientoRequerimiento::find()->where(['id_requerimiento' => $modelR->id_requerimiento])->orderBy(['id_estatus_requerimeinto__requerimiento' => SORT_DESC])->all();
        $estatusReq = $estatusR[0]->id_estatus_requerimiento; 
        $model->id_estatus_requerimiento = $estatusReq;
    ?>

    <?= 
        $form->field($model, 'id_estatus_requerimiento')->dropdownList([
            $listaEstatusR
        ],
        ['prompt'=>'SELECCIONAR ESTATUS...']
    );
    ?>


    <?php 
        $fecha = date('d-m-Y H:i:s');
        $model->fecha_estatus_requerimiento = $fecha;
    ?>

    <?= $form->field($model, 'fecha_estatus_requerimiento')->textInput()->hiddenInput()->label(false) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
