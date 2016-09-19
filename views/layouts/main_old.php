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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Одежда Мастер',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    ActiveForm::begin(
        [
            'action' =>['main/search'],
            'method' =>'get',
            'options' =>[
                'class' =>'navbar-form navbar-left'
            ]
        ]
    );
    echo '<div class="input-group input-group-sn">';
    echo Html::input(
        'type:text',
        'search',
        '',
        [
            'placeholder' => 'Поискпо клиентам',
            'class' =>'customer'
        ]
    );
    echo '<span class="input-group-btn">';
    echo Html::submitButton(
        '<span class="glyphicon glyphicon-search"></span>',
        [
            'class'=>'btn btn-success'
        ]
    );
    echo '</span></div>';
    ActiveForm::end();
    echo Nav::widget([

        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [


            ['label' => 'Заказы', 'url' => ['/customer-order/index']],
            ['label' => 'Клиенты', 'url' => ['/customer/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Выйти', 'url' => ['/site/login']]
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
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
