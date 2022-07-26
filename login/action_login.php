<?php session_start();
include ('../inc/connect.php');

$username = $_POST['username'];
$password = md5(trim($_POST['password']));



//get username from database
$sql_user = "SELECT id_user,username,role,email,picture FROM table_user WHERE username='$username' and password='$password' ";
$sql_login = mysqli_query($connect,$sql_user) or die(mysqli_error($connect));
$hasil = mysqli_fetch_array($sql_login);
$id_user = $hasil['id_user'];
$role = $hasil['role'];

$sql_partner = "SELECT id_partner FROM table_partner WHERE id_user = $id_user";
$partner = mysqli_fetch_array(mysqli_query($connect, $sql_partner));
if(mysqli_num_rows($sql_login) == 1){
    $_SESSION['id_user'] = $id_user;
	$_SESSION['username'] = $hasil['username'];
    $_SESSION['email'] = $hasil['email'];
    $_SESSION['role'] = $role;
    if($partner['id_partner'] != ''){
        $_SESSION['id_partner'] = $partner['id_partner'];
    }
    if($hasil['picture'] != ''){
        $_SESSION['picture'] = $hasil['picture'];
    }
    if($role == 'admin'){
        header("Location: $base_url/admin/index.php");
    }
    if($role == 'partner'){
        header("Location: $base_url/partner/index.php");
    }
    if($role == 'customer'){
        header("Location: $base_url");
    }
} 
else{
    header("Location: $base_url/login/message/error");
}
