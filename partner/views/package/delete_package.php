<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');
$id_package = decryptId($_GET['id']);

$result = mysqli_query($connect, "DELETE FROM table_package WHERE id_package = $id_package");
if($result){
    header("Location: $base_url"."/partner/packages/message/deleted");
} else {
    header("Location: $base_url"."/partner/packages/message/failed-delete");
}
?>