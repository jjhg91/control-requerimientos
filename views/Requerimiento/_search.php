<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequerimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requerimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_requerimiento') ?>

    <?= $form->field($model, 'fecha_solicitud') ?>

    <?= $form->field($model, 'objetivo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'datos') ?>

    <?php // echo $form->field($model, 'fecha_requerida') ?>

    <?php // echo $form->field($model, 'fecha_registro') ?>

    <?php // echo $form->field($model, 'p00_solicitante') ?>

    <?php // echo $form->field($model, 'id_frecuencia') ?>

    <?php // echo $form->field($model, 'id_tipo_requerimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
