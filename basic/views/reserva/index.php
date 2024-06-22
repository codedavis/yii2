<?php

use app\models\Reserva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReservaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'reserva_id',
            'fechaResera',
            'costo',
            //'usuario_id',
            [
                'attribute' => 'usuario_id',
                'value' => function ($model) {
                    $nombre =  $model->usuario->identificacion .'-'.$model->usuario->nombre.' '.$model->usuario->apellidos;
                    return $model->usuario ? $nombre  : 'N/A';
                },
            ],
            //'pelicula_id',
            [
                'attribute' => 'pelicula_id',
                'value' => function ($model) {
                    $nombre =  $model->pelicula->nombre;
                    return $model->pelicula ? $nombre  : 'N/A';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reserva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'reserva_id' => $model->reserva_id]);
                 }
            ],
        ],
    ]); ?>


</div>
