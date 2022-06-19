<?php
include ('../inc/connect.php');


$username = $_POST['username'];
$name = $_POST['name'];
$password = md5(trim($_POST['password']));

//get username from database
if(isset($_POST['register'])){
    if($username != '' && $name != '' && $password != ''){
        $sql = "INSERT INTO table_user (username, password, name) VALUES ('$username', '$password', '$name')";
        $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
        if($result){
            header("Location: login_2.php?msg=success");
        } else{
            header("Location: login_2.php?msg=error");
        }
    } else{
        header("Location: sign-up.php?msg=error_create");
    }
}


