<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<?php
$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM nilai WHERE kd_nilai=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    echo "<script>alert('Data tidak ditemukan'); location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Nilai</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Edit Nilai</h3>

        <form method="post">

            <input class="form-control mb-2" value="<?= htmlspecialchars($data['nis']) ?>" readonly>

            <select name="kd_matpel" class="form-control mb-2">
                <?php
                $q = mysqli_query($conn, "SELECT * FROM matpel");
                while ($m = mysqli_fetch_assoc($q)) {
                    $kd = htmlspecialchars($m['kd_matpel']);
                    $nama = htmlspecialchars($m['nama_matpel']);
                    $sel = ($m['kd_matpel'] == $data['kd_matpel']) ? "selected" : "";
                    echo "<option value='$kd' $sel>$nama</option>";
                }
                ?>
            </select>

            <input type="number" step="0.01" name="nilai_p" value="<?= htmlspecialchars($data['nilai_p']) ?>" class="form-control mb-2">
            <input type="number" step="0.01" name="nilai_k" value="<?= htmlspecialchars($data['nilai_k']) ?>" class="form-control mb-2">

            <select name="semester" class="form-control mb-2">
                <option <?= $data['semester'] == 'Ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option <?= $data['semester'] == 'Genap' ? 'selected' : '' ?>>Genap</option>
            </select>

            <input name="tapel" value="<?= htmlspecialchars($data['tapel']) ?>" class="form-control mb-3">

            <button name="update" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {

            $kd_matpel = $_POST['kd_matpel'];
            $nilai_p   = $_POST['nilai_p'];
            $nilai_k   = $_POST['nilai_k'];
            $semester  = $_POST['semester'];
            $tapel     = $_POST['tapel'];
            $kd_nilai  = $_GET['id'];

            $stmtUpdate = mysqli_prepare($conn, "UPDATE nilai SET
                kd_matpel=?,
                nilai_p=?,
                nilai_k=?,
                semester=?,
                tapel=?
                WHERE kd_nilai=?");
            mysqli_stmt_bind_param(
                $stmtUpdate,
                "sddssi",
                $kd_matpel,
                $nilai_p,
                $nilai_k,
                $semester,
                $tapel,
                $kd_nilai
            );
            mysqli_stmt_execute($stmtUpdate);

            echo "<script>
                alert('Nilai berhasil diupdate');
                location='index.php';
            </script>";
        }
        ?>
    </div>
</body>

</html>