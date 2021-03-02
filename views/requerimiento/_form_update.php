<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requerimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_solicitud')->hiddenInput()->label(false) ?>


    <?= 
        $form->field($model, 'id_tipo_requerimiento')->dropdownList([
            $listaTipoRequerimiento
        ],
        ['prompt'=>'SELECCIONAR TIPO DE REQUERIMIENTO...']
    );
    ?>

    <?= $form->field($model, 'objetivo')->textarea(['rows' => '4']) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => '8']) ?>

    <?= $form->field($model, 'datos')->textarea(['rows' => '4']) ?>

    <!-- <?#= $form->field($model, 'fecha_requerida')->textInput() ?> -->

    

    
    <div class="form-group field-requerimiento-fecha_requerida required">
        <label class="control-label" for="requerimiento-fecha_requerida">FECHA REQUERIDA</label>
        <input type="date" id="requerimiento-fecha_requerida" class="form-control" name="Requerimiento[fecha_requerida]" aria-required="true" value="<?= date('Y-m-d', strtotime( $model->fecha_requerida)) ?>">
        <input type="time" id="requerimiento-fecha_requerida-time" class="form-control" name="Requerimiento[fecha_requerida-time]" aria-required="true">
        <div class="help-block"></div>
    </div>





    <?php 
        $fecha = date('d-m-Y H:i:s');
        $model->fecha_registro = $fecha;
    ?>
    <?= $form->field($model, 'fecha_registro')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'p00_solicitante')->textInput() ?>

    <?= 
        $form->field($model, 'id_frecuencia')->dropdownList([
            $listaFrecuencia
        ],
        ['prompt'=>'SELECCIONAR FRECUANCIA...']
    );
    ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



