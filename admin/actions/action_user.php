<?php 
include('../../inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

function uploadGambar($image, $base_url, $action, $id_user = null){
    $nameFile = $image['picture']['name'];
    $ukuranFile = $image['picture']['size'];
    $tmpName = $image['picture']['tmp_name'];
    $validEktensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if($action == 'create'){
        if(!in_array($ekstensiGambar, $validEktensi)){
            header("Location: $base_url"."/admin/users/add-user/message/error-image");
            die;
        }
        if($ukuranFile > 2000000){
            header("Location: $base_url"."/admin/users/add-user/message/file-to-large");
            die;
        }
    }
    if($action == 'update'){
        if(!in_array($ekstensiGambar, $validEktensi)){
            header("Location: $base_url"."/admin/users/edit-user/$id_user/message/error-image");
            die;
        }
        if($ukuranFile > 2000000){
            header("Location: $base_url"."/admin/users/edit-user/$id_user/message/file-to-large");
            die;
        }
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../assets/backend/img/avatars/'. $namaFileBaru);
    return $namaFileBaru;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $gambar = '';
    // upload gambar
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url, 'create');
    }

    $sql = "INSERT INTO table_user (username, email, password, role, picture) VALUES ('$username', '$email', '$password', '$role', '$gambar')";

    $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    if($result){
        header("Location: $base_url"."/admin/users/message/success");
    } else{
        header("Location: $base_url"."/admin/users/message/failed");
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $id_user_encrypt = $_POST['id_user'];
    $id_user = decryptId($_POST['id_user']);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "UPDATE table_user SET username = '$username', email = '$email', role = '$role'";
    
    if($_POST['password'] != ''){
        $password = md5($_POST['password']);
        $sql .= ", password = '$password'";
    }
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url, 'update', $id_user_encrypt);

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
        header("Location: $base_url/admin/users/edit-user/$id_user_encrypt/message/success");
    } else{
        header("Location: $base_url/admin/users/edit-user/$id_user_encrypt/message/failed");
    }
}