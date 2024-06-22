<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rol $model */

$this->title = 'Update Rol: ' . $model->rol_id;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rol_id, 'url' => ['view', 'rol_id' => $model->rol_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
