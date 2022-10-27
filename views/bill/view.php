<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\bill $model */

$this->title = $model->bill_id;
$this->params['breadcrumbs'][] = ['label' => 'Bills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'bill_id' => $model->bill_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'bill_id' => $model->bill_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bill_id',
            'customer_id',
            'bill_amount',
            'quantity',
            'price',
        ],
    ]) ?>

</div>
