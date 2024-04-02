<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
</head>

<body>
    <?php
    include("connect.php");
    $nim = $_GET["nim"];
    $tabel = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
    $row = $tabel->fetch_assoc();
    extract($row);
    ?>
    <form action="ubah.php" method="post">
        <table border="1">
            <caption>Ubah Data Mahasiswa</caption>
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim" value="<?= $nim ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $nama ?>"></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><input type="text" name="kota" value="<?= $kota ?>"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit">
                    <input type="reset">
                </th>
            </tr>
        </table>
    </form>
</body>

</html>