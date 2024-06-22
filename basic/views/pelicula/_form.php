<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */
/** @var yii\widgets\ActiveForm $form */

$usuarioList = ArrayHelper::map(Usuario::find()->select(['usuario_id', 'identificacion', 'usuario.nombre','usuario.apellidos'])->joinWith('rol')->where(['rol.codigo' => 'admin'])->all(), 'usuario_id', function ($usuario) {
    return $usuario['identificacion'] . ' - ' . $usuario['nombre']. ' ' . $usuario['apellidos']; 
});
?>

<div class="pelicula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([
    1 => 'Activo',
    0 => 'Inactivo',
], ['prompt' => 'Seleccione Estado']) ?>

    <?= $form->field($model, 'usuario_id')->dropDownList($usuarioList, ['prompt' => 'Seleccione un usuario']) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
