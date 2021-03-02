<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusRequerimientoRequerimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estatus-requerimiento-requerimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_estatus_requerimeinto__requerimiento') ?>

    <?= $form->field($model, 'id_requerimiento') ?>

    <?= $form->field($model, 'id_estatus_requerimiento') ?>

    <?= $form->field($model, 'fecha_estatus_requerimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
