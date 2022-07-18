<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$id_user = $_SESSION['id_user'];
$result_user = mysqli_query($connect, "SELECT * FROM table_user WHERE id_user = $id_user");

while($data_user = mysqli_fetch_array($result_user))
{
    $id_user = encryptId($data_user['id_user']);
	$username = $data_user['username'];
    $email = $data_user['email'];
	$password = $data_user['password'];
    $picture = $data_user['picture'];
}
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
           My account
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
                    <form method="POST" enctype="multipart/form-data" action="<?= $base_url ?>/partner/actions/action_user.php">
                        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $email; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100">Photo profile</label>
                            <input type="file" name="picture">
                            <small class="form-text text-muted">Max 2Mb</small>
                            <?php
                                if($picture):
                            ?>
                            <img class="mt-3" width="100" src="<?= $base_url ?>/assets/backend/img/avatars/<?= $picture ?>" alt="">
                            <?php
                                endif;
                            ?>
                          
                        </div>
                        <input type="submit" name="update" value="update" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
