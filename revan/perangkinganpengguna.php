<?php
session_start();



require_once "koneksi.php";

//$desc_query = 'SELECT * FROM total nilai DESC';

//$result = mysqli_query($conn, $query);





// mencari nilai max dam min
$maxMin = "SELECT MAX(c1) as c1, MAX(c2) as c2, MAX(c3) as c3, MAX(c4) as c4 FROM kreteria";

$nilai = mysqli_query($conn, $maxMin);

$data = mysqli_fetch_assoc($nilai);
// var_dump($data); die;
// set Nilai min dan max ke variabel
$maxC1 = $data['c1'];
$maxC2 = $data['c2'];
$maxC3 = $data['c3'];
$maxC4 = $data['c4'];
 
?>

<?php require_once 'tampletes/headerpengguna.php'; ?>


<div class="container mt-4">
	
  <div class="row justify-content-center">

    <div class="jumbotron col-11 mt-5 animate__animated animate__bounceInDown animate__slower">
        <h2>HASIL REKOMENDASI</h2>
        <div class="tengah ">

        </div>

        <table class="table table-lg mt-5 ">
        <thead class="table-dark">
            <tr>
            <th scope="col">KODE KRITERIAN</th>
            <th scope="col">NAMA</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">TOTAL NILAI</th>
            <th scope="col">RANGKING</th>
            <th scope="col">KEPUTUSAN</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query ="SELECT kAlternatif,Nama, c1, c2, c3, c4,  
            bc1, bc2, bc3, bc4
            FROM kreteria, bobot ORDER BY c1 DESC, c2 DESC, c3 DESC, c4 DESC";
            
            $result = mysqli_query($conn, $query);

        ?>
        
        <?php $rangking = 1; ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
        <?php 
        
        $KodaAlternatif = $row["kAlternatif"];
        $Nama = $row["Nama"];
        $c1 = round ($row["bc1"] * ($row["c1"] / $maxC1),3);
        $c2 = round ($row["bc2"] * ($row["c2"] / $maxC2),3);
        $c3 = round ($row["bc3"] * ($row["c3"] / $maxC3),3);
        $c4 = round ($row["bc4"] * ($row["c4"] / $maxC4),3);
        $total = round ($c1 + $c2 + $c3 + $c4,3) ;
        $status = $total;

        

            if ($status < 5){
                $status = 'Tidak Terbaik';
            } else {
                $status = 'Terbaik';
            }
        
        ?>
            <tr>
            <td><?= $KodaAlternatif; ?></td>
            <td><?= $Nama; ?></td>
            <td><?= $c1; ?></td>
            <td><?= $c2; ?></td>
            <td><?= $c3; ?></td>
            <td><?= $c4; ?></td>
            <td><?= $total; ?></td>
            <td><?= $rangking; ?></td>
            <td><?= $status; ?></td>
            </tr>
        <?php $rangking++; ?>
        <?php endwhile; ?>
        </tbody>
        </table>
        <div class="col mt-5 row justify-content-end col-sm-12 ">
          <a href="cetak.php?p=1" class="btn btn-info btn-lg mb-4 " target="_blank">Cetak <i class="fas fa-print"></i></a>
        </div>

    </div>
  </div>
</div>
<div class="container mt-5 "></div>
<?php require_once 'tampletes/footer.php';
?>