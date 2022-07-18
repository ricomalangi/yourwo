<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

function uploadGambar($image, $base_url){
    $nameFile = $image['picture']['name'];
    $ukuranFile = $image['picture']['size'];
    $tmpName = $image['picture']['tmp_name'];
    $validEktensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $validEktensi)){
        header("Location: $base_url"."/partner/store/message/error-image");
        die;
    }
    if($ukuranFile > 2000000){
        header("Location: $base_url"."/partner/store/message/file-to-large");
        die;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../assets/backend/img/partners_thumbnail/'. $namaFileBaru);
    return $namaFileBaru;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $id_partner_encrypt = $_POST['id_partner'];
    $id_partner = decryptId($_POST['id_partner']);
    $nama_toko = $_POST['nama_toko'];
    $lokasi = $_POST['lokasi'];
    $tentang_toko = $_POST['tentang_toko'];
    $sql = "UPDATE table_partner SET nama_toko = '$nama_toko', lokasi = '$lokasi', tentang_toko = '$tentang_toko'";
   
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url);

        // procedure to delete image if exists
        $sql_delete_image = "SELECT picture FROM table_partner WHERE id_partner = $id_partner";
        $result = mysqli_query($connect, $sql_delete_image);
        $row = mysqli_fetch_array($result);
        if($row['picture'] != ''){
            unlink('../../assets/backend/img/partners_thumbnail/' . $row['picture']);
        }
        
        $sql .= ", picture = '$gambar'";
    }
    $sql .= " WHERE id_partner = $id_partner";
    $result = mysqli_query($connect,$sql);
    if($result){
        header("Location: $base_url/partner/store/message/success");
    } else{
        header("Location: $base_url/partner/store/message/failed");
    }
}