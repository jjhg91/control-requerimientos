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

    <?= $form->field($model, 'id_tipo_requerimiento')->textInput() ?>

    <?= $form->field($model, 'objetivo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'datos')->textInput() ?>

    <?= $form->field($model, 'fecha_requerida')->textInput() ?>

    <!-- <?= $form->field($model, 'fecha_registro')->textInput() ?> -->

    <?= $form->field($model, 'p00_solicitante')->textInput() ?>

    <?= $form->field($model, 'id_frecuencia')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
