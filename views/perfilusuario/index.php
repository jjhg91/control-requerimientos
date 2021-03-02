<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Perfil Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_perfil_usuario',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
