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
    $picture_project =  json_decode($partner['picture_project']);
	$tentang_toko = $partner['tentang_toko'];
    $no_hp = $partner['no_hp'];
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
                        <label class="form-label">No. Hp</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" class="form-control" value="<?= substr($no_hp, 2) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tentang toko</label>
                        <textarea class="form-control" rows="6" readonly><?= $tentang_toko; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100">Thumbnail toko</label>
                        <?php if($picture): ?>
                        <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture ?>" alt="">
                        <?php endif ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <?php if($picture_project[0]): ?>
                                <label class="form-label w-100" for="picture_portfolio_1">Foto portfolio 1</label>
                                <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture_project[0] ?>" alt="">
                            <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <?php if($picture_project[1]): ?>
                                <label class="form-label w-100" for="picture_portfolio_1">Foto portfolio 2</label>
                                <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture_project[1] ?>" alt="">
                            <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <?php if($picture_project[2]): ?>
                                <label class="form-label w-100" for="picture_portfolio_1">Foto portfolio 3</label>
                                <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $picture_project[2] ?>" alt="">
                            <?php endif ?>
                        </div>
                    </div>
                    <a href="<?= $base_url ?>/admin/partners" class="btn btn-lg btn-secondary mr-2">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
