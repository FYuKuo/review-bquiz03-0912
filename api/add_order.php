<?php
include('./base.php');
$_POST['no'] = $todayF. str_pad(($Order->math('max','id')+1),4,0,STR_PAD_LEFT);
$_POST['sets'] = serialize($_POST['sets']);
$Order->save($_POST);
echo $_POST['no'];
?>