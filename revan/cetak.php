<?php
if ($_GET == 1) {
   echo  "<script>
    window.print();
    </script>";
}

require_once "koneksi.php";

// $query = 'SELECT * FROM kreteria';

// $result = mysqli_query($conn, $query);

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/cetak.css">
    <title>Laporan-spk</title>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PERANGKINGAN</h2>
        <h3>Hasil akhir perangkingan Pemilihan Laptop Untuk <p> Industri Kreatif 
         <p>Sistem Pendukung Keputusan Metode SAW</h3>
        <hr>
    </div>

    <table border=1>
    <tr>
            <th scope="col">KODE LAPTOP</th>
            <th scope="col">NAMA</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">TOTAL NILAI</th>
            <th scope="col">RANGKING</th>
            <th scope="col">KEPUTUSAN</th>
    </tr>
    <?php
            $query ="SELECT kAlternatif,Nama, c1, c2, c3, c4,  
            bc1, bc2, bc3, bc4
            FROM kreteria, bobot ORDER BY c1 DESC, c2 DESC, c3 DESC, c4 DESC";
            
            $result = mysqli_query($conn, $query);

        ?>
        
        <?php $rangking = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <?php 
        
        $KodaAlternatif = $row["kAlternatif"];
        $Nama = $row["Nama"];
        $c1 = round ($row["bc1"] * ($row["c1"] / $maxC1),3);
        $c2 = round ($row["bc2"] * ($row["c2"] / $maxC2),3);
        $c3 = round ($row["bc3"] * ($row["c3"] / $maxC3),3);
        $c4 = round ($row["bc4"] * ($row["c4"] / $maxC4),3);
        $total =round ($c1 + $c2 + $c3 + $c4,3) ;
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
    
    </table>

</body>
</html>