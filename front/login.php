<div class="rb ct mytitle p-10">管理登入</div>
<table class="ct">
    <tr>
        <td>
            帳號：
        </td>
        <td>
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td>
            密碼：
        </td>
        <td>
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="登入" onclick="login()">
</div>

<script>
    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();  
        
        $.get('./api/login.php',{acc,pw},(res)=>{
            if(parseInt(res) == 1){
                to('./back.php');
            }else{
                alert('帳號或密碼錯誤');
                reset();
            }
        })
    }
</script>