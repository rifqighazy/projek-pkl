<?php
include '../database.php';
session_start();


$id = $_GET['id'];

$gambar = mysqli_query($conn, "SELECT * from tb_product where id='$id'");
$get = mysqli_fetch_array($gambar);
$target = '../uploads/images/products/';
$img = $target .$get['image'];
unlink($img);

$delete = "DELETE FROM tb_product WHERE id='$id'";
$hasil = mysqli_query($conn, $delete);

if($hasil){
    header('Location: ../index.php?page=list');
    }
    else{
        $_SESSION['message'] = array(
            'type' => 'info',
            'message' => 'Error'                   
        );
    }

?>