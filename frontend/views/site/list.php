<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var frontend\models\BsBook $model */
/** @var frontend\models\BsBookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */



?>
<div class="bs-Book-view">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <?= 
    $selection = Yii::$app->request->get('selection');
    ?>

    <!-- <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'item',
    ]);
    ?> -->
</div>