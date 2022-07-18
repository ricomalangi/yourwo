<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
$result = mysqli_query($connect, "SELECT id_user, username FROM table_user");
$id_partner = $_GET['id'];
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Create Package
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php
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
                   
                    <form method="POST" action="<?= $base_url ?>/admin/actions/action_package.php">
                        <input type="hidden" name="id_partner" value="<?= $id_partner ?>">
                        <div class="form-group">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control" placeholder="Nama paket">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga paket</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fasilitas paket</label><br>
                            <button type="button" class="btn btn-md btn-primary add-button">Tambah</button>
                            
                            <div class="input-fields-wrap mt-3">
                                <div><input type="text" name="include_paket[]" class="form-control w-50"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deskripsi paket</label>
                            <textarea name="deskripsi" class="form-control" rows="6"></textarea>
                        </div>
                        <a href="<?= $base_url ?>/admin/partners/package/<?= $id_partner ?>" class="btn btn-lg btn-secondary mr-2">Kembali</a>
                        <input type="submit" name="create" value="create" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
