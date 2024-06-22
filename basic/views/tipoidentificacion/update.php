<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipoidentificacion $model */

$this->title = 'Modificar tipo de identificación: ' . $model->tipo_identificacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de indentificación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_identificacion_id, 'url' => ['view', 'tipo_identificacion_id' => $model->tipo_identificacion_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="tipoidentificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
