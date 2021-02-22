<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\EstatusRequerimientoRequerimiento;
use app\models\EstatusRequerimiento;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequerimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */




$this->title = 'REQUERIMIENTOS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requerimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Requerimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_requerimiento',
            'fecha_solicitud',
            'objetivo',
            //'descripcion',
            //'datos',
            //'fecha_requerida',
            //'fecha_registro',
            'p00_solicitante',
            [
                'label' => 'ESTATUS',
                'content' => function($model){
                    $estatusR = EstatusRequerimientoRequerimiento::find()->where(['id_requerimiento' => $model->id_requerimiento])->orderBy(['fecha_estatus_requerimiento' => SORT_DESC])->all();
                    $estatusReq = $estatusR[0]->id_estatus_requerimiento;
                    $estatus = EstatusRequerimiento::find()->where(['id_estatus_requerimiento' => $estatusReq])->one();
                    
                    
                    $boton = '
                        <a 
                        href="/basic/web/index.php?r=requerimiento%2Festatus&amp;id='.$model->id_requerimiento.'" 
                        title="Actualizar Estatus" 
                        aria-label="Actualizar Estatus" 
                        data-pjax="0">
                    
                            <span 
                                class="glyphicon 
                                glyphicon-pencil">
                            </span>
                        </a>';
                    return  $estatus->descripcion . $boton;
                    }
            ],
            //'id_frecuencia',
            //'id_tipo_requerimiento',
            // [
            //     'label' => 'HOLA',
            //     'content' => function($model,$key,$index,$column){
            //         $aa = '
            //             <a 
            //             href="/basic/web/index.php?r=requerimiento%2Fupdate&amp;id='.$model->id_requerimiento.'" 
            //             title="Update" 
            //             aria-label="Update" 
            //             data-pjax="0">
                    
            //                 <span 
            //                     class="glyphicon 
            //                     glyphicon-pencil">
            //                 </span>
            //             </a>';

            //         return $aa;
            //     }
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ('{view}{update}{delete}')
                
            ],
        ],
    ]); ?>


</div>



