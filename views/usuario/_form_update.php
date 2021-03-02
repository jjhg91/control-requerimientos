<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

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

    <?= 
       $form->field($model, 'id_departamento')->dropdownList([
            $listaDepartamento
        ],
        ['prompt'=>'SELECCIONAR DEPARTAMENTO']
    );
    ?>

    <?= 
        $form->field($model, 'id_cargo')->dropdownList([
            $listaCargo
        ],
        ['prompt'=>'SELECCIONAR CARGO']
    );
    ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'id_estatus_usuario')->dropdownList([
            $listaEstatusUsuario
        ],
        ['prompt'=>'SELECCIONAR ESTATUS']
    ); ?>

    <!-- <?#= $form->field($modelPerfiles, 'id_perfil_usuario')->checkboxList($listaPerfiles) ?> -->
    
    <?php 
        foreach ($listaPerfiles as $perfil) {
            foreach ($perfilActivo as $activo) {
                if ($perfil->id_perfil_usuario === $activo->id_perfil_usuario ){
                    if ($activo->estatus_perfil) {
                        $perfil->estatus = true;
                        $perfil->id_perfil_usuario__usuario = $activo->id_perfil_usuario__usuario;
                        // echo $form->field($modelPerfiles, 'id_perfil_usuario[]')->checkbox(['checked' => 'checked', 'label' => $perfil->descripcion , 'value' => $activo->id_perfil_usuario__usuario] );
                        // } else {
                            // echo $form->field($modelPerfiles, 'id_perfil_usuario[]')->checkbox(['label' => $perfil->descripcion, 'value' => $activo->id_perfil_usuario__usuario] );
                        }   
                    }
                } 
            
                if ($perfil->estatus){
                    echo $form->field($modelPerfiles, 'id_perfil_usuario[]')->checkbox(['checked' => 'checked', 'label' => $perfil->descripcion , 'value' => $perfil->id_perfil_usuario__usuario] );
                    
                }else{
                    echo $form->field($modelPerfiles, 'id_perfil_usuario[]')->checkbox(['label' => $perfil->descripcion , 'value' => $perfil->id_perfil_usuario__usuario] );

                }
            // var_dump($perfil);    
            // exit;
        }
    ?>

    <!-- <?= $form->field($model, 'authKey')->textInput() ?> -->

    <!-- <?= $form->field($model, 'accessToken')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
