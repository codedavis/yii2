<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PeliculaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pelicula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pelicula_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'usuario_id') ?>

    <?php // echo $form->field($model, 'imagen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
