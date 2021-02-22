<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimientoRequerimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estatus-requerimiento-requerimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_requerimiento')->textInput() ?>

    <?= $form->field($model, 'id_estatus_requerimiento')->textInput() ?>

    <?= $form->field($model, 'fecha_estatus_requerimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
