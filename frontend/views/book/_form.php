<?php

use yii\helpers\Html;
use frontend\models\BsCategory;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bs-book-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_isbn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
             <?= $form->field($model, 'book_writer')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_publishing')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_pages')->textInput() ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_cost')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_total')->textInput() ?>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'book_note')->textarea(['rows' => 6]) ?>  
        </div>
    </div>  

<?php 
    echo $form->field($model, 'book_pic')->widget(FileInput::class, [
        'options' => [
            // 'name' => 'filess',
            'multiple' => false, 
            'accept' => 'image/*'
        ],
        'pluginOptions' => [
            'overwriteInitial'=>false,
            'initialPreviewAsData'=>true,
            'initialPreviewShowDelete'=>false,
            'initialPreviewFileType' => 'image',
            'previewFileType' => 'image',
            'showUpload' => false,
            'initialPreviewShowDelete' => false,
            'initialPreview'=> $initialPreview,
            'initialPreviewConfig'=> $initialPreviewConfig,
                    //'uploadUrl' => Url::to(['/photo-library/upload-ajax']),
            'uploadExtraData' => [
                'ref' => []/*$model->ref*/,
            ],
            'maxFileCount' => 1,
            'fileActionSettings'=>[
                'showUpload' => false,
                'showRotate' => false,
                'showRemove' => false,
                'removeClass'=>'btn btn-danger btn-xs',
                'zoomClass'=>'btn btn-info btn-xs',
                'downloadClass'=>'btn btn-xs btn-success'
            ],
        ]
    ]);
    ?>

    <?= $form->field($model, 'cate_id')->widget(Select2::class, [
                'data' => ArrayHelper::map($categories, 'cate_id', 'cate_name'),
                'options' => ['placeholder' => 'เลือก'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
