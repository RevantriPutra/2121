<?php
session_start();

if( !isset($_SESSION['login']) ) {
  header("location: login.php");
  exit;
}


require_once "koneksi.php";
$query = 'SELECT * FROM alternatif';


if ( isset($_POST["search"]) ) {

  $cari = $_POST['cari'];

  $query = "SELECT * FROM alternatif
                WHERE
                kAlternatif LIKE '%$cari%' OR 
                nmAlternatif LIKE '%$cari%'
                ";

} else {
  $query = 'SELECT * FROM alternatif';
}

$result = mysqli_query($conn, $query);

?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container mt-5">
  <div class="jumbotron mt-5 mb-5 animate__animated animate__bounceInDown animate__slower">
    <h2 class="mt-4 ml-5">DAFTAR DATA ALTERNATIF</h2>
    <hr class="mt-5">

  <div class="row">
    <div class="col-2 mt-5 ml-5">
      <a class="d-block btn btn-info mt-4" href="view.php">Data Alternatif</a>
      <a class="d-block btn btn-info mt-3" href="vkreteria.php">Data Kriteria</a>
      <a class="d-block btn btn-info mt-3" href="vbobot.php">Bobot</a>
    </div>

    <div class="col-9 mt-1">
          <div class="row justify-content-end col-sm-13 mt-3 mb-3 ml-4">
            <form action="" method="post">
              <input type="text" for="cari" name="cari" class="col-sm-8" autofocus autocomplete="off">
              <button type="submit" name="search" id="cari" class="btn btn-outline-dark">Search</button>
            </form>
          </div>

        <table class="table table-hover mt-2">
          <thead class="table-dark">
              <tr>
              <th scope="col">NO</th>
              <th scope="col">Kode Alternatif</th>
              <th scope="col">Alternatif</th>
              <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>

          <?php $no=1; ?>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
              <th scope="row"><?= $no;?></th>
              <td><?= $row["kAlternatif"];?></td>
              <td><?= $row["nmAlternatif"];?></td>
              <td>
                  <a href="editDataAlternatif.php?id=<?= $row["kAlternatif"];?>"><i class="fas fa-edit"></i></a>  | 
                  <a href="hapusalternatif.php?id=<?= $row["kAlternatif"];?>" onclick="return confirm('yakin ingin menghapus?');"><i class="fas fa-trash-alt"></i></a>
              </td>
              </tr>
          <?php $no++; ?>
          <?php endwhile; ?>
          </tbody>
        </table>
        

    </div>
  </div>
  <hr class="mt-5">
</div>
</div>

<?php require_once 'tampletes/footer.php'; ?>