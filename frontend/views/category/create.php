<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\BsCategory $model */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Bs Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-category-create">
    <div class="row">
        <div class="col-12">
            <div class="card card-info border-info mb-3">
                <div class="card-header bg-info"><?= Html::encode($this->title) ?></div>
                <div class="card-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
