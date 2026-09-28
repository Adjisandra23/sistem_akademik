<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Kompetensi</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Kompetensi</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Kompetensi</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kompetensi</th>
                    <th>Program Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM kompetensi");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['kd_kompetensi'] ?></td>
                        <td><?= $row['nama_kompetensi'] ?></td>
                        <td><?= $row['prog_keahlian'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['kd_kompetensi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['kd_kompetensi'] ?>"
                                onclick="return confirm('Hapus data?')"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>