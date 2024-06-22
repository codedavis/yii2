<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tipoidentificacion $model */

$this->title = $model->tipo_identificacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de identificación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipoidentificacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'tipo_identificacion_id' => $model->tipo_identificacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'tipo_identificacion_id' => $model->tipo_identificacion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que desea eliminar el tipo de identificación?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tipo_identificacion_id',
            'codigo',
            'nombre',
            'descripcion',
        ],
    ]) ?>

</div>
