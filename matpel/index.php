<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Matpel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Mata Pelajaran</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Matpel</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Matpel</th>
                    <th>Jumlah Jam</th>
                    <th>Tingkat</th>
                    <th>Kompetensi</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = mysqli_query($conn, " 
            SELECT m.*, k.nama_kompetensi, g.nama_guru
            FROM matpel m 
            JOIN kompetensi k ON m.kd_kompetensi=k.kd_kompetensi
            JOIN guru g ON m.nip=g.nip 
        ");
                while ($d = mysqli_fetch_assoc($q)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['kd_matpel'] ?></td>
                        <td><?= $d['nama_matpel'] ?></td>
                        <td><?= $d['jumlah_jam'] ?></td>
                        <td><?= $d['tingkat'] ?></td>
                        <td><?= $d['nama_kompetensi'] ?></td>
                        <td><?= $d['nama_guru'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['kd_matpel'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $d['kd_matpel'] ?>" onclick="return confirm('Hapus?')"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>