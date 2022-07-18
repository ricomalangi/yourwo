<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id = decryptId($_GET['id']);
$result = mysqli_query($connect, "SELECT * FROM table_partner WHERE id_partner = $id");
while($partner = mysqli_fetch_array($result))
{
    $nama_toko = $partner['nama_toko'];
	$lokasi = $partner['lokasi'];
	$picture = $partner['picture'];
	$tentang_toko = $partner['tentang_toko'];
}
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Detail partner
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">  
                    <div class="form-group">
                        <label class="form-label">Nama toko</label>
                        <input type="text" class="form-control" value="<?= $nama_toko; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" value="<?= $lokasi; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lokasi</label>
                        <textarea class="form-control" rows="6" readonly><?= $tentang_toko; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100">Thumbnail toko</label>
                        <?php
                            if($picture):
                        ?>
                        <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture ?>" alt="">
                        <?php
                            endif
                        ?>
                    </div>
                    <a href="<?= $base_url ?>/admin/partners" class="btn btn-lg btn-secondary mr-2">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
