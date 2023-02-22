<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


?>


<?php require_once 'tampletes/header.php'; ?>

<div class="container col-11 mt-5 ">
    <div class="row justify-content-center">
        <h1 class="ml-auto text-white text-white animate__animated animate__bounceInDown animate__slow ">Halo Admin</h1>
        <div class="container mt-5"></div>
           <div class="ml-auto animate__zoomIn animate__animated ">
                <div class="p-5 rounded">
                    <img src="images/gambar4.png" width="600px ml-11" ><br>
                </div>
            </div>

            <div class="col-6">
                    <div class="text-white animate__animated animate__bounceInDown animate__slow ">

                        <div class="btn btn-outline-light col-md-12">
                        <h2 class="display-7 mt-5 mb-4" > Penerapan Metode SAW Dalam Memilih Laptop Untuk Industri Kreatif </h2>
                        <hr>

                         <p>Sistem pendukung keputusan adalah sebuah sistem untuk mencari pendukung keputusan, yang mana keputusan diambil menggunakan sistem yang dibuat berdasarkan kebutuhan pemakaian, dalam membantu menentukan suatu keputusan.</p>-
                         <p>Metode Simple Additive Weighting merupakan  metode  penjumlahan  terbobot.  Konsep  dasar  metode  SAW  adalah mencari  penjumlahan  terbobot  dari  rating  kinerja  pada  setiap  alternatif  pada  semua kriteria. Metode SAW membutuhkan proses  normalisasi matrik  keputusan (X) ke suatu skala  yang dapat diperbandingkan dengan semua rating alternatif  yang ada. </p>-
                         <p class="mb-5">Sistem pendukung keputusan dengan menggunakan metode SAW. Terdapat 4 kriteria yang dinilai dalam sistem ini yaitu C1 (Harga), C2 (Processor), C3 (RAM), C4 (VGA). Dari setiap kriteria terdapat bobot-bobot yang dapat diinputkan didalam sistem ini. Sistem ini bertujuan untuk menentukan keputusan para calon pembeli laptop dalam memilih laptop yang sesuai dengan kriteria-kriteria dan kebutuhan dibidang industri kreatif, dengan menggunakan perangkingan.</p>
                        </div>


                    </div>
            </div>
        </div>
    </div>
    <div class="container mt-5"></div>
</div>
<div class="container mt-5"></div>
<?php require_once 'tampletes/footer.php' ?>

