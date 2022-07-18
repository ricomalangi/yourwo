<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
$id_partner = $_SESSION['id_partner'];
$sql_total_package = "SELECT count(id_partner) FROM table_package WHERE id_partner = $id_partner";
$total_package = mysqli_fetch_row(mysqli_query($connect, $sql_total_package));

?>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Dashboard 
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total package</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-primary-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="display-5 mt-1 mb-3"><?= $total_package[0]; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
