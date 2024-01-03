<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
use kartik\file\FileInput;
?>

<div class="user-form">
<br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="card card-warning border-warning mb-3"> 
        <br>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4" style="display: <?= !empty($model->id) ? 'none' : '';?>">
            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="d-grid gap-2">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
    </div>
   

    <?php ActiveForm::end(); ?>

</div>
