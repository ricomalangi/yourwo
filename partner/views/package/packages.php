<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_partner = $_SESSION['id_partner'];
$sql = "SELECT id_package,nama_paket,harga FROM table_package WHERE id_partner = $id_partner";
$package = mysqli_query($connect, $sql);
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Daftar package
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= $base_url ?>/partner/packages/add-package" class="btn mb-1 mr-2 btn-primary"><i class="fas fa-plus px-1"></i> add package</a>
                    <?php
                        if($_GET['msg'] == 'success'){
                            echo '
                            <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                            <div class="alert-message">
                            Success insert data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>';
                        }
                        if($_GET['msg'] == 'deleted'){
                            echo '
                            <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                            <div class="alert-message">
                            Success delete data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>';
                        }
                      
                        if($_GET['msg'] == 'failed-delete'){
                            echo '
                            <div class="mt-2 alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                            Failed delete data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>';
                        }
                    ?>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama paket</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($package)):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_paket'] ?></td>
                                <td>Rp. <?= $data['harga'] ?></td>
                                <td>
                                    <a href="<?= $base_url ?>/partner/packages/detail-package/<?= encryptId($data['id_package']) ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="<?= $base_url ?>/partner/packages/edit-package/<?= encryptId($data['id_package']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="<?= $base_url ?>/partner/packages/delete-package/<?= encryptId($data['id_package']) ?>" id="delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                endwhile;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Nama paket</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
