<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PagoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pago_id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'reserva_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
