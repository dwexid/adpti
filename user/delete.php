<?php
    
    session_start();
    
    require_once("../functions.php");
    require_once("../model/model_pt.php");
    require_once("../model/model_jurusan.php");
    require_once("../model/model_tempat.php");


    $id = $_GET['id'];

    $del = $pt->delete($id);
    
    if($del){
        
        header("location: ".base_url());
    }else{
        
        echo "salah brad";
    }

?>

