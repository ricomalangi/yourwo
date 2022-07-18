<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
    $id_partner_encrypt = $_POST['id_partner'];
    $id_partner = decryptId($_POST['id_partner']);
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $include_paket = json_encode($_POST['include_paket']);
    $deskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO table_package (id_partner, nama_paket, deskripsi, harga, include_paket) VALUES ($id_partner, '$nama_paket', '$deskripsi', $harga, '$include_paket')";

    $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    if($result){
        header("Location: $base_url/admin/partners/package/$id_partner_encrypt/message/success");
    } else{
        header("Location: $base_url/admin/partners/add-package/$id_partner_encrypt/message/failed");
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $id_package = decryptId($_POST['id_package']);
    $id_partner = decryptId($_POST['id_partner']);
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $include_paket = json_encode($_POST['include_paket']);
    $deskripsi = $_POST['deskripsi'];
    $sql = "UPDATE table_package SET id_partner = $id_partner, nama_paket = '$nama_paket', deskripsi = '$deskripsi', harga = $harga, include_paket = '$include_paket' WHERE id_package = $id_package";
    $result = mysqli_query($connect,$sql);
    $id_package_encrypt = $_POST['id_package'];
    if($result){
        header("Location: $base_url/admin/partners/edit-package/$id_package_encrypt/message/updated");
    } else{
        header("Location: $base_url/admin/partners/edit-package/$id_package_encrypt/message/failed");
    }
}
?>
