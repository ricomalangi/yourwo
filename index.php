<?php include('inc/connect.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$target = $_GET['target'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Your WEO - Find Your Wedding organizer</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
    <link href="<?= $base_url ?>/assets/frontend/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= $base_url?>/assets/frontend/style/select2.min.css">
    <script src="<?= $base_url ?>/assets/frontend/vendor/jquery/jquery.min.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-wo fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="/">
          <span class="brand-y">Y</span>our <span class="brand-wo">WEO</span> 
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/wedding-organizer">Wedding organizer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about-us">About us</a>
            </li>
            <?php if(!$_SESSION['username']): ?>
            <li class="nav-item">
              <a class="nav-link btn btn-wo-login btn-outline-primary" href="<?= $base_url ?>/login">Login</a>
            </li>
            <li class="nav-item">
              <a
                class="btn btn-wo-register btn-primary nav-link px-4 text-white"
                href="<?= $base_url ?>/register"
                >Register</a
              >
            </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['username'])): ?>
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-wo-login btn-outline-primary" href="<?= $base_url ?>/admin/">Dashboard</a>
                    </li>
                <?php endif ?>
                <?php if($_SESSION['role'] == 'partner'): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-wo-login btn-outline-primary" href="<?= $base_url ?>/partner/">Dashboard</a>
                    </li>
                <?php endif ?>
                <?php if($_SESSION['role'] == 'customer'): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-wo-login btn-outline-primary" href="<?= $base_url ?>/login/logout.php">Logout</a>
                    </li>
                <?php endif ?>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
    <?php
        if($target == 'home' || $target == ''){
            include('home.php'); 
        }
        else if($target == 'wedding'){
            include('wo_detail.php'); 
        }
        else if($target == 'wedding-organizer'){
            include('all_wo.php'); 
        }
        else if($target == 'filter-organizer'){
            include('filter_wo_by_location.php'); 
        }
        else if($target == 'about-us'){
            include('about_us.php'); 
        }
        else if($target == 'login'){
            include('login/login.php');
        }
        else if($target == 'register'){
            include('login/sign-up.php');
        }
    ?>
    <footer>
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-wo">
                    <h5><span class="brand-y">Y</span>our <span class="brand-wo">WO</span> </h5>
                    <p>Wujudkan pernikahan indah anda yang selalu dikenang dengan wedding organizer terbaik</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-connect-us">
                    <h5>Connect Us</h5>
                    <p>support@yourwo.id</p>
                    <p>021-2345-2421</p>
                    <p>Your Wo, Makassar-Indonesia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-link">
                    <h5>Link</h5>
                    <a href="<?= $base_url ?>/wedding-organizer">wedding organizer</a>
                    <a href="<?= $base_url ?>/login">Login</a>
                    <a href="<?= $base_url ?>/register">Register</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-copyright">
                    <p>Copyright 2022 • All rights reserved • Your WO</p>
                </div>
            </div>
        </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= $base_url ?>/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base_url?>/assets/frontend/script/select2.min.js"></script>
    <script src="<?= $base_url ?>/assets/frontend/script/navbar-scroll.js"></script>
    <script>
        $(document).ready(function(){
            $('.select-city').select2();
        })
    </script>
  </body>
</html>
