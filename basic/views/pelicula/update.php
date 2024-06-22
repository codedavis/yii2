<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */

$this->title = 'Modificar Pelicula: ' . $model->pelicula_id;
$this->params['breadcrumbs'][] = ['label' => 'Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pelicula_id, 'url' => ['view', 'pelicula_id' => $model->pelicula_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="pelicula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
