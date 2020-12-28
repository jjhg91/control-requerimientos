<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Requerimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requerimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_solicitud')->textInput() ?>


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

    <?= $form->field($model, 'fecha_requerida')->textInput() ?>

    <!-- <?= $form->field($model, 'fecha_registro')->textInput() ?> -->

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
