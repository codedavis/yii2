<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Admins $model */

$this->title = 'Crear Administrador';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admins-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
