<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'KTPBook Store',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems =[['label' => 'Home', 'url' => ['/site/index']]];
    if (Yii::$app->user->isGuest) { // ถ้ายังไม่ได้ login
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }else{ // ถ้า login แล้ว
        if(Yii::$app->user->identity->cus_status == 1){ // ถ้าเป็น admin
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Category', 'url' => ['/category/index']],
                ['label' => 'Book', 'url' => ['/book/index']],
                ['label' => 'User', 'url' => ['/user/index']],
            ];
        }else{  // ถ้าเป็น user
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Products', 'url' => ['/site/sidenav']],
                ['label' => 'Cart', 'url' => ['/site/cart']],
                ['label' => 'My Order', 'url' => ['/site/myorder']],
                ['label' => 'Editme', 'url' => ['/site/editme']]
            ];
        }
        
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
