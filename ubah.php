<?php
include("connect.php");
extract($_POST);
$conn->query("UPDATE mahasiswa SET nama='$nama',kota='$kota' WHERE nim='$nim'");
$conn->close();
header("Location:tampil.php");
