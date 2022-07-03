<?php
include('../../inc/connect.php');
$id_user = $_GET['id'];
// procedure to delete image if exists
$sql_delete_image = "SELECT picture FROM table_user WHERE id_user = $id_user";
$result = mysqli_query($connect, $sql_delete_image);
$row = mysqli_fetch_array($result);

if($row['picture'] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/img/avatars/'. $row['picture']);
}

$result = mysqli_query($connect, "DELETE FROM table_user WHERE id_user = $id_user");
if($result){
    header("Location: $base_url"."/users/message/deleted");
} else {
    header("Location: $base_url"."/users/message/failed-delete");
}
?>