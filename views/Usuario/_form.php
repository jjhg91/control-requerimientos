<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p00')->textInput() ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'nombres')->textInput() ?>

    <?= $form->field($model, 'apellidos')->textInput() ?>

    <?= $form->field($model, 'id_departamento')->textInput() ?>

    <?= $form->field($model, 'id_cargo')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    

    

    <!-- <?#= var_dump($listaCargo); ?> -->

    <!-- <?#= $form->field($model->cargo, 'id_cargo')->widget(Select2::classname(), [
        #'data' => $listaCargo,
        #'options' => ['placeholder' => Yii::t('app', 'Selecciona Un Cargo ') . '...'],
        #'pluginOptions' => [
        #    'allowClear' => true,
        #],
    #])
   ?> -->

    



    <?= $form->field($model, 'id_estatus_usuario')->textInput() ?>

    <!-- <?= $form->field($model, 'authKey')->textInput() ?> -->

    <!-- <?= $form->field($model, 'accessToken')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
