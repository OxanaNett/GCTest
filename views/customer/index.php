<?php
use yii\grid\GridView;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
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
    'columns' => [
        [
            'format' => 'image',
            'label' => '',
            'value' => function ($model) {
                return $model->getImageUrl();
            },
        ],
        [
            'attribute'=>'customer_name',
            'label'=>'ФИО клиента',
            'value'=>'Name',
        ],
        [
            'attribute'=>'last_order',
            'label'=>'Последний заказ',
            'value' => function ($model, $key, $index, $widget) {
                $arr =['number'=> "№".$model->getLastOrder()->number,
                    'data' => $model->getLastOrder()->order_date,
                    'summa' => $model->getLastOrder()->sum,
                ];
                $separated = implode(" ", $arr);
                return $separated;
            }
        ],
        [
            'attribute'=>'order_amount',
            'label'=>'Всего заказов',
            'value'=>'ordersAmount',
        ],
        [
            'attribute'=>'order_sum',
            'label'=>'Сумма заказов',
            'value'=>'ordersSumm',
        ],
        [
            'attribute'=> 'status',
            'label'=>'Статус клиента',
            'value' =>'status.name',

        ],
        [   'attribute'=> 'Reg Date',
            'label'=>'Зарегистрирован',
            'value' =>'reg_date',
        ],
    ],
]);
?>



