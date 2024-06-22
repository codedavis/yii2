<?php

use app\models\Admins;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AdminsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Administradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admins-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Administrador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'admin_id',
            'identificador',
            'clave',
            //'usuario_id',
            [
                'attribute' => 'usuario_id',
                'value' => function ($model) {
                    $nombre =  $model->usuario->identificacion .'-'.$model->usuario->nombre.' '.$model->usuario->apellidos;
                    return $model->usuario ? $nombre  : 'N/A';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Admins $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'admin_id' => $model->admin_id]);
                 }
            ],
        ],
    ]); ?>


</div>
