<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Sistem</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">Login</div>
                    <div class="card-body">

                        <form action="cek_login.php" method="post">
                            <input name="username" class="form-control mb-3" placeholder="Username" required>
                            <input type="password" name="password" class="form-control mb-3" placeholder="Password"
                                required>
                            <button class="btn btn-primary w-100">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>