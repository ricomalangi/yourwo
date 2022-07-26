<?php
include('../inc/connect.php');
session_start();
unset($_SESSION['username']); //hapus session
header("location: $base_url");

