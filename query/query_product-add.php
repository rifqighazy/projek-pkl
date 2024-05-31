<?php
include '../database.php';
session_start();

if (isset($_POST['namaproduk'])) {
    // product
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // files
    $foto = $_FILES["foto"]["name"];
    $filetmp = $_FILES["foto"]["tmp_name"];
    $target = '../uploads/images/products/';
    $target_file = $target . basename($_FILES['foto']['name']);
    $imageFileType = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    // check product
    $checkproduk = "SELECT name FROM tb_product WHERE name='$namaproduk' LIMIT 1";
    $checkproduk_run = mysqli_query($conn, $checkproduk);

    // Query for data insertion
    if ($namaproduk) {
        // files type
        if ($imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "jpg") {
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'Sorry, only JPG, JPEG, PNG files are allowed'
            );
            header('location: ../index.php?page=add');
            exit(0);
        // files does not match
        } else {
            if($imageFileType === false) {
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'File tidak sesuai'
            );
            header('Location: ../index.php?page=add');
            exit(0);
            }
        }
        // files size
        if ($_FILES['foto']['size'] > 20000) {
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'File terlalu besar'
            );
            header('Location: ../index.php?page=add');
            exit(0);
        }
        // insert files
        if (mysqli_num_rows($checkproduk_run) < 1) {
            if(move_uploaded_file($filetmp, $target_file)) {
                $produk_query = "INSERT INTO `tb_product` (name,category,price,stock,image) VALUES('$namaproduk','$kategori','$harga','$stok','$foto');";
                $produk_query_run = mysqli_query($conn, $produk_query);
                // success
                if ($produk_query_run) {
                    $_SESSION['message'] = array(
                        'type' => 'success',
                        'message' => 'Data berhasil masuk'
                    );
                    header('Location: ../index.php?page=list');
                    exit(0);
                // failed
                } else {
                    $_SESSION['message'] = array(
                        'type' => 'danger',
                        'message' => 'Error'
                    );
                    header('Location: ../index.php?page=add');
                    exit(0);
                }
            }
        // same product
        } else {
            $_SESSION['message'] = array(
                'type' => 'warning',
                'message' => 'Maaf! Produk sudah ada'
            );
            header('Location: ../index.php?page=add');
            exit(0);
        }
    }
}
?>