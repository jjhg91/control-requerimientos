<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Frecuencia */

$this->title = 'Crear Frecuencia';
$this->params['breadcrumbs'][] = ['label' => 'Frecuencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frecuencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
