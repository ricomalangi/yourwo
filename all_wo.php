<!-- Page home -->
<div class="page-home">
    <div class="container">
        <div class="wo-all-title">
            <div class="row">
               <div class="col-md-12">
                    <h2 class="text-center">Wedding Organizer</h2>
               </div>
            </div>
            <form action="<?= $base_url; ?>/filter-organizer" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <select name="location" class="form-control select-city">
                            <option disabled selected>Pilih Kota</option>
                            <?php
                                $result = mysqli_query($connect, "SELECT city_id, city_name FROM table_cities");
                                while($city = mysqli_fetch_array($result)):
                            ?>
                            <option value="<?= $city['city_name'] ?>"><?= $city['city_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="cold-md-4">
                        <input type="submit" name="cari" class="btn btn-sm btn-primary" value="cari berdasarkan kota">
                    </div>
                </div>
            </form>
        </div>
        <div class="page-best-choices container">
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
                                <img src="<?= $base_url ?>/assets/backend/img/partners_thumbnail/<?= $data['picture'] ?>" width="30" height="30" alt="">
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
    </div>
</div>
