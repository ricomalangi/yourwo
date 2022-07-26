<?php
include ('../inc/connect.php');

//get username from database
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5(trim($_POST['password']));
    if($username != '' && $email != '' && $password != ''){
        $sql = "INSERT INTO table_user (username, email, password, role) VALUES ('$username', '$email', '$password', 'customer')";
        $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
        if($result){
            header("Location: $base_url/login/message/success");
        } else{
            header("Location: $base_url/login/message/error");
        }
    } else{
        header("Location: $base_url/register/message/error_create");
    }
}
if(isset($_POST['username'])){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $sql = "SELECT username FROM table_user WHERE username = '$username'";
    $process = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($process);

    if($num > 0){
        echo "Username already exitst"; 
        echo "<script>$('#validation-username').addClass('is-invalid')</script>";
        echo "<script>$('#validation-username-message').addClass('invalid-feedback')</script>";
        echo "<script>$('#register').prop('disabled', true);</script>"; 
    } else {
        echo "Username available for registration"; 
        echo "<script>$('#validation-username').removeClass('is-invalid')</script>";
        echo "<script>$('#validation-username').addClass('is-valid')</script>";
        echo "<script>$('#validation-username-message').removeClass('invalid-feedback')</script>";
        echo "<script>$('#validation-username-message').addClass('valid-feedback')</script>";
        echo "<script>$('#register').prop('disabled', false);</script>"; 
    }
}
if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $sql = "SELECT email FROM table_user WHERE email = '$email'";
    $process = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($process);

    if($num > 0){
        echo "email already exitst"; 
        echo "<script>$('#validation-email').addClass('is-invalid')</script>";
        echo "<script>$('#validation-email-message').addClass('invalid-feedback')</script>";
        echo "<script>$('#register').prop('disabled', true);</script>"; 
    } else {
        echo "email available for registration"; 
        echo "<script>$('#validation-email').removeClass('is-invalid')</script>";
        echo "<script>$('#validation-email').addClass('is-valid')</script>";
        echo "<script>$('#validation-email-message').removeClass('invalid-feedback')</script>";
        echo "<script>$('#validation-email-message').addClass('valid-feedback')</script>";
        echo "<script>$('#register').prop('disabled', false);</script>"; 
    }
}


