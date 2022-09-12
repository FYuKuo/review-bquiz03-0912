﻿<?php
$movie = $Movie->find($_GET['id']);
switch ($movie['type']) {
    case 1:
        $type = '普遍級';
    break;
    case 2:
        $type = '保護級';
    break;
    case 3:
        $type = '輔導級';
    break;
    case 4:
        $type = '限制級';
    break;
    
}
?>
<div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="./img/<?=$movie['movie']?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px">
        <img src="./img/<?=$movie['img']?>" width="200px" height="250px" style="margin:10px; float:left">
            <p style="margin:3px">影片名稱 ： <?=$movie['name']?>
                <input type="button" value="線上訂票" onclick="to('?do=order&id=<?=$movie['id']?>')"
                    style="margin-left:50px; padding:2px 4px" class="b2_btu">
            </p>
            <p style="margin:3px">影片分級 ： <img src="./icon/03C0<?=$movie['type']?>.png"
                    style="display:inline-block;"><?=$type?>
            </p>
            <p style="margin:3px">影片片長 ： <?=$movie['time']?></p>
            <p style="margin:3px">上映日期 ： <?=$movie['date']?></p>
            <p style="margin:3px">發行商 ： <?=$movie['pub']?></p>
            <p style="margin:3px">導演 ： <?=$movie['dir']?></p>
            <br>
            <br>
            <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br>
                <?=$movie['intro']?>
            </p>
        </font>
        <table width="100%">
            <tbody>
                <tr>
                    <td class="ct"><input type="button" value="院線片清單" onclick="to('./index.php')"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>