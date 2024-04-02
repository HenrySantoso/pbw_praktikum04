<?php
include("connect.php");
extract($_POST);
$conn->query("INSERT INTO mahasiswa VALUES('$nim','$nama','$kota')");
$conn->close();
header("Location:tampil.php");
