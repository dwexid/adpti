<?php
    
    session_start();
    
    require_once("../functions.php");
    require_once("../model/model_pt.php");
    require_once("../model/model_jurusan.php");
    require_once("../model/model_tempat.php");
    require_once("../model/model_user.php");

    if(!isset($_SESSION['username']) || $_SESSION['user_status']!=1){
        die(header("location: ".base_url()."/404.php"));
    }

    $id = $_GET['id'];
    $data = $pt->get_detail($id);

    $tgl = date("Y-m-d");
    $user->notif_add("<span class=text-danger><b>Admin</b> telah menolak usulan tambahan data <b><i>$data->nama_pt</i></b></span>",$data->publish_status,$tgl);

    $del = $pt->delete($id);
    
    if($del){
        
        header("location: ".base_url());
    }else{
        
        echo "salah brad";
    }

?>

