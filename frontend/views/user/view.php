<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                            'id',
                            'username',
                            // 'auth_key',
                            // 'password_hash',
                            // 'password_reset_token',
                            'email:email',
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->statusValue;
                                }
                            ],
                            // 'created_at',
                            // 'updated_at',
                            // 'verification_token',
                            'fullname',
                            'address',
                            'tel',
                            [
                                'attribute' => 'cus_status',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->custStatus;
                                }
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

   

</div>
