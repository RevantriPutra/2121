<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}

require_once "koneksi.php";

$query = 'SELECT * FROM kreteria';

$result = mysqli_query($conn, $query);

// mencari nilai max dam min

$maxMin = "SELECT MAX(c1) as c1, MAX(c2) as c2, MAX(c3) as c3, MAX(c4) as c4 FROM kreteria";

$nilai = mysqli_query($conn, $maxMin);

$data = mysqli_fetch_assoc($nilai);
// set milai min dan maxa ke variabel
$maxC1 = $data['c1'];
$maxC2 = $data['c2'];
$maxC3 = $data['c3'];
$maxC4 = $data['c4'];

 
?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
    <div class="jumbotron mt-5 mb-5 animate__animated animate__bounceInDown animate__slower">
      <div class="row justify-content-center">
        <div class="col-10 mt-5 mb-5">

        <h2>Menghitung SAW</h2>
        <div class="mt-5 mb-5 ">
        
        <div class="col mt-3">
          <h5>MATRIK KEPUTUSAN</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
            <th scope="col">Alternatif</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <td><?= $row["Nama"];?></td>
            <!--td><?= $row["kAlternatif"];?></td-->
            <td><?= $row["c1"];?></td>
            <td><?= $row["c2"];?></td>
            <td><?= $row["c3"];?></td>
            <td><?= $row["c4"];?></td>
            </tr>
        <?php $no++; ?>
        <?php endwhile; ?>
        </tbody>
        </table>

        <div class="col mt-5">
          <h5>NILAI MAX </h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
            <th scope="col">MAX C1</th>
            <th scope="col">MAX C2</th>
            <th scope="col">MAX C3</th>
            <th scope="col">MAX C4</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $maxC1;?></td>
            <td><?= $maxC2;?></td>
            <td><?= $maxC3;?></td>
            <td><?= $maxC4;?></td>
            </tr>
        </tbody>
        </table>

        <div class="col mt-5">
          <h5>NORMALISASI / NILAI MAX</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
              <th scope="col">Alternatif</th>
              <th scope="col">R1</th>
              <th scope="col">R2</th>
              <th scope="col">R3</th>
              <th scope="col">R4</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          $query = 'SELECT * FROM kreteria';
          $data = mysqli_query($conn, $query);
        ?>
        <?php while ($rows = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <!--td><?= $rows["kAlternatif"];?></td-->
                <td><?= $rows["Nama"];?></td>
                <td><?= round ($rows["c1"] / $maxC1 ,3) ;?></td>
                <td><?= round ($rows["c2"] / $maxC2 ,3);?></td>
                <td><?= round ($rows["c3"] / $maxC3 ,3);?></td>
                <td><?= round ($rows["c4"] / $maxC4 ,3);?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        

    </div>
  </div>
</div>
</div>

<?php require_once 'tampletes/footer.php';
?>