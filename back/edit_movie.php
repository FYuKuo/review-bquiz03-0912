<?php
$movie = $Movie->find($_GET['id']);
$year = explode('-',$movie['date'])[0];
$month = explode('-',$movie['date'])[1];
$day = explode('-',$movie['date'])[2];
?>
<div class="grey0 p-10">
    <div class="mytitle rb my-5 ct">修改電影資料</div>

    <form action="./api/movie.php" method="post" enctype="multipart/form-data">
    <div class="d-f w-80 aut">
        <div class="w-20">
            影片資料
        </div>

        <div class="w-80 grey1">
            <table class="w-100">
                <tr>
                    <td>片名：</td>
                    <td><input type="text" name="name" id="name" style="width: 95%;" value="<?=$movie['name']?>"></td>
                </tr>
                <tr>
                    <td>分級：</td>
                    <td>
                        <select name="type" id="type">
                            <option value="1"<?=(1 == $movie['type'])?'selected':''?>>普遍級</option>
                            <option value="2"<?=(2 == $movie['type'])?'selected':''?>>保護級</option>
                            <option value="3"<?=(3 == $movie['type'])?'selected':''?>>輔導級</option>
                            <option value="4"<?=(4 == $movie['type'])?'selected':''?>>限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>片長：</td>
                    <td><input type="text" name="time" id="time" style="width: 95%;" value="<?=$movie['time']?>"></td>
                </tr>
                <tr>
                    <td>上映日期：</td>
                    <td>
                        <select name="year" id="year">
                            <option value="2022" <?=(2022==$year)?'selected':''?>>2022</option>
                            <option value="2023" <?=(2023==$year)?'selected':''?>>2023</option>
                        </select>
                        <select name="month" id="month">
                            <?php
                            for ($i=1; $i <= 12; $i++) { 
                            ?>
                            <option value="<?=$i?>" <?=($i==$month)?'selected':''?>><?=$i?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <select name="day" id="day">
                            <?php
                            for ($i=1; $i <= 31; $i++) { 
                            ?>
                            <option value="<?=$i?>" <?=($i==$day)?'selected':''?>><?=$i?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>發行商：</td>
                    <td><input type="text" name="pub" id="pub" style="width: 95%;" value="<?=$movie['pub']?>"></td>
                </tr>
                <tr>
                    <td>導演：</td>
                    <td><input type="text" name="dir" id="dir" style="width: 95%;" value="<?=$movie['dir']?>"></td>
                </tr>
                <tr>
                    <td>預告影片：</td>
                    <td><input type="file" name="movie" id="movie">
                    <div class="red fs-12">檔案請使用英文檔名</div>
                </td>
                </tr>
                <tr>
                    <td>電影海報：</td>
                    <td><input type="file" name="img" id="img">
                    <div class="red fs-12">檔案請使用英文檔名</div>
                </td>
                </tr>
            </table>
        </div>
    </div>
<br>
    <div class="d-f w-80 aut">
        <div class="w-20">
            影片資料
        </div>
        <div class="w-80">
            <textarea name="intro" id="intro" cols="30" rows="2" style="width: 95%;"><?=$movie['intro']?></textarea>
        </div>
    </div>

    <div class="ct my-5">
        <input type="hidden" name="id" value="<?=$movie['id']?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
    </form>
</div>   