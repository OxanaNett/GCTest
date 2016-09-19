<?php

use yii\grid\GridView;

$this->title = 'Заказы';
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th colspan="2">ФИО</th>
        <th>Последний заказ</th>
        <th>Всего заказов</th>
        <th>Сумма заказов</th>
        <th>Статус клиента</th>
        <th>Зарегистрирован</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td width="70px">
            <div class="bd_name">
                <div class="bd_item bd_item_new">
                    <img class="avatar" src="avatar2.png" alt="...">
                </div>
            </div>
        </td>
        <td >
            <div class="name">
                Петров Петр Петрович
            </div>
        </td>
        <td>Последний заказ</td>
        <td><span class="label label-info">1</span></td>
        <td>Сумма заказов</td>
        <td><i class="new_one"></i><span>Новый</span></td>
        <td>Зарегистрирован</td>
    </tr>
    <tr>
        <td width="70px">
            <div class="bd_name">
                <div class="bd_item bd_item_vip">
                    <img class="avatar" src="img\avatar2.png" alt="...">
                </div>
            </div>
        </td>
        <td >
            <div class="name">
                Петров Петр Петрович
            </div>
        </td>
        <td>Последний заказ</td>
        <td><span class="label label-info">1</span></td>
        <td>Сумма заказов</td>
        <td><i class="vip_one"></i><span>Новый</span></td>
        <td>Зарегистрирован</td>
    </tr>
    <tr>
        <td width="70px">
            <div class="bd_name">
                <div class="bd_item bd_item_usual">
                    <img class="avatar" src="img\avatar2.png" alt="...">
                </div>
            </div>
        </td>
        <td >
            <div class="name">
                Петров Петр Петрович
            </div>
        </td>
        <td>Последний заказ</td>
        <td><span class="label label-info">1</span></td>
        <td>Сумма заказов</td>
        <td><i class="usual_one"></i><span>Новый</span></td>
        <td>Зарегистрирован</td>
    </tr>
    </tbody>
</table>
<?= GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
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

