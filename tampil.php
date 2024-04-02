<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <?php
    include("connect.php");
    // if (isset($_POST["filter"])) {
    //     $filter = $_POST["filter"];
    //     $where = "WHERE concat(nim,nama,kota) LIKE '%$filter%'";
    // } else {
    //     $filter = "";
    //     $where = "";
    // }
    if (isset($_POST["delete"])) {
        $nim = $_POST["nim"];
        $conn->query("DELETE FROM mahasiswa WHERE nim='$nim'");
        echo "$nim Berhasil Dihapus";
    }
    if (isset($_POST["update"])) {
        $nim = $_POST["nim"];
        header("Location:update.php?nim=$nim");
        $conn->query("UPDATE mahasiswa WHERE nim='$nim'");
    }

    echo "<form action=\"tampil.php\" method=\"post\">";
    echo "<h4 align='center'>DAFTAR MAHASISWA PROGRAM STUDI INFORMASI UKDW</h4>";
    echo "<table id='example' class='table table-striped' style='width:100%'>"; //import dari html di datatable 
    // echo "<tr>
    //         <td colspan=\"3\">Filter : 
    //             <input type=\"text\" name=\"filter\" value=\"$filter\" size=\"50\">
    //         </td>
    //         <td align=\"center\">
    //             <input type=\"submit\" value=\"Filter\">
    //         </td>
    //     </tr>";
    echo "<thead>
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kota</th>
            <th>Menu</th>
        </tr>
        </thead>";
    $tabel = $conn->query("SELECT * FROM mahasiswa");
    echo "<tbody>";
    while ($row = $tabel->fetch_assoc()) {
        extract($row);
        echo "
            <tr>
                <td>$nim</td>
                <td>$nama</td>
                <td>$kota</td>
                <th>
                    <form method=\"post\">
                        <input type=\"hidden\" name=\"nim\" value=\"$nim\">
                        <input type=\"submit\" name=\"update\"value=\"Update\">
                        <input type=\"submit\" name=\"delete\"value=\"Delete\">
                    </form>
                </th>
            </tr>
            ";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</form>";
    ?>
    <center>
        <a href="tambah_mhs.html">Tambah Data Mahasiswa</a>
    </center>
</body>

</html>