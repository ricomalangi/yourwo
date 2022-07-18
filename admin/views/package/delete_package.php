<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');
$id_package = decryptId($_GET['id']);
$result_id_partner = mysqli_query($connect, "SELECT id_partner FROM table_package WHERE id_package = $id_package");
$row_id_partner = mysqli_fetch_array($result_id_partner);
$id_partner = encryptId($row_id_partner['id_partner']);

$result = mysqli_query($connect, "DELETE FROM table_package WHERE id_package = $id_package");
if($result){
    header("Location: $base_url"."/admin/partners/package/$id_partner/message/deleted");
} else {
    header("Location: $base_url"."/admin/partners/package/$id_partner/message/failed-delete");
}
?>