<?php

use app\models\Pago;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PagoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pago_id',
            'numero',
            'fecha',
            'monto',
           //'estado',
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    return $model->estado == 1 ? 'Aprobado' : 'Pendiente';
                },
            ],
            //'reserva_id',
            [
                'attribute' => 'reserva_id',
                'value' => function ($model) {
                    $nombre =  $model->reserva->pelicula->nombre;
                    return $model->reserva ? $nombre  : 'N/A';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pago $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pago_id' => $model->pago_id]);
                 }
            ],
        ],
    ]); ?>


</div>
