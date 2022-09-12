<?php
$id = ($_GET['id'])??0;
?>

<div class="order">
    <div class="mytitle rb my-5 ct">線上訂票</div>
    
    <div class="grey0 w-60 aut ct p-10 my-10">
        <table class="w-100">
            <tr class="grey2 ">
                <td class="w-30">電影：</td>
                <td>
                    <select name="movie" id="movie" style="width: 95%;">
                    </select>
                </td>
            </tr>
            <tr class="grey3">
                <td>日期：</td>
                <td>
                    <select name="date" id="date" style="width: 95%;">
                    </select>
                </td>
            </tr>
            <tr class="grey2">
                <td>場次：</td>
                <td>
                    <select name="session" id="session" style="width: 95%;">
                    </select>
                </td>
            </tr>
            <tr class="grey3 ">
                <td colspan="2">
                    <input type="button" value="確定" onclick="book()">
                    <input type="button" value="重置" onclick="get_movie()">
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="book d-n">
    123
</div>


<script>
    get_movie();

    function get_movie(){
        let id = <?=$id;?>;

        $.get('./api/get_movie.php',{id},(res)=>{
            $('#movie').html(res);
            let movie = $('#movie').val();
            get_date(movie);
        })
    }

    function get_date(movie){

        $.get('./api/get_date.php',{movie},(res)=>{
            $('#date').html(res);
            let date = $('#date').val();

            get_session(movie,date)
        })
    }

    function get_session(movie,date){

        $.get('./api/get_session.php',{movie,date},(res)=>{
            $('#session').html(res);
        })
    }


    $('#movie').on('change',function(){
        let movie = $('#movie').val();
        get_date(movie); 
    })


    $('#date').on('change',function(){
        let movie = $('#movie').val();
        let date = $(this).val();
        get_session(movie,date);
    })

    function book(){
        let movie = $('#movie').val();
        let date = $('#date').val();
        let session = $('#session').val();

        $('.order').hide();
        $('.book').show();

        $.get('./api/get_book.php',{movie,date,session},(res)=>{
            $('.book').html(res);

            setEvent()
        })
    }


    let setArr = new Array();

    function setEvent(){

        $('.mySet').on('change',function(){


            if($(this).prop('checked') == true){

                if(setArr.length < 4){

                    setArr.push($(this).val());
                    $(this).parent().parent().addClass('hasPeople');
    
                }else{
                    $(this).prop('checked',false);
                    alert('最多僅能訂購四張票');
                }

            }else{

                setArr.splice(setArr.indexOf($(this).val()),1);
                $(this).parent().parent().removeClass('hasPeople');
            }

            $('.qt').text(setArr.length);
        })
    }
</script>

