<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuarioUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-usuario-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p00')->textInput() ?>

    <!-- <?#= $form->field($model, 'id_perfil_usuario')->textInput() ?> -->
    <?= $form->field($model, 'id_perfil_usuario')->checkboxList($listaPerfiles) ?>
    
    <!-- <?#= $form->field($model, 'estatus_perfil')->checkbox() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
