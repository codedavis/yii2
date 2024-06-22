<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoIdentificacion;
use app\models\Rol;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
$tipoIdentificacionList = ArrayHelper::map(TipoIdentificacion::find()->all(), 'tipo_identificacion_id', 'nombre');
$rolList = ArrayHelper::map(Rol::find()->all(), 'rol_id', 'nombre');
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_identificacion_id')->dropDownList($tipoIdentificacionList, ['prompt' => 'Seleccione el tipo de identificación']) ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaNacimiento')->input('date') ?>

    <?= $form->field($model, 'rol_id')->dropDownList($rolList, ['prompt' => 'Seleccione el rol']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
