<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AdminAppAsset;
use app\assets\BootstrapPluginAsset;
use app\components\SectionBlock;

AdminAppAsset::register($this);

$action = Yii::$app->controller->action->id;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div id="wrapper">
        <div id="content">
            <div class="c1">
                <div class="controls">
                    <nav class="links">
                        <ul>
                            <li><a href="#" class="ico1">Messages <span class="num">26</span></a></li>
                            <li><a href="#" class="ico2">Alerts <span class="num">5</span></a></li>
                            <li><a href="#" class="ico3">Documents <span class="num">3</span></a></li>
                        </ul>
                    </nav>
                    <div class="profile-box">
                        <span class="profile">
                            <a href="#" class="section">
                                <img class="image" src="images/admin/img1.png" alt="image description" width="26" height="26" />
                                <span class="text-box">
                                    Welcome
                                    <strong class="name">Asif Aleem</strong>
                                </span>
                            </a>
                            <a href="#" class="opener">opener</a>
                        </span>
                        <a href="#" class="btn-on">On</a>
                    </div>
                </div>
				<?=$content?>
            </div>
        </div>
        <aside id="sidebar">
            <strong class="logo"><a href="#">lg</a></strong>
            <ul class="tabset buttons">
                <li class="active">
                    <a href="#tab-1" class="ico1"><span>Dashboard</span><em></em></a>
                    <span class="tooltip"><span>Dashboard</span></span>
                </li>
                <li>
                    <a href="#tab-2" class="ico2"><span>Gallery</span><em></em></a>
                    <span class="tooltip"><span>Gallery</span></span>
                </li>
                <li>
                    <a href="#tab-3" class="ico3"><span>Pages</span><em></em></a>
                    <span class="tooltip"><span>Pages</span></span>
                </li>
                <li>
                    <a href="#tab-4" class="ico4"><span>Widgets</span><em></em></a>
                    <span class="tooltip"><span>Widgets</span></span>
                </li>
                <li>
                    <a href="#tab-5" class="ico5"><span>Archive</span><em></em></a>
                    <span class="tooltip"><span>Archive</span></span>
                </li>
                <li>
                    <a href="#tab-6" class="ico6">
                        <span>Comments</span><em></em>
                    </a>
                    <span class="num">11</span>
                    <span class="tooltip"><span>Comments</span></span>
                </li>
                <li>
                    <a href="#tab-7" class="ico7"><span>Plug-in</span><em></em></a>
                    <span class="tooltip"><span>Plug-in</span></span>
                </li>
                <li>
                    <a href="#tab-8" class="ico8"><span>Settings</span><em></em></a>
                    <span class="tooltip"><span>Settings</span></span>
                </li>
            </ul>
            <span class="shadow"></span>
        </aside>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
