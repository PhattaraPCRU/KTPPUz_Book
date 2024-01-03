<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Url;
// use common\widgets\Alert;
// use frontend\assets\AppAsset;
use frontend\assets\ArgonAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;

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
	<title>
		<?= Html::encode($this->title) ?>
	</title>
	<?php $this->head() ?>
</head>

<body class="g-sidenav-show   bg-gray-100">
	<?php $this->beginBody() ?>
	<div class="min-height-250 bg-warning position-absolute w-100"></div>
	<aside
		class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
		id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
				aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
				target="_blank">

				<span class="ms-1 font-weight-bold">
					<font style="font-size: 25px;">KTP Bookstore</font>
				</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0" />
		<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<?php if (Yii::$app->user->isGuest): ?>

					<li class="nav-item mt-3">
						<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
							Home pages
						</h6>
						
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $current_url == '/site/index' ? 'active' : '' ?>"
							href="<?= Url::to(['/site/index']) ?>">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-app text-info text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Home</span>
						</a>
						
					</li>
					<li class="nav-item mt-3">
						<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
							Account pages
						</h6>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= Url::to(['site/login']) ?>" >
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Login</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= Url::to(['site/signup']) ?>" data-method="post">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-collection text-info text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Register</span>
						</a>
					</li>

				<?php else: ?>
					<?php if (Yii::$app->user->identity->cus_status == 1): ?>
						<li class="nav-item mt-3">
							<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
								Home pages
							</h6>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= $current_url == '/site/index' ? 'active' : '' ?>"
								href="<?= Url::to(['/site/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-app text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Home</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= $current_url == 'category/index' ? 'active' : '' ?>"
								href="<?= Url::to(['category/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Cate</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= $current_url == 'book/index' ? 'active' : '' ?>"
								href="<?= Url::to(['book/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Book</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= in_array($current_url, ['user/index', 'user/update', 'user/view', 'user/change-password', 'user/create']) ? 'active' : '' ?>"
								href="<?= Url::to(['user/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-credit-card text-success text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">User</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./pages/rtl.html">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">RTL</span>
							</a>
						</li>
						<li class="nav-item mt-3">
							<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
								Account pages
							</h6>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= Url::to(['admin/dashboard']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-settings-gear-65 text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Admin Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= Url::to(['site/logout']) ?>" data-method="post">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-collection text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Logout</span>
							</a>
						</li>
					<?php else: ?>
						<li class="nav-item mt-3">
							<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
								Home pages
							</h6>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= $current_url == '/site/index' ? 'active' : '' ?>"
								href="<?= Url::to(['/site/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-app text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Home</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= $current_url == '/site/index' ? 'active' : '' ?>"
								href="<?= Url::to(['/site/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-cart text-warning text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Cart</span>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link <?= $current_url == 'category/index' ? 'active' : '' ?>"
								href="<?= Url::to(['category/index']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Cate</span>
							</a>
						</li> -->
						<li class="nav-item mt-3">
							<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
								Account pages
							</h6>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= Url::to(['site/editme']) ?>">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-single-02 text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">User Profile</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= Url::to(['site/logout']) ?>" data-method="post">
								<div
									class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-collection text-info text-sm opacity-10"></i>
								</div>
								<span class="nav-link-text ms-1">Logout</span>
							</a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
			</ul>
		</div>
	</aside>

	<main class="main-content position-relative border-radius-lg">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
						<li class="breadcrumb-item text-sm">
							<a class="opacity-5 text-white" href="javascript:;">Pages</a>
						</li>
						<li class="breadcrumb-item text-sm text-white active" aria-current="page">
							Dashboard
						</li>
					</ol>
					<h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
				</nav>
				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<div class="ms-md-auto pe-md-3 d-flex align-items-center">
						<div class="input-group">
							<!-- <span class="input-group-text text-body"><i class="fas fa-search"
									aria-hidden="true"></i></span>
							<input type="text" class="form-control" placeholder="Type here..." /> -->
						</div>
					</div>
					<ul class="navbar-nav justify-content-end">
						<li class="nav-item d-flex align-items-center">
							<?php if (!Yii::$app->user->isGuest): ?>
								<a href="<?= Url::to(['site/login']) ?>" class="nav-link text-white font-weight-bold px-0">
									<i class=""></i> <br>
									<span class="d-sm-inline d-none">
										Name :
										<?= Yii::$app->user->identity->username ?>
									</span>
								</a>
							<?php endif; ?>
						</li>
						<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line bg-white">asd</i>
									<i class="sidenav-toggler-line bg-white">asd</i>
									<i class="sidenav-toggler-line bg-white">asd</i>
								</div>
							</a>
						</li>

						<li class="nav-item dropdown pe-2 d-flex align-items-center">

							<ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
								aria-labelledby="dropdownMenuButton">
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<img src="./assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">New message</span>
													from Laur
												</h6>
												<p class="text-xs text-secondary mb-0">
													<i class="fa fa-clock me-1"></i>
													13 minutes ago
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<img src="./assets/img/small-logos/logo-spotify.svg"
													class="avatar avatar-sm bg-gradient-dark me-3" />
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">New album</span> by
													Travis Scott
												</h6>
												<p class="text-xs text-secondary mb-0">
													<i class="fa fa-clock me-1"></i>
													1 day
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<?= $content ?>
			<footer class="footer pt-3">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								©
								<script>
									document.write(new Date().getFullYear());
								</script>
								, made with <i class="fa fa-heart"></i> by
								<a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
									Tim</a>
								for a better web.
							</div>
						</div>

					</div>
				</div>
			</footer>
		</div>


	</main>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
