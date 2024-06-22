<?php

use app\models\Pelicula;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeliculaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Peliculas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelicula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Pelicula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pelicula_id',
            'nombre',
            'url:url',
            //'estado',
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    return $model->estado == 1 ? 'Activo' : 'Inactivo';
                },
            ],
            //'usuario_id',
            [
                'attribute' => 'usuario_id',
                'value' => function ($model) {
                    $nombre =  $model->usuario->identificacion .'-'.$model->usuario->nombre.' '.$model->usuario->apellidos;
                    return $model->usuario ? $nombre  : 'N/A';
                },
            ],
            //'imagen',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pelicula $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pelicula_id' => $model->pelicula_id]);
                 }
            ],
        ],
    ]); ?>


</div>
