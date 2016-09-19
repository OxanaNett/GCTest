<?php

function getStatusCssClass($status) {
    switch ($status) {
        case "Новый клиент":
            return "new_one";
        case "Постоянный покупатель":
            return "usual_one";
        case "VIP клиент":
            return "vip_one";
        default:
            return "";
    }
}
function getAvatarCssClass($status) {
    switch ($status) {
        case "Новый клиент":
            return "bd_item_new";
        case "Постоянный покупатель":
            return "bd_item_usual";
        case "VIP клиент":
            return "bd_item_vip";
        default:
            return "";
    }
}
?>
<div class="col-lg-3">
    <?php echo $this->render('_search',['model'=>$searchModel]); ?>
</div>
<div class="col-lg-3">

</div>

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
    <?php foreach($dataProvider->getModels() as $record) { ?>
    <tr>
        <td width="70px">
            <div class="bd_name">
                <div class="bd_item <?=getAvatarCssClass($record->status->name); ?>">
                    <img class="avatar" src="<?= $record->getImageUrl() ?>" alt="...">
                </div>
            </div>
        </td>
        <td >
            <div class="name">
                <?= $record->Name ?>
            </div>
        </td>
        <td>
            <div class="active"><span>№ <?= $record->getLastOrder()->number ?></span></div>
            <div><?= $record->getLastOrder()->order_date ?></div>
            <div><?= $record->getLastOrder()->sum ?></div>
        </td>
        <td>
            <span class="label label-info"><?= $record->ordersAmount ?></span>
        </td>
        <td>
            <?= $record->ordersSumm ?>р.
        </td>
        <td>
            <i class="<?=getStatusCssClass($record->status->name); ?>"></i><span><?= $record->status->name ?></span>
        </td>
        <td>
            <?= $record->reg_date ?>
        </td>
    </tr>
    <?php }
    ?>
    </tbody>
</table>






