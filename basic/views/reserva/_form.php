<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;
use app\models\Pelicula;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */

$usuarioList = ArrayHelper::map(Usuario::find()->select(['usuario_id', 'identificacion', 'usuario.nombre','usuario.apellidos'])->joinWith('rol')->where(['rol.codigo' => 'cliente'])->all(), 'usuario_id', function ($usuario) {
    return $usuario['identificacion'] . ' - ' . $usuario['nombre']. ' ' . $usuario['apellidos']; 
});

$peliculaList = ArrayHelper::map(Pelicula::find()->select(['pelicula_id', 'nombre'])->where(['pelicula.estado' => '1'])->all(), 'pelicula_id', 'nombre');
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaResera')->input('date')  ?>

    <?= $form->field($model, 'costo')->textInput(['type' => 'number', 'step' => '0.01'])?>

    <?= $form->field($model, 'usuario_id')->dropDownList($usuarioList, ['prompt' => 'Seleccione un usuario']) ?>

    <?= $form->field($model, 'pelicula_id')->dropDownList($peliculaList, ['prompt' => 'Seleccione una película']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
