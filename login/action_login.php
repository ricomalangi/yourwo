<?php session_start();
include ('../inc/connect.php');

$username = $_POST['username'];
$password = md5(trim($_POST['password']));

//get username from database
$sql = "SELECT username,password,email,picture FROM table_user WHERE username='$username' and password='$password' ";
$sql_login = mysqli_query($connect,$sql) or die(mysqli_error($connect));
$hasil = mysqli_fetch_array($sql_login);

if(mysqli_num_rows($sql_login) == 1) {

	$_SESSION['username'] = $hasil['username'];
    $_SESSION['email'] = $hasil['email'];
    if($hasil['picture'] != ''){
        $_SESSION['picture'] = $hasil['picture'];
    }

?>
<script language ="javascript">location.href ="../index.php"; </script>
<?php

}
 else {

?>

 <script language ="javascript">location.href ="login_2.php?msg=error"; </script>
 
 
 <?php


/*echo '<div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            username atau password anda salah
        </div>';
*/
}

?>
