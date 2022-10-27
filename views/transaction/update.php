<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\transaction $model */

$this->title = 'Update Transaction: ' . $model->transaction_id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transaction_id, 'url' => ['view', 'transaction_id' => $model->transaction_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
