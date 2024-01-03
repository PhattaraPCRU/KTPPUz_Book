<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\BsCategory $model */

$this->title = $model->cate_id;
$this->params['breadcrumbs'][] = ['label' => 'Bs Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bs-category-view">
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'cate_id' => $model->cate_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'cate_id' => $model->cate_id], [
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
                        'cate_id',
                        'cate_name',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
</div>
