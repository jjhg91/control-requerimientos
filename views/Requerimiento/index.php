<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequerimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requerimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requerimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Requerimiento', ['create'], ['class' => 'btn btn-success']) ?>
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
            'descripcion',
            'datos',
            //'fecha_requerida',
            //'fecha_registro',
            //'p00_solicitante',
            //'id_frecuencia',
            //'id_tipo_requerimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
