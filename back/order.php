<?php
$orders = $Order->all();
$movies = [];
foreach ($orders as $key => $order) {
    if(!in_array($order['movie'],$movies)){

        $movies[] = $order['movie'];
    }

}
?>

<div class="grey0 p-10 ">
    <div class="mytitle rb my-5 ct">訂單清單</div>
    <div class="my-5">
        快速刪除：<input type="radio" name="fastDel" class="fastDel" value="date" checked>依日期
        <input type="text" name="date" id="date">
        <input type="radio" name="fastDel" class="fastDel" value="movie">依電影
        <select name="movie" id="movie">
            <?php
            foreach ($movies as $key => $movie) {
            ?>
                <option value="<?=$movie?>"><?=$Movie->find($movie)['name']?></option>
            <?php
            }
            ?>
        </select>
        <input type="button" value="刪除" onclick="fast_del()">
    </div>

    <div class="d-f ct">
        <div class="w-15 grey1  mx-2">訂單編號</div>
        <div class="w-15 grey1  mx-2">電影名稱</div>
        <div class="w-15 grey1  mx-2">日期</div>
        <div class="w-15 grey1  mx-2">場次時間</div>
        <div class="w-15 grey1  mx-2">訂購數量</div>
        <div class="w-15 grey1  mx-2">訂購位置</div>
        <div class="w-15 grey1  mx-2">操作</div>
    </div>

    <div class="order_list overa ct">
    <?php
    $rows = $Order->all();
    foreach ($rows as $key => $row) {
        $sets = unserialize($row['sets']);
        rsort($sets);
    ?>
        <div class="d-f p-10 my-5 a-c order_item">
        <div class="w-15 mx-2"><?=$row['no']?></div>
        <div class="w-15 mx-2"><?=$Movie->find($row['movie'])['name']?></div>
        <div class="w-15 mx-2"><?=$row['date']?></div>
        <div class="w-15 mx-2"><?=$row['session']?></div>
        <div class="w-15 mx-2"><?=$row['qt']?></div>
        <div class="w-15 mx-2">
                     <?php
                    foreach ($sets as $key => $set) {
                    ?>
                    <?=floor($set/5)+1?>排<?=floor($set%5)+1?>號 <br>
                    <?php
                    }
                    ?>
        </div>
        <div class="w-15 mx-2">
            <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'order')">
        </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>


<script>

    function fast_del(){

        let type = $('.fastDel:checked').val();
        let val = $(`#${type}`).val();
        let text = '';

        switch (type) {
            case 'date':
                text = val;
            break;

            case 'movie':
                text = $('#movie').children('option:selected').text();
            break;
        
        }

        let anser = confirm(`您確定要刪除 ${text} 的全部資料嗎?`);

        if(anser){
            $.post('./api/fast_del.php',{type,val},()=>{
                lo();
            })

        }

    }


</script>