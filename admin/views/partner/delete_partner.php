<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_partner = decryptId($_GET['id']);
// procedure to delete image if exists
$sql_delete_image = "SELECT picture, picture_project FROM table_partner WHERE id_partner = $id_partner";
$row = mysqli_fetch_array(mysqli_query($connect, $sql_delete_image));
$picture_project = json_decode($row['picture_project']);

if($row['picture'] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/backend/img/partners_thumbnail/'. $row['picture']);
}
if($picture_project[0] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/backend/img/partners_thumbnail/'. $picture_project[0]);
}
if($picture_project[1] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/backend/img/partners_thumbnail/'. $picture_project[1]);
}
if($picture_project[2] != ''){
    unlink($_SERVER['DOCUMENT_ROOT'] .'assets/backend/img/partners_thumbnail/'. $picture_project[2]);
}

$result = mysqli_query($connect, "DELETE FROM table_partner WHERE id_partner = $id_partner");
if($result){
    header("Location: $base_url"."/admin/partners/message/deleted");
} else {
    header("Location: $base_url"."/admin/partners/message/failed-delete");
}
