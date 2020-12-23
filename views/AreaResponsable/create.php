<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AreaResponsable */

$this->title = 'Create Area Responsable';
$this->params['breadcrumbs'][] = ['label' => 'Area Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-responsable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
