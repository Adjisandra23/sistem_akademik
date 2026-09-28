<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Guru</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h3>Data Guru</h3>

        <a href="tambah.php" class="btn btn-primary mb-3">
            + Tambah Guru
        </a>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl. Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $no = 1;

                $query = mysqli_query($conn, "SELECT * FROM guru");

                while ($row = mysqli_fetch_assoc($query)) {

                ?>

                    <tr>

                        <!-- Nomor -->
                        <td><?= $no++ ?></td>

                        <!-- NIP -->
                        <td><?= $row['nip'] ?></td>

                        <!-- Nama Guru -->
                        <td><?= $row['nama_guru'] ?></td>

                        <!-- Tempat Lahir -->
                        <td><?= $row['tempat_lahir'] ?></td>

                        <!-- Tanggal Lahir -->
                        <td><?= $row['tgl_lahir'] ?></td>

                        <!-- Jenis Kelamin -->
                        <td>
                            <?php
                            if ($row['jenkel'] == 'L') {
                                echo "Laki-laki";
                            } elseif ($row['jenkel'] == 'P') {
                                echo "Perempuan";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>

                        <!-- Alamat -->
                        <td><?= $row['alamat'] ?></td>

                        <!-- No HP -->
                        <td><?= $row['no_hp'] ?></td>

                        <!-- Pendidikan -->
                        <td><?= $row['pend_akhir'] ?></td>

                        <!-- Aksi -->
                        <td>
                            <a href="edit.php?id=<?= $row['nip'] ?>"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $row['nip'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data guru ini?')"
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