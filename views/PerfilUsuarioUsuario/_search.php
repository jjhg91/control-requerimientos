<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuarioUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-usuario-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_perfil_usuario__usuario') ?>

    <?= $form->field($model, 'p00') ?>

    <?= $form->field($model, 'id_perfil_usuario') ?>

    <?= $form->field($model, 'estatus_perfil')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
