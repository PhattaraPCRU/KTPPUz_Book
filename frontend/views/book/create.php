<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */

$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Bs Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-book-create">

    <div class="row">
        <div class="col-12">
            <div class="card card-info border-info mb-3">
                <div class="card-header bg-info"><?= Html::encode($this->title) ?></div>
                <div class="card-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'initialPreview'=> [],
                        'initialPreviewConfig'=>[],
                        'categories'=>$categories,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
