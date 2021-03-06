<?php
include ('../../inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');
?>

<?php if($_SESSION['role'] == 'admin'){ ?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Data Users
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= $base_url ?>/admin/users/add-user" class="btn mb-1 mr-2 btn-primary"><i class="fas fa-plus"></i> add user</a>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = "SELECT id_user, username, email, role FROM table_user";
                                $result = mysqli_query($connect,$sql);
                                while ($data = mysqli_fetch_array($result)):
                            ?>
                            <tr>
                                
                                <td><?= $no++ ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><?= $data['role'] ?></td>
                                <td>
                                    <a href="<?= $base_url ?>/admin/users/detail-user/<?= encryptId($data['id_user']) ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="<?= $base_url ?>/admin/users/edit-user/<?= encryptId($data['id_user']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="<?= $base_url ?>/admin/users/delete-user/<?= encryptId($data['id_user']) ?>" id="delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                endwhile;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 }else{
    header("Location: $base_url/views/error/forbidden.php");
 }

?>