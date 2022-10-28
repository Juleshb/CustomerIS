<?php

use app\models\service;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\serviceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

<div class="jumbotron text-center bg-transparent">
       

        
        <span><?=Html::a('Customers',['/customers'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Employee',['/employee'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Transaction',['/transaction'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Bill',['/bill'], ['class' => 'btn btn-primary'])?></span>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'service_id',
            'treatment',
            'quantity',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, service $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'service_id' => $model->service_id]);
                 }
            ],
        ],
    ]); ?>


</div>
