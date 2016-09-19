<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);

define('FILTER_PARAM', 'filter');

function getUrlWithFilterByRequest(yii\web\Request $request, $filter) {
    $params = $_GET;
    $params[FILTER_PARAM] = $filter;
    return $_SERVER['PHP_SELF'].'?'.http_build_query($params);
}

function isFilteredBy($filter) {
    $categories = ["Новый клиент", "Постоянный покупатель", "VIP клиент"];
    if ($filter == '' && (!array_key_exists(FILTER_PARAM, $_GET) || !in_array($_GET[FILTER_PARAM], $categories))) {
        return true;
    }

    if (!array_key_exists(FILTER_PARAM, $_GET)) {
        return false;
    }

    return $filter == $_GET[FILTER_PARAM];
}
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
</head>
<?php $this->beginBody() ?>
<div class="container-fluid bs-cont">
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid bs-head">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/web/index.php/customer-order/index">Заказы</a></li>
                        <li><a href="/web/index.php/customer/index"><span class="new">Клиенты</span></a></li>
                    </ul>
                    <div class="navbar-header">
                        <li class="logo">
                            <a href="#">
                                <img src="<?=Yii::$app->request->baseUrl; ?>/img/logo.JPG" />
                            </a>
                        </li>
                    </div>
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'nav navbar-nav navbar-right'],
                        'items' => [
                            Yii::$app->user->isGuest ? (
                            ['label' => 'Выйти'.Html::img(Yii::$app->request->baseUrl.'/img/logout.PNG') ,
                                'url' => ['/site/login']]
                            ) : (
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                . Html::submitButton(
                                    'Выйти (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link']
                                )
                                . Html::endForm()
                                . '</li>'
                            )
                        ],
                        'encodeLabels' => false,
                    ]);
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->

            <div class="panel-body">
                <ul class="nav navbar-filtr">
                    <li <?php if (isFilteredBy('')) { ?>class="active"<?php } ?>>
                        <a href="<?= getUrlWithFilterByRequest(Yii::$app->request, '') ?>"><span>Все клиенты</span></a>
                    </li>
                    <li <?php if (isFilteredBy('Новый клиент')) { ?>class="active"<?php } ?>>
                        <a href="<?= getUrlWithFilterByRequest(Yii::$app->request, 'Новый клиент') ?>"><span class="new">Новые</span></a>
                    </li>
                    <li <?php if (isFilteredBy('Постоянный покупатель')) { ?>class="active"<?php } ?>>
                        <a href="<?= getUrlWithFilterByRequest(Yii::$app->request, 'Постоянный покупатель') ?>"><span class="usual">Постоянные</span></a>
                    </li>
                    <li <?php if (isFilteredBy('VIP клиент')) { ?>class="active"<?php } ?>>
                        <a href="<?= getUrlWithFilterByRequest(Yii::$app->request, 'VIP клиент') ?>"><span class="vip">VIP клиенты</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row">
        <?= $content ?>
    </div>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>