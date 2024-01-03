<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */

$this->title = 'Update Book: ' . $model->book_title;
$this->params['breadcrumbs'][] = ['label' => 'Bs Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bs-book-update">

<div class="row">
    <div class="col-12">
        <div class="card card-info border-warning mb-3">
            <div class="card-header bg-warning"><?= Html::encode($this->title) ?></div>
            <div class="card-body">
                <?= $this->render('_form', [
                    'model' => $model,
                    'initialPreview'=> $initialPreview,
                    'initialPreviewConfig'=> $initialPreviewConfig,
                    'categories'=>$categories,
                ]) ?>
            </div>
        </div>
    </div>
</div>
