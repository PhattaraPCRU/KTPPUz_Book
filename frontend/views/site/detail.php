<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */

$this->title = $model->book_title;
\yii\web\YiiAsset::register($this);
?>
<div style="width: 45%;">
    <div class="h-100 p-5 bg-light border rounded-3">
        <div class="row align-items-md-stretch">
            <img src="<?= Yii::getAlias('@web') . '/pic/' . $model->book_pic ?>" class="card-img-top" alt="..."
                style="width: 45%;">
            <div class="col-md-6">
                <h3><?= $model->book_title ?></h3>
                <p>สำนักพิมพ์ <?= $model->book_publishing ?></p> 
                <p>หมวดหมู่ <?= $model->category->cate_name ?></p> 
                <p>ผู้แต่ง <?= $model->book_writer ?></p>
                <p>จำนวน <?= $model->book_pages ?> หน้า</p>
                <p>เหลือ <?= $model->book_total ?> เล่ม</p>
                <a href="#" class="btn btn-warning">฿ <?= $model->book_price?></a>
            </div>
            <div> <br><br>
                <p style="width:600px;"><?= $model->book_note ?></p>
            </div>
        </div>
    </div>
</div>

</div>