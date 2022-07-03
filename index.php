<!DOCTYPE html>
<html lang="en">

<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    session_start();

    date_default_timezone_set('Asia/Makassar');
    include('inc/connect.php');
    include('inc/function.php');

    $tanggal    = date("Y-m-d");
    $target     = $_GET['target'];
    $msg = $_GET['error'];

if (isset($_SESSION['username'])){
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Spark - Responsive Admin &amp; Dashboard Template</title>

	<link href="<?= $base_url?>/assets/css/modern.css" rel="stylesheet">

</head>

<body>
    <div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="index.html">
				<svg>
					<use xlink:href="#ion-ios-pulse-strong"></use>
				</svg>
				Spark
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
                    <?php
                    if($_SESSION['picture'] != ''){
                        $picture = $_SESSION['picture'];
                        $username = $_SESSION['username'];
                        echo "<img src='$base_url/assets/img/avatars/$picture' class='img-fluid rounded-circle mb-2' alt='$username'/>";
                    }
                    ?>
					
					<div class="font-weight-bold"><?= $_SESSION['username'] ?></div>
					<small><?= $_SESSION['email'] ?></small>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item <?php if($target == '' or  $target == 'dashboard') {echo 'active';} ?>">
                        <a class="sidebar-link" href="<?= $base_url; ?>">
                            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
					<li class="sidebar-item <?php if($target == 'users' || $target == 'add-user' || $target == 'detail-user' || $target == 'edit-user' || $target == 'partners' || $target == 'add-partner' ||$target == 'detail-partner' || $target == 'add-package' || $target == 'package' || $target == 'testimonials') {echo 'active';} ?>"">
						<a href="#pages" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle mr-2 fas fa-fw fa-file"></i> <span class="align-middle">Manajemen data</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
							<li class="sidebar-item <?php if($target == 'users' || $target == 'detail-user' || $target == 'add-user' || $target == 'edit-user') {echo 'active';} ?>"><a class="sidebar-link" href="<?= $base_url; ?>/users">Users</a></li>
                            <li class="sidebar-item <?php if($target == 'partners' || $target == 'detail-partner' || $target == 'add-partner' || $target == 'package' || $target == 'add-package') {echo 'active';} ?>"><a class="sidebar-link" href="<?= $base_url; ?>/partners">Partners</a></li>
                            <li class="sidebar-item <?php if($target == 'testimonials') {echo 'active';} ?>"><a class="sidebar-link" href="<?= $base_url; ?>/testimonials">Testimonials</a></li>
						</ul>
					</li>

				</ul>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex mr-2">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown ml-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-cogs"></i> Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= $base_url ?>/login/logout.php"><i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
							</div>
						</li>
					</ul>
				</div>

			</nav>
            <main class="content">
            <?php
                if($target == 'dashboard' or $target == ''){
                    include('views/dashboard/dashboard.php'); 
                }
                // route user
                else if($target == 'users'){
                    include('views/user/users.php'); 
                }
                else if($target == 'add-user'){
                    include('views/user/create_user.php'); 
                }
                else if($target == 'detail-user'){
                    include('views/user/detail_user.php'); 
                }
                else if($target == 'edit-user'){
                    include('views/user/edit_user.php'); 
                }
                else if($target == 'delete-user'){
                    include('views/user/delete_user.php'); 
                }
                // route partner
                else if($target == 'add-partner'){
                    include('views/partner/create_partner.php'); 
                }
                else if($target == 'detail-partner'){
                    include('views/partner/detail_partner.php'); 
                }
                else if($target == 'edit-partner'){
                    include('views/partner/edit_partner.php'); 
                }
                else if($target == 'delete-partner'){
                    include('views/partner/delete_partner.php'); 
                }
                // route package
                else if($target == 'add-package'){
                    include('views/package/create_package.php'); 
                }
                else if($target == 'package'){
                    include('views/package/packages.php'); 
                }
                else if($target == 'partners'){
                    include('views/partner/partners.php'); 
                }
                else if($target == 'testimonials'){
                    include('views/testimoni/testimonials.php'); 
                }
            
}
else {
    echo'<script language="javascript"> location.href ="'.$base_url.'/login/login_2.php"; </script>';
}
            ?>
            </main>
			
            <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-8 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Contact</a>
								</li>
							</ul>
						</div>
						<div class="col-4 text-right">
							<p class="mb-0">
								&copy; 2020 - <a href="dashboard-default.html" class="text-muted">Spark</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path
					d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>

	<script src="<?= $base_url?>/assets/js/app.js"></script>
    <script src="<?= $base_url?>/assets/js/sweetalert2.all.min.js"></script>
    <script>
		$(function() {
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
            $('a#delete').on('click', function(e){
                e.preventDefault()
                let href = $(this).attr('href')
                Swal.fire({
                    title: 'Apakah anda ingin menghapus?',
                    text: 'Data akan dihapus permanen',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = href
                        // document.getElementById('deleteForm').action = 'test'
                        // document.getElementById('deleteForm').submit()
                    }
                })
            })
		});
	</script>
</body>

</html>
