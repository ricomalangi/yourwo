<?php
include('../../inc/connect.php');
$id_partner = $_GET['id'];
// procedure to delete image if exists
$sql_delete_image = "SELECT picture FROM table_package WHERE id_partner = $id_partner";
$result = mysqli_query($connect, $sql_delete_image);
$row = mysqli_fetch_array($result);

if($row['picture'] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/img/partners_thumbnail/'. $row['picture']);
}

$result = mysqli_query($connect, "DELETE FROM table_partner WHERE id_partner = $id_partner");
if($result){
    header("Location: $base_url"."/partners/message/deleted");
} else {
    header("Location: $base_url"."/partners/message/failed-delete");
}
?>