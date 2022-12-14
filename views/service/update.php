<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\service $model */

$this->title = 'Update Service: ' . $model->service_id;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_id, 'url' => ['view', 'service_id' => $model->service_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
