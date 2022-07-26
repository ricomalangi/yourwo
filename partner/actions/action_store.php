<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

function uploadGambar($image, $base_url){
    $nameFile = $image['name'];
    $ukuranFile = $image['size'];
    $tmpName = $image['tmp_name'];
    $validEktensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $validEktensi)){
        header("Location: $base_url"."/partner/store/message/error-image");
        die;
    }
    if($ukuranFile > 3000000){
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
    $no_hp = $_POST['no_hp'];
    $sql = "UPDATE table_partner SET nama_toko = '$nama_toko', lokasi = '$lokasi', tentang_toko = '$tentang_toko', no_hp = '$no_hp' ";
    
    $sql_partner = "SELECT picture_project FROM table_partner WHERE id_partner = $id_partner";
    $result_partner = mysqli_fetch_array(mysqli_query($connect, $sql_partner));
    $picture_portfolio = "";
    if($result_partner['picture_project'] != ''){
        $result_partner = json_decode($result_partner['picture_project']);
        $picturePorfolio1 = $result_partner[0];
        $picturePorfolio2 = $result_partner[1];
        $picturePorfolio3 = $result_partner[2];
    }

    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES['picture'], $base_url);

        // procedure to delete image if exists
        $sql_delete_image = "SELECT picture FROM table_partner WHERE id_partner = $id_partner";
        $result = mysqli_query($connect, $sql_delete_image);
        $row = mysqli_fetch_array($result);
        if($row['picture'] != ''){
            unlink('../../assets/backend/img/partners_thumbnail/' . $row['picture']);
        }
        
        $sql .= ", picture = '$gambar'";
    }
    if($_FILES['picture_portfolio_1']['name'] != ''){
        $picturePorfolio1 = uploadGambar($_FILES['picture_portfolio_1'], $base_url);
        //procedure to delete image if exists
        if($result_partner[0] != ''){
            unlink('../../assets/backend/img/partners_thumbnail/' . $result_partner[0]);
        }
        
    }
    if($_FILES['picture_portfolio_2']['name'] != ''){
        $picturePorfolio2 = uploadGambar($_FILES['picture_portfolio_2'], $base_url);
        if($result_partner[1] != ''){
            unlink('../../assets/backend/img/partners_thumbnail/' . $result_partner[1]);
        }
    }
    if($_FILES['picture_portfolio_3']['name'] != ''){
        $picturePorfolio3 = uploadGambar($_FILES['picture_portfolio_3'], $base_url);
        if($result_partner[2] != ''){
            unlink('../../assets/backend/img/partners_thumbnail/' . $result_partner[2]);
        }
    }
    if($picturePorfolio1 != '' && $picturePorfolio2 != '' && $picturePorfolio3 != ''){
        $picture_portfolio = json_encode([$picturePorfolio1,$picturePorfolio2,$picturePorfolio3]);
    }
    $sql .= ", picture_project = '$picture_portfolio'";
    $sql .= " WHERE id_partner = $id_partner";

    $result = mysqli_query($connect,$sql) or die(mysqli_errno($connect));
    if($result){
        header("Location: $base_url/partner/store/message/success");
    } else{
        header("Location: $base_url/partner/store/message/failed");
    }
}