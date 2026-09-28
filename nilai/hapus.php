<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
mysqli_query($conn, "DELETE FROM nilai WHERE kd_nilai='$_GET[id]'");
header("location:index.php");
