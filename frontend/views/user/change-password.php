<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Change Password: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <div class="row">
        <div class="col-12">
            <div class="card card-info border-warning mb-3">
                <div class="card-header bg-warning"><?= Html::encode($this->title) ?></div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-4 offset-4">
                            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="d-grid gap-2">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>