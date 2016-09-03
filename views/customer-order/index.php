<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Заказы';
?>

<?= GridView::widget([
    'tableOptions' => ['class' => 'mytable'],
    'rowOptions' => function ($model, $key, $index, $grid) {
        if ( ($model['id'] % 2) == 1)
        {
            return ['class' => 'grid-viewodd'];
        }
        else
        {
            return ['class' => 'grid-view'];
        }
    },
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute'=>'number',
            'label'=>'Номер заказа',
            'value'=>'number',
        ],
        [
            'attribute'=>'order_date',
            'label'=>'Дата заказа',
            'value'=>'order_date',
        ],
        [
            'attribute'=>'sum',
            'label'=>'Сумма заказа',
            'value'=>'sum',
        ],
        [
            'attribute'=>'customer_name',
            'label'=>'ФИО клиента',
            'value'=>'customer.Name',
        ],
      ],
]);
?>

