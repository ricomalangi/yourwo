<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_package =  decryptId($_GET['id']);
$result = mysqli_query($connect, "SELECT * FROM table_package WHERE id_package = $id_package");
while($package = mysqli_fetch_array($result))
{
    $id_partner = $package['id_partner'];
    $nama_paket = $package['nama_paket'];
	$deskripsi = $package['deskripsi'];
	$harga = $package['harga'];
	$include_paket = json_decode($package['include_paket']);
}
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Detail Package
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" value="<?= $nama_paket; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Harga paket</label>
                        <input type="text" class="form-control" value="Rp. <?= $harga; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fasilitas paket</label><br>
                        <ul>
                            <?php foreach($include_paket as $paket): ?>
                            <li><?= $paket ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi paket</label>
                        <textarea class="form-control" rows="6" readonly><?= $deskripsi ?></textarea>
                    </div>
                    <a href="<?= $base_url ?>/admin/partners/package/<?= encryptId($id_partner) ?>" class="btn btn-lg btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
