<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Admins $model */

$this->title = 'Modificar Administrador: ' . $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'admin_id' => $model->admin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admins-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
