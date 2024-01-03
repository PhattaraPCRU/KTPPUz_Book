<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4" style="display: <?= !empty($model->id) ? 'none' : '';?>">
            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropdownList($model::ArrayStatus(),['prompt'=>'เลือก']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'cus_status')->dropdownList($model::ArrayCusStatus(),['prompt'=>'เลือก']) ?>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="d-grid gap-2">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
    </div>
   

    <?php ActiveForm::end(); ?>

</div>
