<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */

$this->title = 'Modificar Reserva: ' . $model->reserva_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reserva_id, 'url' => ['view', 'reserva_id' => $model->reserva_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="reserva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
