<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/** @var yii\web\View $this */
/** @var app\models\Admins $model */
/** @var yii\widgets\ActiveForm $form */

$usuarioList = ArrayHelper::map(Usuario::find()->select(['usuario_id', 'identificacion', 'usuario.nombre','usuario.apellidos'])->joinWith('rol')->where(['rol.codigo' => 'admin'])->all(), 'usuario_id', function ($usuario) {
    return $usuario['identificacion'] . ' - ' . $usuario['nombre']. ' ' . $usuario['apellidos']; 
});
?>

<div class="admins-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identificador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->passwordInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'usuario_id')->dropDownList($usuarioList, ['prompt' => 'Seleccione un usuario']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
