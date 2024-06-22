<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipoidentificacion $model */

$this->title = 'Crear tipo de identificación';
$this->params['breadcrumbs'][] = ['label' => 'Tipoidentificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoidentificacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
