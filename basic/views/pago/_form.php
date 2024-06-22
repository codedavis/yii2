<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Reserva;

/** @var yii\web\View $this */
/** @var app\models\Pago $model */
/** @var yii\widgets\ActiveForm $form */


$reservaList = ArrayHelper::map(
    Reserva::find()
        ->joinWith('pelicula') // Cargar la relación 'pelicula'
        ->all(), 
    'reserva_id', 
    function ($reserva) {
        // Verifica que 'pelicula' no sea null antes de intentar acceder a sus propiedades
        $peliculaNombre = $reserva->pelicula ? $reserva->pelicula->nombre : 'N/A';
        return 'USD ' . $reserva->costo . ' - ' . $peliculaNombre;
    }
);

?>

<div class="pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->input('date') ?>

    <?= $form->field($model, 'reserva_id')->dropDownList($reservaList, ['prompt' => 'Seleccione reserva']) ?>

    <?= $form->field($model, 'monto')->textInput(['type' => 'number', 'step' => '0.01'])?>


    <?= $form->field($model, 'estado')->dropDownList([
    1 => 'Aprobado',
    0 => 'Pendiente',
], ['prompt' => 'Seleccione Estado']) ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
