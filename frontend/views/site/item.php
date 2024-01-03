<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>


<div class="col-lg-2">
    <div class="card" style="width: 18rem;">
        <img src="<?= Yii::getAlias('@web') . '/pic/' . $model->book_pic ?>" class="card-img-top" alt="..." style="width: 70%;">
        <div class="">
            <a href="<?= Url::to(['/site/detail', 'book_isbn' => $model->book_isbn]) ?>" class="card-title">
                <font style="font-size: 17px;"><?= $model->book_title ?></font>
            </a> <br>
            <a href="#" class="card-title"><?= $model->category->cate_name ?></a><br>
            <a class="card-text">เหลือ <?= $model->book_total?> เล่ม</a><br>
            <a href="#" class="btn btn-warning" >฿ <?= $model->book_price?></a>
        </div>
    </div>
</div>