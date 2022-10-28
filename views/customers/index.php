<?php

use app\models\Customers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CustomersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">
<div class="jumbotron text-center bg-transparent">
       

        
      
       <span><?=Html::a('Employee',['/employee'], ['class' => 'btn btn-primary'])?></span>
       <span><?=Html::a('Transaction',['/transaction'], ['class' => 'btn btn-primary'])?></span>
       <span><?=Html::a('Service',['/service'], ['class' => 'btn btn-primary'])?></span>
       <span><?=Html::a('Bill',['/bill'], ['class' => 'btn btn-primary'])?></span>
   </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_id',
            'Customer_name',
            'address',
            'contact_num',
            'age',
            //'payment',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Customers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'customer_id' => $model->customer_id]);
                 }
            ],
        ],
    ]); ?>


</div>
