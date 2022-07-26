<div class="page-home">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="text-center mt-4">
                            <h1 class="h2">Login</h1>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['msg'])){
                                    $msg = $_GET['msg'];
                                    if ($msg == "error"){
                                        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="alert-message">
                                            username atau password anda salah
                                        </div>
        
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        </div>';
                                        }
                                        if ($msg == "success"){
                                            echo '<div class="alert alert-success alert-dismissible" role="alert">
                                            <div class="alert-message">
                                                Sukses membuat user
                                            </div>
        
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            </div>';
                                        }
                                }
                             
                            ?>
                            <div class="m-sm-4">
                                <form method="POST" action="<?= $base_url ?>/login/action_login.php">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="username" name="username" placeholder="Enter your username" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-md btn-primary btn-block mb-2">Sign in</button>
                                        <a href="<?= $base_url?>/register">Create an account</a>
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