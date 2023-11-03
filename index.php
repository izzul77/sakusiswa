<?php
session_start();
// Koneksi ke database MySQL
$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "saku_siswa"; // Ganti dengan nama database Anda
  
$connection = mysqli_connect($host, $username, $password, $database);
    
if (!$connection) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Tangkap data yang dikirimkan dari form login
if (isset($_POST['userId']) && isset($_POST['password'])) {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah pengguna dengan informasi login yang diberikan ada dalam database
    $query = "SELECT * FROM akun WHERE user_id = '$userId' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        // Login berhasil, arahkan ke halaman beranda atau area terotentikasi
        $_SESSION['type'] = mysqli_fetch_array($result)['type'];
        $_SESSION['login']=true;
        $_SESSION['userId']=$_POST['userId'];
        header("Location: beranda.php");
        exit();
    } else {
        // Login gagal, tampilkan pesan kesalahan
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}

// Tutup koneksi database
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Tabungan Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Login Tabungan Siswa
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="userId" class="form-label">Username</label>
                <input type="text" class="form-control" id="userId" name="userId" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
