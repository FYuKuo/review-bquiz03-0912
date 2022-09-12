<?php
$order = $Order->find(['no'=>$_GET['no']]);
$sets = unserialize($order['sets']);
sort($sets);
?>

<div class="grey0 w-60 aut p-10 my-10">
        <table class="w-100">
            <tr class="grey2">
                <td colspan="2">
                    感謝您的訂購，您的訂單編號是：<?=$order['no']?>
                </td>
            </tr>

            <tr>
                <td class="grey3 w-30">電影名稱：</td>
                <td class="grey1"><?=$Movie->find($order['movie'])['name']?></td>
            </tr>
            <tr>
                <td class="grey2">日期：</td>
                <td class="grey1"><?=$order['date']?></td>
            </tr>
            <tr>
                <td class="grey3">場次時間：</td>
                <td class="grey1"><?=$order['session']?></td>
            </tr>
            <tr class="grey1">
                <td colspan="2">
                    座位：<br>
                    <?php
                    foreach ($sets as $key => $set) {
                    ?>
                    <?=floor($set/5)+1?>排<?=floor($set%5)+1?>號 <br>
                    <?php
                    }
                    ?>
                    共<?=$order['qt']?>張電影票
                </td>
            </tr>
            <tr class="grey2">
                <td colspan="2" class="ct">
                    <input type="button" value="確定" onclick="to('./index.php')">
                </td>
            </tr>
        </table>
</div>