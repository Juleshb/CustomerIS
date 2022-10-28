<?php
use yii\helpers\html;
/** @var yii\web\View $this */

$this->title = 'CMS';
?>
<div class="site-index">

    

    <div class="jumbotron text-center bg-transparent">
    <h1 class="display-2">WELCOME TO CUSTOMER MANAGEMENT SYATEM</h1>

       
    </div>

    <div class="jumbotron text-center bg-transparent">
       

        
        <span><?=Html::a('Customers',['/customers'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Employee',['/employee'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Transaction',['/transaction'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Service',['/service'], ['class' => 'btn btn-primary'])?></span>
        <span><?=Html::a('Bill',['/bill'], ['class' => 'btn btn-primary'])?></span>
    </div>
</div>
