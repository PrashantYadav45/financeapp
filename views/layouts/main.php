<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
use app\assets\AppAsset;
use yii\helpers\Url;

//Use if condition to recognize the page is login page or not.


//AppAsset::register($this);
//$asset = app\assets\AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Custom CSS -->
      <?php $this->registerCssFile("@web/css/custom.css"); ?>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <!-- Morris.js charts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <!-- daterangepicker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
</head>
<body class="skin-purple">
<?php $this->beginBody() ?>
<?php 
if (\Yii::$app->controller->action->id === 'login') {
    $asset = app\assets\AppAssetLogin::register($this);
	$baseUrl = $asset->baseUrl;
?>
<div class="wrap">
     <?php echo $this->render('../site/login.php', ['baseUrl' => $baseUrl]); ?>
    <div class="control-sidebar-bg"></div>
</div>

<?php 
}else{
	AppAsset::register($this);
   $asset = app\assets\AppAsset::register($this);
   $baseUrl = $asset->baseUrl;
  ?>

<div class="wrap">
    <?php echo $this->render('header.php', ['baseUrl' => $baseUrl]); ?>
    <?php echo $this->render('leftmenu.php', ['baseUrl' => $baseUrl]); ?>
    <?php echo $this->render('content.php', ['content' => $content]); ?>
    <?php echo $this->render('footer.php', ['baseUrl' => $baseUrl]); ?>
    <?php echo $this->render('rightside.php', ['baseUrl' => $baseUrl]); ?>

    <div class="control-sidebar-bg"></div>
</div>
<?php }?>
<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?php //= date('Y') ?></p>

        <p class="pull-right"><?php //= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
