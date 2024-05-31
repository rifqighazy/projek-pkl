<?php 
    include '../database.php';
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_user WHERE username='$username' AND password=md5('$password') LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                if($row['is_active'] == 1){
                    $_SESSION['username'] = $row['username'];
                    echo "<script>alert('Login Success')</script>";
                    header('Location: ../index.php');
                }else{
                    // Show flashdata
                    $_SESSION['message'] = array(
                        'type' => 'info',
                        'message' => 'Maaf! Akun anda belum aktif.'                   
                    );
                }
            }
        } else {
            // Show flashdata
            $_SESSION['message'] = array(
                'type' => 'warning',
                'message' => 'Maaf! Username atau Password Anda Salah.'                   
            );
        }
    }
    header('Location: ../login.php');
?>