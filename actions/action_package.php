<?php include('../inc/connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
    $id_partner = $_POST['id_partner'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $include_paket = $_POST['include'];
    $deskripsi = $_POST['deskripsi'];
   
    $sql = "INSERT INTO table_package (id_partner, nama_paket, deskripsi, harga, include_paket) VALUES ('$id_partner', '$nama_paket', '$deskripsi', $harga, '$include_paket')";

    $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    if($result){
        header("Location: $base_url/partners/package/$id_partner/message/success");
    } else{
        header("Location: $base_url/partners/add-package/$id_partner/message/failed");
    }
}
?>