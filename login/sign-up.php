<?php include('../inc/connect.php');
error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="page-home">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="text-center mt-4">
                            <h1 class="h2">Buat akun</h1>
                        </div>
                        <div class="card-body">
                        <?php
                            if(isset($_GET['msg'])){
                                $msg = $_GET['msg'];
                                if ($msg == "error_create"){
                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                    <div class="alert-message">
                                        Gagal membuat user
                                    </div>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    </div>';
                                    }
                            }
                        ?>
                            <div class="m-sm-4">
                                <form action="<?= $base_url ?>/login/action_register.php" method="POST">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" id="validation-username" type="text" name="username" placeholder="Enter your username" oninput="cekusername()"/>
                                        <div id="validation-username-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" id="validation-email" type="email" name="email" placeholder="Enter your email" oninput="cekemail()" />
                                        <div id="validation-email-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Enter your pasword" />
                                    </div>
                                    <div class="text-center mt-3">
                                        <input type="submit" name="register" id="register" class="btn btn-md btn-primary btn-block mb-2" value="Register">
                                        <a href="<?= $base_url?>/login">Already have an account? Log in</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function cekusername(){
        $.ajax({
            url: "<?= $base_url ?>/login/action_register.php",
            type: 'POST',
            data: {
                username :  $("input[name=username]").val()
            },
            success: function(data) {  
                $('#validation-username-message').html(data)
            },
            error: function(e) {
                $('#validation-username-message').html('Ada gangguan koneksi !');
            }
        });
    }
    function cekemail(){
        $.ajax({
            url: "<?= $base_url ?>/login/action_register.php",
            type: 'POST',
            data: {
                email :  $("input[name=email]").val()
            },
            success: function(data) {  
                $('#validation-email-message').html(data)
            },
            error: function(e) {
                $('#validation-email-message').html('Ada gangguan koneksi !');
            }
        });
    }
</script>
