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
        header("Location: $base_url"."/partner/account/message/error-image");
        die;
    }
    if($ukuranFile > 2000000){
        header("Location: $base_url"."/partner/account/message/file-to-large");
        die;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../assets/backend/img/avatars/'. $namaFileBaru);
    return $namaFileBaru;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $id_user = decryptId($_POST['id_user']);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sql = "UPDATE table_user SET username = '$username', email = '$email'";
    
    if($_POST['password'] != ''){
        $password = md5($_POST['password']);
        $sql .= ", password = '$password'";
    }
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url);

        // procedure to delete image if exists
        $sql_delete_image = "SELECT picture FROM table_user WHERE id_user = $id_user";
        $result = mysqli_query($connect, $sql_delete_image);
        $row = mysqli_fetch_array($result);
        if($row['picture'] != ''){
            unlink('../../assets/backend/img/avatars/' . $row['picture']);
        }
        
        $sql .= ", picture = '$gambar'";
    }
    $sql .= " WHERE id_user = $id_user";
    $result = mysqli_query($connect,$sql);
    if($result){
        header("Location: $base_url/partner/account/message/success");
    } else{
        header("Location: $base_url/partner/account/message/failed");
    }
}