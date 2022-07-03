<?php include('../inc/connect.php');

function uploadGambar($image, $base_url, $action, $id = null){
    $nameFile = $image['picture']['name'];
    $ukuranFile = $image['picture']['size'];
    $tmpName = $image['picture']['tmp_name'];
    $validEktensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if($action == 'create'){
        if(!in_array($ekstensiGambar, $validEktensi)){
            header("Location: $base_url"."/partners/add-partner/message/error-image");
            die;
        }
        if($ukuranFile > 2000000){
            header("Location: $base_url"."/partners/add-partner/message/file-to-large");
            die;
        }
    }
    if($action == 'update'){
        if(!in_array($ekstensiGambar, $validEktensi)){
            header("Location: $base_url"."/partners/edit-partner/$id/message/error-image");
            die;
        }
        if($ukuranFile > 2000000){
            header("Location: $base_url"."/partners/edit-partner/$id/message/file-to-large");
            die;
        }
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/img/partners_thumbnail/'. $namaFileBaru);
    return $namaFileBaru;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
    $id_user = $_POST['id_user'];
    $nama_toko = $_POST['nama_toko'];
    $lokasi = $_POST['lokasi'];
    $tentang_toko = $_POST['tentang_toko'];
    $gambar = '';
    // upload gambar
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url, 'create');
    }

    $sql = "INSERT INTO table_partner (id_user, nama_toko, lokasi, picture, tentang_toko) VALUES ('$id_user', '$nama_toko', '$lokasi', '$gambar', '$tentang_toko')";

    $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    if($result){
        header("Location: $base_url"."/partners/message/success");
    } else{
        header("Location: $base_url"."/partners/message/failed");
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "UPDATE table_user SET username = '$username', email = '$email', role = '$role'";
    if($_POST['password'] != ''){
        $password = md5($_POST['password']);
        $sql .= ", password = '$password'";
    }
    if($_FILES['picture']['name'] != ''){
        $gambar = uploadGambar($_FILES, $base_url, 'update', $id_user);

        // procedure to delete image if exists
        $sql_delete_image = "SELECT picture FROM table_user WHERE id_user = $id_user";
        $result = mysqli_query($connect, $sql_delete_image);
        $row = mysqli_fetch_array($result);
        if($row['picture'] != ''){
            unlink('../assets/img/avatars/' . $row['picture']);
        }
        
        $sql .= ", picture = '$gambar'";
    }
    $sql .= " WHERE id_user = $id_user";
    $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    if($result){
        header("Location: $base_url/partners/edit-user/$id_user/message/success");
    } else{
        header("Location: $base_url/partners/edit-user/$id_user/message/failed");
    }
}