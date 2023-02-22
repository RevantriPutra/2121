<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php";
$query = 'SELECT * FROM bobot';

$result = mysqli_query($conn, $query);

?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
<div class="jumbotron mt-5 mb-5 animate__animated animate__bounceInDown animate__slower">
    <h2 class="ml-5">DATA BOBOT</h2>
  <div class="row">
            <div class="col-2 mt-5 ml-5">
              <a class="d-block btn btn-info mt-5" href="input.php">Data Alternatif</a>
              <a class="d-block btn btn-info mt-3" href="dataKreteria.php">Data Kriteria</a>
              <a class="d-block btn btn-info mt-3 mb-5" href="bobot.php">Bobot</a>
            </div>

    <div class="col-9 mt-3 mb-5">
        <hr class="mt-5 mb-5">
        <table class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col">BC1</th>
            <th scope="col">BC2</th>
            <th scope="col">BC3</th>
            <th scope="col">BC4</th>
            <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <td><?= $row["bc1"];?></td>
            <td><?= $row["bc2"];?></td>
            <td><?= $row["bc3"];?></td>
            <td><?= $row["bc4"];?></td>
            <td>
                <a href="editbobot.php?id=<?= $row["id"];?>"><i class="fas fa-edit"></i></a>
            </tr>

        <?php endwhile; ?>
        </tbody>
        </table>

        <hr class="mt-5 mb-5">

    </div>
  </div>
</div>
</div>

<?php require_once 'tampletes/footer.php'; ?>