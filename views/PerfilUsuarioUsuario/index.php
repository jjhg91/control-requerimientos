<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilUsuarioUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Usuario Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-usuario-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil Usuario Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_perfil_usuario__usuario',
            'p00',
            'id_perfil_usuario',
            'estatus_perfil:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
