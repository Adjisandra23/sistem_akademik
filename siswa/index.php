<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h3>Data Siswa</h3>

        <a href="tambah.php" class="btn btn-primary mb-3">
            + Tambah Siswa
        </a>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl. Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>KD. Kompetensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $no = 1;

                $query = mysqli_query($conn, "SELECT * FROM siswa");

                while ($row = mysqli_fetch_assoc($query)) {

                ?>

                    <tr>

                        <!-- Nomor -->
                        <td><?= $no++ ?></td>

                        <!-- NIS -->
                        <td><?= $row['nis'] ?></td>

                        <!-- Nama Siswa -->
                        <td><?= $row['nama_siswa'] ?></td>

                        <!-- Tempat Lahir -->
                        <td><?= $row['tempat_lahir'] ?></td>

                        <!-- Tanggal Lahir -->
                        <td><?= $row['tgl_lahir'] ?></td>

                        <!-- Alamat -->
                        <td><?= $row['alamat'] ?></td>

                        <!-- No Telepon -->
                        <td><?= $row['no_telepon'] ?></td>

                        <!-- Kode Kompetensi -->
                        <td><?= $row['kd_kompetensi'] ?></td>

                        <!-- Aksi -->
                        <td>
                            <a href="edit.php?id=<?= $row['nis'] ?>"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $row['nis'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>

                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

</body>

</html>