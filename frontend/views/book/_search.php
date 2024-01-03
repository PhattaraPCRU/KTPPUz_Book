<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\BsBookSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div >

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'book_isbn') ?>

    <?= $form->field($model, 'book_title') ?>

    <?= $form->field($model, 'book_writer') ?>

    <?= $form->field($model, 'book_publishing') ?>

    <?= $form->field($model, 'book_pages') ?>

    <?php // echo $form->field($model, 'book_cost') ?>

    <?php // echo $form->field($model, 'book_price') ?>

    <?php // echo $form->field($model, 'book_total') ?>

    <?php // echo $form->field($model, 'book_note') ?>

    <?php // echo $form->field($model, 'book_date') ?>

    <?php // echo $form->field($model, 'book_pic') ?>

    <?php // echo $form->field($model, 'cate_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
