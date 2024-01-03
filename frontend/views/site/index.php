<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\widgets\ListView;

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'KTP_BookStore';

?>
<div class="site-index">
    <div class="p-4 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-1 text-center">
            <h1 class="display-4">
                <font style="color: white;">Welcome to KTPbook!</font>
            </h1>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3 ">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($searchModel, 'cate_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map($categories, 'cate_id', 'cate_name'),
                    'options' => ['placeholder' => 'เลือก'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-warning ']) ?>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
        
                <?php echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'item',
                    'options' => ['class' => 'row '],
                    'itemOptions' => ['tag' => false],
                    'layout' => '{items}{pager}',
                    'pager' => [
                        'class' => \yii\bootstrap5\LinkPager::class,
                        'options' => [
                            'class' => 'pagination justify-content-center',
                        ],
                    ],
                ]); ?>
        </div>

    </div>
</div>