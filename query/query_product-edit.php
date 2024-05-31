<?php
include '../database.php';
session_start();

if($_POST['namaproduk'] & $_POST['harga'] & $_POST['stok']){
    // product
    $id = $_POST['id'];
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // files
    $fotolama = $_POST['fotolama'];
    $foto = $_FILES["foto"]["name"];
    $filetmp = $_FILES["foto"]["tmp_name"];
    $target = '../uploads/images/products/';
    $target_file = $target . basename($_FILES['foto']['name']);
    $imageFileType = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    // query for data update

    // jika tidak ingin mengganti file
    if (!$_FILES['foto']['name']) {
        $query = "UPDATE tb_product set name='$namaproduk', price='$harga', stock='$stok', category='$kategori' where id='$id'";
        $queryrun = mysqli_query($conn, $query);
        // success
        if ($queryrun) {
            $_SESSION['message'] = array(
                    'type' => 'success',
                    'message' => 'Data berhasil masuk'
                );
            header('location: ../index.php?page=list');
            exit(0);
        // failed
        } else {
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'Error!'
            );
            header('location: ../index.php?page=edit&id='.$id);
            exit(0);
        }

    // jika ingin menganti files
    } else {
        if ($fotolama != $_FILES['foto']['name']){
            // files type
            if ($imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "jpg") {
                $_SESSION['message'] = array(
                    'type' => 'warning',
                    'message' => 'Sorry, only JPG, JPEG, PNG files are allowed!'
                );
                header('location: ../index.php?page=edit&id='.$id);
                exit(0);
            // files does not match
            } else {
                if($imageFileType === false) {
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'File tidak sesuai!'
                );
                header('location: ../index.php?page=edit&id='.$id);
                exit(0);
                }
            }
            // var_dump($_FILES['foto']['size']);
            // files size
            if ($_FILES['foto']['size'] > 2000000) {
                $_SESSION['message'] = array(
                    'type' => 'warning',
                    'message' => 'File terlalu besar!'
                );
                header('location: ../index.php?page=edit&id='.$id);
                exit(0);
            }
            // update files
            if (move_uploaded_file($filetmp, $target_file)){
                unlink($target . $fotolama);
                $query1 = "UPDATE tb_product set name='$namaproduk', price='$harga', stock='$stok', category='$kategori', image='$foto' where id='$id'";
                $queryrun1 = mysqli_query($conn, $query1);
                //success
                    if ($queryrun1) {
                        $_SESSION['message'] = array(
                                'type' => 'success',
                                'message' => 'Data berhasil masuk'
                            );
                        header('location: ../index.php?page=list');
                        exit(0);
                    //failed
                    } else {
                        $_SESSION['message'] = array(
                            'type' => 'danger',
                            'message' => 'Error!'
                        );
                        header('location: ../index.php?page=edit&id='.$id);
                        exit(0);
                    }
                }
        // same files
        } else {
            $_SESSION['message'] = array(
                'type' => 'warning',
                'message' => 'Maaf! file tidak boleh sama'
            );
            header('location: ../index.php?page=edit&id='.$id);
            exit(0);
        }
    }
}
?>