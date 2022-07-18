<?php
include ('../inc/connect.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5(trim($_POST['password']));

//get username from database
if(isset($_POST['register'])){
    if($username != '' && $email != '' && $password != ''){
        $sql = "INSERT INTO table_user (username, email, password, role) VALUES ('$username', '$email', '$password', 'customer')";
        $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
        if($result){
            header("Location: $base_url/login/login.php?msg=success");
        } else{
            header("Location: $base_url/login/login.php?msg=error");
        }
    } else{
        header("Location: $base_url/login/sign-up.php?msg=error_create");
    }
}


