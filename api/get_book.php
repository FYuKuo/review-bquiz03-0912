<?php
include('./base.php');
$set = [];
$orders = $Order->all(['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$_GET['session']]);
foreach ($orders as $key => $order) {
    $set = array_merge($set,unserialize($order['sets']));
}
?>

<div class="book_bg aut">
    <div class="set_group aut d-f f-w">
        <?php
        for ($i=0; $i < 20; $i++) { 
        ?>
        <?php
        if(in_array($i,$set)){
        ?>
        <div class="set_item hasPeople">
            <div class="ct">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
            <div style="text-align: right;">
                
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="set_item">
            <div class="ct">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
            <div style="text-align: right;">
                <input type="checkbox" class="mySet" name="set[]" value="<?=$i?>">
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        }
        ?>
    </div>
</div>

<div class="ct rb ">
    <div>您選擇的電影是：<?=$Movie->find($_GET['movie'])['name']?></div>
    <div>您選擇的時刻是：<?=$_GET['date']?> <?=$_GET['session']?></div>
    <div>您已經勾選 <span class="qt">0</span> 張票，最多可以購買四張票</div>
    <div>
        <input type="button" value="上一步" onclick="$('.order,.book').toggle(),$('.book').html('')">
        <input type="button" value="訂購" onclick="checkout()">
    </div>
</div>

<script>
    function checkout(){
        let movie = '<?=$_GET['movie']?>';
        let date = '<?=$_GET['date']?>';
        let session = '<?=$_GET['session']?>';
        let qt = setArr.length;
        

        $.post('./api/add_order.php',{movie,date,session,qt,sets:setArr},(no)=>{
            to(`?do=result&no=${no}`);
        })


    }
</script>