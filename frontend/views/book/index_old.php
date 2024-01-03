<?php

use frontend\models\BsBook;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\BsBookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
     GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'book_isbn',
            'book_title',
            'book_writer:ntext',
            'book_publishing',
            'book_pages',
            //'book_cost',
            //'book_price',
            //'book_total',
            //'book_note:ntext',
            //'book_date',
            //'book_pic',
            //'cate_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BsBook $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'book_isbn' => $model->book_isbn]);
                 }
            ],
        ],
    ]); 
    ?>
    <div class="card" style="width: 18rem;">
        <img src="../image/345.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

    
