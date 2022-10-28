<?php

use app\models\employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\employeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

<div class="jumbotron text-center bg-transparent">
       

        
        <span><?=Html::a('Customers',['/customers'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Transaction',['/transaction'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Service',['/service'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Bill',['/bill'], ['class' => 'btn btn-primary'])?></span>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_id',
            'employee_name',
            'employee_num',
            'address',
            'salary',
            //'job_tittle',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, employee $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'employee_id' => $model->employee_id]);
                 }
            ],
        ],
    ]); ?>


</div>
