<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Nilai</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Nilai</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Nilai</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai P</th>
                    <th>Nilai K</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = mysqli_query($conn, " 
    SELECT n.*, s.nama_siswa, m.nama_matpel 
    FROM nilai n 
    JOIN siswa s ON n.nis=s.nis 
    JOIN matpel m ON n.kd_matpel=m.kd_matpel 
    ORDER BY s.nama_siswa 
");
                while ($d = mysqli_fetch_assoc($q)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['nis'] ?></td>
                        <td><?= $d['nama_siswa'] ?></td>
                        <td><?= $d['nama_matpel'] ?></td>
                        <td><?= $d['nilai_p'] ?></td>
                        <td><?= $d['nilai_k'] ?></td>
                        <td><?= $d['semester'] ?></td>
                        <td><?= $d['tapel'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['kd_nilai'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $d['kd_nilai'] ?>"
                                onclick="return confirm('Hapus data nilai?')"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>