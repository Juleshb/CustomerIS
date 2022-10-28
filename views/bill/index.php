<?php

use app\models\bill;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\billSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

<div class="jumbotron text-center bg-transparent">
       

        
        <span><?=Html::a('Customers',['/customers'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Employee',['/employee'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Transaction',['/transaction'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Service',['/service'], ['class' => 'btn btn-primary'])?></span>
        
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_id',
            'customer_id',
            'bill_amount',
            'quantity',
            'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, bill $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bill_id' => $model->bill_id]);
                 }
            ],
        ],
    ]); ?>


</div>
