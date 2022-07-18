<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_partner = decryptId($_GET['id']);
// procedure to delete image if exists
$sql_delete_image = "SELECT picture FROM table_partner WHERE id_partner = $id_partner";
$result = mysqli_query($connect, $sql_delete_image);
$row = mysqli_fetch_array($result);

if($row['picture'] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/backend/img/partners_thumbnail/'. $row['picture']);
}

$result = mysqli_query($connect, "DELETE FROM table_partner WHERE id_partner = $id_partner");
if($result){
    header("Location: $base_url"."/admin/partners/message/deleted");
} else {
    header("Location: $base_url"."/admin/partners/message/failed-delete");
}
?>