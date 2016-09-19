<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navbar-form navbar-left" role="search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'template' => '<div class="form-control-search">{input}</div><div>{error}</div>',
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default']) ?>
        <?= $form->field($model,'globalSearch', [
            'inputOptions' => ['class' => 'form-control-search']
        ])->textInput()->input('globalSearch', ['placeholder' => "Поиск по клиентам"])->label(false); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
