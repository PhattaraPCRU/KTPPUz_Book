<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\BsCategory $model */

$this->title = 'Update Category: ' . $model->cate_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cate_id, 'url' => ['view', 'cate_id' => $model->cate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bs-category-update">
    <div class="row">
        <div class="col-12">
            <div class="card card-info border-warning mb-3">
                <div class="card-header bg-warning"><?= Html::encode($this->title) ?></div>
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
