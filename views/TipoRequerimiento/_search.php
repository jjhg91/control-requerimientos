<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoRequerimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-requerimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tipo_requerimiento') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'id_area_responsable') ?>

    <?= $form->field($model, 'envio_correo')->checkbox() ?>

    <?= $form->field($model, 'habilitado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
