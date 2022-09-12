<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists d-f a-c j-c" style="height: 70%;">
            <?php
            $posters = $Poster->all(['sh'=>1]," ORDER BY `rank`");
            foreach ($posters as $key => $poster) {
            ?>
            <div class=" poster_item d-n" data-ani="<?=$poster['ani']?>">
                <img src="./img/<?=$poster['img']?>" alt="" style="height: 250px;">
                <div class="ct"><?=$poster['name']?></div>
            </div>
            <?php
            }
            ?>
            </div>
            <div class="controls d-f a-c" style="height: 30%;">
            <div class="preBtn cup" onclick="move('left')"></div>
            <div class="controls_nav overh d-f a-c p-r">
                <div class="icons d-f a-c p-a">
                <?php
                foreach ($posters as $key => $poster) {
                ?>
                <div class="icon_item p-10 d-f a-c cup" onclick="ani(<?=$key?>)">
                <img src="./img/<?=$poster['img']?>" alt="" style="height: 80px;">
                </div>
                <?php
                }
                ?>
                </div>
            </div>
            <div class="nextBtn cup" onclick="move('right')"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>

<script>
    $('.poster_item').eq(0).show();


    let aniEvent = setInterval(()=>{
        ani();
    },4000);


    function ani(num){
        let now = $('.poster_item:visible');
        let next ;


        if(num == undefined){

            if($(now).next().length == 0){
                next = $('.poster_item').eq(0);
            }else{
                next = $(now).next();
            }
        }else{
            next = $('.poster_item').eq(num);
        }


        let ani = $(next).data('ani');


        switch (ani) {
            case 1:
                
                $(now).fadeOut(1500,()=>{
                    $(next).fadeIn(2000);
                })

            break;

            case 2:
                
                $(now).slideUp(2000,()=>{
                    $(next).slideDown(2000);
                })

            break;

            case 3:
                
                $(now).hide(2000,()=>{
                    $(next).show(2000);
                })

            break;

        }

    }


    let page = 0;

    function move(type)
    {
        let nowLeft = $('.icons').css('left').split('px')[0];
        let num = <?=count($posters);?>;
        let pages = parseInt(num)-4;
        let move;


        switch (type) {
            case 'left':
                if(page >= 0 && page < pages){
                    page++;
                    move = parseInt(nowLeft)-90;
                }
            break;

            case 'right':
                if(page > 0 ){
                    page--;
                    move = parseInt(nowLeft)+90;
                }
            break;
        
        }

        $('.icons').animate({left:move});
    }


    $('.icon_item').hover(function(){

        clearInterval(aniEvent);

    },function(){
        aniEvent = setInterval(()=>{
        ani();
    },3000);
    })
</script>