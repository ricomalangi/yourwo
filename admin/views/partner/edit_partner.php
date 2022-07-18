<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_partner = decryptId($_GET['id']);
$result_partner = mysqli_query($connect, "SELECT tu.id_user, tu.username, tp.id_partner FROM table_partner tp RIGHT JOIN table_user tu ON tp.id_user = tu.id_user WHERE tp.id_partner is NULL");
$result = mysqli_query($connect, "SELECT tp.*, tu.username FROM table_partner tp INNER JOIN table_user tu ON tp.id_user = tu.id_user WHERE id_partner = $id_partner");

while($data_partner = mysqli_fetch_array($result))
{
    $id_partner = encryptId($data_partner['id_partner']);
    $id_user = encryptId($data_partner['id_user']);
    $username = $data_partner['username'];
	$nama_toko = $data_partner['nama_toko'];
    $lokasi = $data_partner['lokasi'];
	$picture = $data_partner['picture'];
    $tentang_toko = $data_partner['tentang_toko'];
}
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Edit Partner
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
                        if($_GET['msg'] == 'success'){
                            echo '
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <div class="alert-message">
                               Success update data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                    ?> 
                    <form method="POST" enctype="multipart/form-data" action="<?= $base_url ?>/admin/actions/action_partner.php">
                        <input type="hidden" name="id_partner" value="<?= $id_partner; ?>">
                        <div class="form-group">
                            <label class="form-label">User</label>
                            <select name="id_user" class="form-control select-user">
                                <option disabled>--pilih user--</option>
                                <option value="<?= $id_user ?>" selected><?= $username ?></option>
                                <?php
                                    while($user = mysqli_fetch_array($result_partner)):
                                ?>
                                <option value="<?= encryptId($user['id_user']) ?>"><?= $user['username']?></option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama toko</label>
                            <input type="text" name="nama_toko" class="form-control" placeholder="Nama toko" value="<?= $nama_toko ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi kota toko</label>
                            <select name="lokasi" class="form-control select-city">
                                <?php
                                    $result = mysqli_query($connect, "SELECT city_id, city_name FROM table_cities");
                                    while($city = mysqli_fetch_array($result)):
                                ?>
                                <option value="<?= $city['city_name'] ?>" <?= ($city['city_name'] == $lokasi ? 'selected' : '')  ?>><?= $city['city_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tentang toko</label>
                            <textarea name="tentang_toko" rows="6" class="form-control"><?= $tentang_toko ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100">Foto profile toko</label>
                            <input type="file" name="picture">
                            <small class="form-text text-muted">Max 2Mb</small>
                            <?php
                                if($picture):
                            ?>
                            <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture ?>" alt="">
                            <?php
                                endif;
                            ?>
                        </div>
                        <a href="<?= $base_url ?>/admin/partners" class="btn btn-lg btn-secondary mr-2">kembali</a>
                        <input type="submit" name="update" value="update" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
