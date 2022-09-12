<div class="grey0 p-10 ">
    <div class="mytitle rb my-5 ct">訂單清單</div>
    <div class="my-5">
        快速刪除：<input type="radio" name="fastDel" class="fastDel" value="date" checked>依日期
        <input type="text" name="date" id="date">
        <input type="radio" name="fastDel" class="fastDel" value="movie">依電影
        <select name="movie" id="movie">
            <?php
            ?>
            <?php
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
    ?>
        <div class="d-f p-5">
        <div class="w-15 mx-2">訂單編號</div>
        <div class="w-15 mx-2">電影名稱</div>
        <div class="w-15 mx-2">日期</div>
        <div class="w-15 mx-2">場次時間</div>
        <div class="w-15 mx-2">訂購數量</div>
        <div class="w-15 mx-2">訂購位置</div>
        <div class="w-15 mx-2">操作</div>
        </div>
    <?php
    }
    ?>
    </div>
</div>