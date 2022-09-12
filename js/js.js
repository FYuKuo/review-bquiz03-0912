function lo(){
    location.reload();
}

function to(url){
    location.href=`${url}`
}

function del(id,table){
    $.post('./api/del.php',{id,table},()=>{
        lo();
    })
}

function sh(id,sh,table){
    $.post('./api/sh.php',{id,sh,table},()=>{
        lo();
    })
}

function rank(id,chId,table){
    $.post('./api/rank.php',{id,chId,table},()=>{
        lo();
    })
}

function reset(){
    $('input[type=text],input[type=password]').val('');
}