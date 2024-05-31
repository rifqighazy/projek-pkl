<?php
include '../database.php';
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        // Check Email
        $checkusername = "SELECT username FROM tb_user WHERE username='$username' LIMIT 1";
        $checkusername_run = mysqli_query($conn, $checkusername);

        if (mysqli_num_rows($checkusername_run) > 0) {
            // Already Email Exists
            $_SESSION['message'] = array(
                'type' => 'info',
                'message' => 'Maaf! username sudah ada'
            );
            header('Location: ../register.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = array(
            'type' => 'info',
            'message' => 'Password Salah'
        );
        header("Location: ../register.php");
        exit(0);
    }
    $sql = "INSERT INTO `tb_user` (`full_name`,`username`,`password`,`nomor_telepon`,`is_active`)
        VALUES ('$name','$username',md5('$password'),'$telephone','');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = array(
            'type' => 'info',
            'message' => 'Registrasi berhasil'
        );
        header("Location: ../login.php");
        exit(0);
    } else {
        $_SESSION['message'] = array(
            'type' => 'info',
            'message' => 'Error'
        );
        header("Location: ../register.php");
        exit(0);
    }
}
