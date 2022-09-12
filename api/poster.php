<?php
include('./base.php');

if(isset($_POST['id'])){

foreach ($_POST['id'] as $key => $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Poster->del($id);
    }else{
        $poster = $Poster->find($id);

        $poster['name'] = $_POST['name'][$key];
        $poster['ani'] = $_POST['ani'][$key];
        $poster['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

        $Poster->save($poster);
    }
}

}else{

if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){

move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
$poster['img'] = $_FILES['img']['name'];

$poster['sh'] = 1;
$poster['ani'] = rand(1,3);
$poster['name'] = $_POST['name'];
$poster['rank'] = $Poster->math('MAX','rank')+1;

$Poster->save($poster);
}

}

to('../back.php?do=poster');
?>