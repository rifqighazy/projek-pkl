<?php
include "database.php";
    
    $sql = "SELECT * from tb_product";
    $hasil = mysqli_query($conn, $sql);
    $no = 1;
    if(mysqli_num_rows($hasil) > 0);
?>