<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoRequerimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-requerimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'id_area_responsable')->textInput() ?>

    <?= $form->field($model, 'envio_correo')->checkbox() ?>

    <?= $form->field($model, 'habilitado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
