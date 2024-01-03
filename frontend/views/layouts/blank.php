<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Url;
// use common\widgets\Alert;
// use frontend\assets\AppAsset;
// use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
// use yii\bootstrap5\Nav;
// use yii\bootstrap5\NavBar;

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');

frontend\assets\ArgonAsset::register($this);

$current_url = $this->context->route;
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
<body class="">
<?php $this->beginBody() ?>
    <div class="container position-sticky z-index-sticky top-0">
		<div class="row">
			<div class="col-12">
				<!-- Navbar -->
				<nav
					class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
					<div class="container-fluid">
						<a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
							Argon Dashboard 2
						</a>
						<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
							data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon mt-2">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</span>
						</button>
						<div class="collapse navbar-collapse" id="navigation">
							<ul class="navbar-nav mx-auto">
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
										href="../pages/dashboard.html">
										<i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
										Dashboard
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link me-2" href="../pages/profile.html">
										<i class="fa fa-user opacity-6 text-dark me-1"></i>
										Profile
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link me-2" href="../pages/sign-up.html">
										<i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
										Sign Up
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link me-2" href="../pages/sign-in.html">
										<i class="fas fa-key opacity-6 text-dark me-1"></i>
										Sign In
									</a>
								</li>
							</ul>
							<ul class="navbar-nav d-lg-block d-none">
								<li class="nav-item">
									<a href="https://www.creative-tim.com/product/argon-dashboard"
										class="btn btn-sm mb-0 me-1 btn-primary">Free Download</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>
		</div>
	</div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <?= $content ?>
                </div>
            </div>
        </section>
    </main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
