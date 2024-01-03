<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup" >
    <h1><font style="color: black;"><?= Html::encode($this->title) ?></font></h1>

    <p><font style="color: black;">Please fill out the following fields to signup:</font></p>


    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning border-warning mb-3">
                <div class="card-header bg-Dark"><font style="color: black;"><?= Html::encode($this->title) ?></font></div>
                    <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password_hash')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
