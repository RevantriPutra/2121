<?php
session_start();

if( !isset($_SESSION['login']) ) {
  header("location: login.php");
  exit;
}


require_once "koneksi.php";

if ( isset($_POST["submit"]) ) {
  $kodeAlternatif = htmlspecialchars($_POST['kodeAlternatif']);
  $alternatif = htmlspecialchars($_POST['alternatif']);

    $query = "INSERT INTO alternatif 
                VALUES ('$kodeAlternatif', '$alternatif')
                ";

    $coba = mysqli_query($conn, $query);

    if ( mysqli_affected_rows($conn) > 0 ) {
      echo "
      <script>
              alert('data alternatif berhasil diedit!');
              document.location.href = 'view.php';
      </script>
      ";
    } else {
      echo "
      <script>
            alert('data alternatif gagal diedit!');
      </script>
      ";
      mysqli_error($conn);
    }
}


?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
  <div class="jumbotron mt-5 mb-5 animate__animated animate__bounceInDown animate__slower">
    <h2 class="mt-4 mb-5 ml-5">INPUT DATA ALTERNATIF</h2>
    <div class="row">
        <div class="col-2 mt-3 ml-5">
          <a class="d-block btn btn-info mt-5" href="input.php">Data Alternatif</a>
          <a class="d-block btn btn-info mt-3" href="dataKreteria.php">Data Kriteria</a>

        </div>
    <div class="col-9 mt-5">
            <?php if ( mysqli_affected_rows($conn) > 0 ) : ?>
            <?php echo '
              <div class="alert alert-success" role="alert">
              Data Berhasil ditambahkan!</div>';  
            ?>
        <?php endif; ?>
        <hr>
        
        


        <form action="" method="post">
        <div class="form-group row mt-5">
            <label for="kodeAlternatif" class="col-sm-2 col-form-label ml-5">Kode Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="kodeAlternatif" id="kodeAlternatif" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Nama Alternatif" class="col-sm-2 col-form-label ml-5">Nama Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="alternatif" id="alternatif"required>
            </div>
        </div>
        <hr class="mt-5 mb-5">
        <div class="form-group row justify-content-end col-sm-12 mt-4">
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        </div>

        </form>

    </div>
  </div>
  </div>
</div>
<div class="mt-5"></div>
<?php require_once 'tampletes/footer.php'; ?>
