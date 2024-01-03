<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */

$this->title = $model->book_title;
$this->params['breadcrumbs'][] = ['label' => 'Book', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bs-book-view">
    <p> 
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'book_isbn' => $model->book_isbn], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'book_isbn' => $model->book_isbn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-12">
            <div class="card card-info border-info mb-3">
                <div class="card-header bg-info"><?= Html::encode($this->title) ?></div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'book_isbn',
                            'book_title',
                            'book_writer:ntext',
                            'book_publishing',
                            'book_pages',
                            'book_cost',
                            'book_price',
                            'book_total',
                            'book_note:ntext',
                            'book_date',
                            [
                                'attribute' => 'book_pic',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img(Yii::getAlias('@web') . '/pic/' . $model->book_pic, ['width' => '150px']);
                                }
                            ],
                            
                            [
                                'attribute' => 'cate_id',
                                'value' => function ($model) {
                                    return $model->category->cate_name;
                                }
                            ],

                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>