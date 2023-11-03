<?php 
session_start();

if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit;
}

$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "saku_siswa"; // Ganti dengan nama database Anda
  
$connection = mysqli_connect($host, $username, $password, $database);
    
if (!$connection) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
$userId = $_SESSION['userId'];
if($_SESSION['type']=='admin'){
    $query = "SELECT * FROM akun_admin WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $akun = mysqli_fetch_array($result);
    $readfiture = utf8_encode(file_get_contents('data/fiture.json'));
    $fiture = json_decode($readfiture,true)[0]['admin'];
    $query = "SELECT * FROM akun_user";
    $result = mysqli_query($connection, $query);
}else{
    $query = "SELECT * FROM akun_user WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $akun = mysqli_fetch_array($result);
    $readfiture = utf8_encode(file_get_contents('data/fiture.json'));
    $fiture = json_decode($readfiture,true)[1]['user'];
}
// Tutup koneksi database
// mysqli_close($connection);
?>

<!doctype html>
<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="style/beranda.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="./img/<?= $akun['photo']?>">
          <span class="nav-item"><?= $akun['nama'] ?></span>
        </a></li>
        <?php foreach ($fiture['sideBar'] as $sideBar=>$icon):?>
            <li id="<?= $sideBar ?>"><a href="#">
            <i class="fas fa-<?=$icon?>"></i>
            <span class="nav-item"><?= $sideBar?></span>
            </a></li>
        <?php endforeach;?>;
        <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <?php foreach ($fiture['Dashboard'] as $dashboard):?>
            <div class="card">
              <h4><?= $dashboard?></h4>
              <h1><?= $akun[$dashboard]?></h1>
            </div>
        <?php endforeach;?>;
      </div>
      <?php if($_SESSION['type']=='admin'): ?>
        <section class="attendance">
          <div class="attendance-list">
            <h1>Daftar Nasabah</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Tanggal Lahir</th>
                  <th>Saldo</th>
                  <th>Details</th>
                </tr>
              <tbody>
              </thead>
              <?php while($rows= mysqli_fetch_assoc($result)):?>   
                <tr>
                <td><?= $rows['id']?></td>
                <td><?= $rows['nama']?></td>
                <td><?= $rows['nis']?></td>
                <td><?= $rows['tanggal_lahir']?></td>
                <td><?= $rows['saldo']?></td>
                <td><button>View</button></td>
                </tr>
              <?php endwhile;?>
              </tbody>
            </table>
      <?php endif; ?>
            
        </div>
      </section>
    </section>
  </div>
</body>
</html>
</span>