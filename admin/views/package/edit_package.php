<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');
$id = decryptId($_GET['id']);
$result = mysqli_query($connect, "SELECT * FROM table_package WHERE id_package = $id");
while($package = mysqli_fetch_array($result))
{
    $id_package = encryptId($package['id_package']);
    $id_partner = encryptId($package['id_partner']);
    $nama_paket = $package['nama_paket'];
	$deskripsi = $package['deskripsi'];
	$harga = $package['harga'];
	$include_paket = json_decode($package['include_paket']);
    $image = $package['picture'];

}

?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Edit Package
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
                        if($_GET['msg'] == 'updated'){
                            echo '
                            <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                            <div class="alert-message">
                            Success update data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>';
                        }
                    ?>
                   
                    <form method="POST"  action="<?= $base_url ?>/admin/actions/action_package.php">
                        <input type="hidden" name="id_package" value="<?= $id_package ?>">
                        <input type="hidden" name="id_partner" value="<?= $id_partner ?>">
                        <div class="form-group">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control" placeholder="Nama paket" value="<?= $nama_paket ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga paket</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?= $harga ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fasilitas paket</label><br>
                            <button type="button" class="btn btn-md btn-primary add-button">Tambah</button>
                            
                            <div class="input-fields-wrap mt-3">
                                <div><input type="text" name="include_paket[]" class="form-control w-50" value="<?= $include_paket[0] ?>"></div>
                                <?php 
                                foreach($include_paket as $key => $value):
                                    if($key == 0) continue
                                ?>
                                <div class="input-group mt-3 w-50 field">
                                    <input type="text" class="form-control" name="include_paket[]" value="<?= $value ?>">
                                    <span class="input-group-append">
                                        <a class="btn btn-danger remove-field">x</a>
                                    </span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deskripsi paket</label>
                            <textarea name="deskripsi" class="form-control" rows="6"><?= $deskripsi ?></textarea>
                        </div>
                        <a href="<?= $base_url ?>/admin/partners/package/<?= $id_partner ?>" class="btn btn-lg btn-secondary mr-2">Kembali</a>
                        <input type="submit" name="update" value="update" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
