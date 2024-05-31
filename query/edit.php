<?php
include 'database.php';

$id = $_GET['id'];

	$show = mysqli_query($conn, "SELECT * FROM tb_product WHERE id = '$id'");
		
?>