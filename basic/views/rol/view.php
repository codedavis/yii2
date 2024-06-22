<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Rol $model */

$this->title = $model->rol_id;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['Modificar', 'rol_id' => $model->rol_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Eliminar', 'rol_id' => $model->rol_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que desea eliminar el rol?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rol_id',
            'codigo',
            'nombre',
            'descripcion',
        ],
    ]) ?>

</div>
