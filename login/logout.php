<?php
session_start();
unset($_SESSION['username']); //hapus session
header("location:../index.php");

