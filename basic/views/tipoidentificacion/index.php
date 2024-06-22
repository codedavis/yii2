<?php

use app\models\Tipoidentificacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TipoidentificacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo de identificación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoidentificacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Nuevo Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'tipo_identificacion_id',
            'codigo',
            'nombre',
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tipoidentificacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tipo_identificacion_id' => $model->tipo_identificacion_id]);
                 }
            ],
        ],
    ]); ?>


</div>
