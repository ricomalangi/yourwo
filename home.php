<?php
$sql_total_wo = 'SELECT count(id_partner) FROM table_partner';
$total_wo = mysqli_fetch_row(mysqli_query($connect, $sql_total_wo))[0];
$sql_total_user = 'SELECT count(id_user) FROM table_user';
$total_user = mysqli_fetch_row(mysqli_query($connect, $sql_total_user))[0];
?>

<div class="page-home">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="hero-content">
                    <h5>Temukan Wedding Organizer Terbaik</h5>
                    <p>Wujudkan pernikahan indah anda yang selalu dikenang dengan wedding organizer terbaik</p>
                    <a href="#best-choices" class="btn btn-hero">Show me</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-image">
                    <img src="<?= $base_url ?>/assets/frontend/images/hero-image.jpg" alt="hero-image" class="image-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page counter -->
<div class="page-counter container-fluid">
    <div class="row">
        <div class="col-md-4">
            <p class="total"><?= $total_wo ?>++</p>
            <p class="counter-text">Wedding organizer</p>
        </div>
        <div class="col-md-4">
            <p class="total">22</p>
            <p class="counter-text">Location in Indonesia</p>
        </div>
        <div class="col-md-4">
            <p class="total"><?= $total_user ?>++</p>
            <p class="counter-text">Customers</p>
        </div>
    </div>
</div>
<!-- page best choices -->
<div class="page-best-choices container" id="best-choices">
    <h5>Best choices</h5>
    <div class="row">
        <?php 
            $sql_partner = "SELECT id_partner, nama_toko, lokasi, picture FROM table_partner";
            $result_partner = mysqli_query($connect, $sql_partner);
            while($data = mysqli_fetch_array($result_partner)):
        ?>
        <?php if($data['nama_toko'] != ''): ?>
        <div class="col-md-4" style="margin-bottom: 50px;">
            <a class="component-wo" href="<?= $base_url ?>/wedding/<?= $data['id_partner'] ?>">
                <div class="wo-thumbnail">
                    <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>');"
                    ></div>
                </div>
                <div class="wo-text d-flex">
                    <div class="mr-auto">
                        <img src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>" alt="">
                        <?= mb_strimwidth(ucwords(strtolower($data['nama_toko'])), 0, 20, "...") ?>
                    </div>
                    <div>
                        <i class="fas fa-star" style="color: #FAFF00;"></i>
                        4.6 (120)
                    </div>
                </div>
            </a>
        </div>
        <?php endif ?>
        <?php endwhile; ?>
    </div>
</div>
<div class="page-best-choices container">
    <?php
        $sql_location = "SELECT lokasi FROM table_partner ORDER BY RAND() limit 1";
        $result_location = mysqli_fetch_array(mysqli_query($connect, $sql_location));
        $data_location = $result_location['lokasi'];
    ?>
    <h5><?=  ucwords(strtolower($data_location)) ?></h5>
    <div class="row">
        <?php 
            $sql_partner = "SELECT id_partner, nama_toko, lokasi, picture FROM table_partner WHERE lokasi = '$data_location' limit 3";
            $result_partner = mysqli_query($connect, $sql_partner);
            while($data = mysqli_fetch_array($result_partner)):
        ?>
        <?php if($data['nama_toko'] != ''): ?>
        <div class="col-md-4" style="margin-bottom: 50px;">
            <a class="component-wo" href="<?= $base_url ?>/wedding/<?= $data['id_partner'] ?>">
                <div class="wo-thumbnail">
                    <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>');"
                    ></div>
                </div>
                <div class="wo-text d-flex">
                    <div class="mr-auto">
                        <img src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>" alt="">
                        <?= mb_strimwidth(ucwords(strtolower($data['nama_toko'])), 0, 20, "...") ?>
                    </div>
                    <div>
                        <i class="fas fa-star" style="color: #FAFF00;"></i>
                        4.6 (120)
                    </div>
                </div>
            </a>
        </div>
        <?php endif ?>
        <?php endwhile; ?>
    </div>
</div>
<div class="page-best-choices container">
    <?php
        $sql_location = "SELECT lokasi FROM table_partner ORDER BY RAND() limit 1";
        $result_location = mysqli_fetch_array(mysqli_query($connect, $sql_location));
        $data_location = $result_location['lokasi'];
    ?>
    <h5><?=  ucwords(strtolower($data_location)) ?></h5>
    <div class="row">
        <?php 
            $sql_partner = "SELECT id_partner, nama_toko, lokasi, picture FROM table_partner WHERE lokasi = '$data_location' limit 3";
            $result_partner = mysqli_query($connect, $sql_partner);
            while($data = mysqli_fetch_array($result_partner)):
        ?>
        <?php if($data['nama_toko'] != ''): ?>
        <div class="col-md-4" style="margin-bottom: 50px;">
            <a class="component-wo" href="<?= $base_url ?>/wedding/<?= $data['id_partner'] ?>">
                <div class="wo-thumbnail">
                    <div class="wo-image" style="background-image: url('<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>');"
                    ></div>
                </div>
                <div class="wo-text d-flex">
                    <div class="mr-auto">
                        <img src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>" alt="">
                        <?= mb_strimwidth(ucwords(strtolower($data['nama_toko'])), 0, 20, "...") ?>
                    </div>
                    <div>
                        <i class="fas fa-star" style="color: #FAFF00;"></i>
                        4.6 (120)
                    </div>
                </div>
            </a>
        </div>
        <?php endif ?>
        <?php endwhile; ?>
    </div>
</div>
<div class="page-find-more d-flex justify-content-center">
    <a href="<?= $base_url ?>/wedding-organizer" class="btn btn-find-more">Find more</a>
</div>
<div class="page-testimoni container">
    <div class="row">
        <div class="col-md-6">
            <div class="testimoni-image">
                <img src="<?= $base_url ?>/assets/frontend/images/testimoni.jpg" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="testimoni-content">
                <h5>Testimonial</h5>
                <img src="<?= $base_url ?>/assets/frontend/images/stars.jpg" alt="">
                <p class="testimoni-message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <p class="testimoni-people">James Arthur</p>
            </div>
        </div>
    </div>
</div>