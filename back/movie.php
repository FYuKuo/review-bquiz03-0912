<div class="grey0 p-10">
    <input type="button" value="新增電影" onclick="to('?do=add_movie')">
    <hr>
    <div class="movie_list overa">
        <?php
        $rows = $Movie->all(" ORDER BY `rank`");
        foreach ($rows as $key => $row) {
            $pre = (isset($rows[$key-1]['id']))?$rows[$key-1]['id']:$row['id'];
            $next = (isset($rows[$key+1]['id']))?$rows[$key+1]['id']:$row['id'];
        ?>
        <div class="white p-5 d-f my-5">
            <div class="d-f w-20 j-c a-c p-5">
                <img src="./img/<?=$row['img']?>" alt="" style="height: 100px;">
            </div>
            <div class="d-f w-20 j-c a-c">
                分級：<img src="./icon/03C0<?=$row['type']?>.png" alt="">
            </div>
            <div class="w-60 p-5">
                <div class="d-f">
                    <div class="w-33">片名：<?=$row['name']?></div>
                    <div class="w-33">片長：<?=$row['time']?></div>
                    <div class="w-33">上映時間：<?=$row['date']?></div>
                </div>
                <div style="text-align: right;" class="my-10">
                <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>,'movie')">
                <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>,'movie')">
                <input type="button" value="編輯" onclick="to('?do=edit_movie&id=<?=$row['id']?>')">
                <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'movie')">
                </div>
                <div>
                    劇情介紹：<?=$row['intro']?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>