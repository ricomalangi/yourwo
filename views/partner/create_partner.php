<?php include('../../inc/connect.php');
$result = mysqli_query($connect, "SELECT id_user, username FROM table_user");

?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Create Partner
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        if($_GET['msg'] == 'error-image'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                Extensions allowed is jpg, jpeg, png
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                        if($_GET['msg'] == 'file-to-large'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                Maximum file is 2 MB
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                        if($_GET['msg'] == 'failed'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                               Failed store data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                    ?>
                   
                    <form method="POST" enctype="multipart/form-data" action="<?= $base_url ?>/actions/action_partner.php">
                        <div class="form-group">
                            <label class="form-label">User</label>
                            <select name="id_user" class="form-control">
                                <option selected disabled>--pilih user--</option>
                                <?php
                                while($user = mysqli_fetch_array($result)):
                                ?>
                                <option value="<?= $user['id_user']?>"><?= $user['username']?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama toko</label>
                            <input type="text" name="nama_toko" class="form-control" placeholder="Nama toko">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi kota toko</label>
                            <input type="text" name="lokasi" class="form-control" placeholder="Contoh bandung">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tentang toko</label>
                            <textarea name="tentang_toko" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100">Foto profile toko</label>
                            <input type="file" name="picture">
                        </div>
                       
                        <input type="submit" name="create" value="create" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
