<?php include('../../inc/connect.php');
$id = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM table_user WHERE id_user = $id");
while($user_data = mysqli_fetch_array($result))
{
    $id_user = $user_data['id_user'];
	$name = $user_data['username'];
	$email = $user_data['email'];
	$role = $user_data['role'];
    $image = $user_data['picture'];
}
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Detail user
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">  
                <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="<?= $name; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?= $email; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Role</label>
                            <input type="text" class="form-control" value="<?= $role ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100">Photo profile</label>
                            <?php
                                if($image){
                            ?>
                            <img class="mt-3" width="100" src="<?= $base_url ?>/assets/img/avatars/<?= $image ?>" alt="">
                            <?php
                                }
                            ?>
                          
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
