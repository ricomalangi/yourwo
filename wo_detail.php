<?php
    $id_partner = $_GET['id'];
    $sql = "SELECT * FROM table_partner WHERE id_partner = $id_partner";
    $result = mysqli_query($connect, $sql);
    while($data = mysqli_fetch_array($result)){
        $nama_toko = $data['nama_toko'];
        $lokasi = $data['lokasi'];
        $picture = $data['picture'];
        $tentang_toko = $data['tentang_toko'];
        $no_hp = $data['no_hp'];
        $picture_project = json_decode($data['picture_project']);
    }
?>
<div class="page-home">
    <div class="container">
        <div class="wo-detail-title">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2><?= ucwords(strtolower($nama_toko)) ?></h2>
                    <p><?= $lokasi ?></p>
                </div>
            </div>
        </div>
        <div class="wo-detail-project">
            <h5>Our projects</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="wo-thumbnail">
                        <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?=$picture_project[0]?>');"
                        ></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wo-thumbnail">
                        <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?=$picture_project[1]?>');"
                        ></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wo-thumbnail">
                        <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?=$picture_project[2]?>');"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wo-detail-about-us">
            <h5>About us</h5>
            <p><?= $tentang_toko ?></p>
        </div>
        <div class="wo-detail-package">
            <h5>Planning package</h5>
            <p>Kami menyediakan berbagai pilihan paket yang murah dan tentunya berkualitas</p>
            <div class="package">
                <div class="row">
                    <?php 
                        $sql_package = "SELECT * FROM table_package WHERE id_partner = $id_partner";
                        $result_package = mysqli_query($connect, $sql_package);
                        while($data = mysqli_fetch_array($result_package)):
                    ?>
                    <div class="col-md-4 item-package">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['nama_paket'] ?></h5>
                                <p class="card-text"><?= $data['deskripsi'] ?></p>
                                <p class="card-price">Rp. <?= $data['harga'] ?></p>
                                <p class="card-include">Include:</p>
                                <ul>
                                    <?php foreach(json_decode($data['include_paket']) as $paket): ?>
                                    <li><?= $paket ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if(isset($_SESSION['username'])){ ?>
                                    <a href="https://api.whatsapp.com/send?phone=<?= $no_hp ?>" target="_blank" class="btn btn-primary btn-block">Book now</a>
                                <?php } else { ?>
                                    <a href="<?= $base_url?>/login" target="_blank" class="btn btn-primary btn-block">login untuk booking</a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

            </div>
        </div>
    </div>
</div>

