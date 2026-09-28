<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Nilai</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Nilai</h3>

        <form method="post">

            <select name="nis" class="form-control mb-2" required>
                <option value="">-- Pilih Siswa --</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM siswa");
                while ($s = mysqli_fetch_assoc($q)) {
                    $nis = htmlspecialchars($s['nis']);
                    $nama = htmlspecialchars($s['nama_siswa']);
                    echo "<option value='$nis'>$nis - $nama</option>";
                }
                ?>
            </select>

            <select name="kd_matpel" class="form-control mb-2" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM matpel");
                while ($m = mysqli_fetch_assoc($q)) {
                    $kd = htmlspecialchars($m['kd_matpel']);
                    $nama = htmlspecialchars($m['nama_matpel']);
                    echo "<option value='$kd'>$nama</option>";
                }
                ?>
            </select>

            <input type="number" step="0.01" name="nilai_p" class="form-control mb-2" placeholder="Nilai Pengetahuan" required>
            <input type="number" step="0.01" name="nilai_k" class="form-control mb-2" placeholder="Nilai Keterampilan" required>

            <select name="semester" class="form-control mb-2" required>
                <option value="">-- Semester --</option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>

            <input name="tapel" class="form-control mb-3" placeholder="2025/2026" required>

            <button name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {

            $nis       = $_POST['nis'];
            $kd_matpel = $_POST['kd_matpel'];
            $nilai_p   = $_POST['nilai_p'];
            $nilai_k   = $_POST['nilai_k'];
            $semester  = $_POST['semester'];
            $tapel     = $_POST['tapel'];

            // Cek apakah NIS + mata pelajaran + semester + tapel sudah ada
            $stmtCek = mysqli_prepare($conn, "SELECT kd_nilai FROM nilai
                WHERE nis=? AND kd_matpel=? AND semester=? AND tapel=?");
            mysqli_stmt_bind_param($stmtCek, "ssss", $nis, $kd_matpel, $semester, $tapel);
            mysqli_stmt_execute($stmtCek);
            $hasilCek = mysqli_stmt_get_result($stmtCek);

            if (mysqli_num_rows($hasilCek) > 0) {

                echo "<script>
                    alert('NIS sudah ada untuk mata pelajaran, semester, dan tahun pelajaran tersebut');
                </script>";
            } else {

                // kd_nilai TIDAK diisi manual -> otomatis dari AUTO_INCREMENT
                $stmtInsert = mysqli_prepare($conn, "INSERT INTO nilai
                    (nis, kd_matpel, nilai_p, nilai_k, semester, tapel)
                    VALUES (?, ?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param(
                    $stmtInsert,
                    "ssddss",
                    $nis,
                    $kd_matpel,
                    $nilai_p,
                    $nilai_k,
                    $semester,
                    $tapel
                );
                mysqli_stmt_execute($stmtInsert);

                echo "<script>
                    alert('Nilai berhasil disimpan');
                    location='index.php';
                </script>";
            }
        }
        ?>
    </div>
</body>

</html>