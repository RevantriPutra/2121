<?php
session_start();




require_once "koneksi.php";
$query = 'SELECT * FROM bobot';

$result = mysqli_query($conn, $query);

if ( isset($_POST["submit"]) ) {
  $bc1 = htmlspecialchars($_POST['bc1']);
  $bc2 = htmlspecialchars($_POST['bc2']);
  $bc3 = htmlspecialchars($_POST['bc3']);
  $bc4 = htmlspecialchars($_POST['bc4']);
  $id = $_POST['id'];

    $query = "UPDATE bobot SET
                bc1 = '$bc1',
                bc2 = '$bc2',
                bc3 = '$bc3',
                bc4 = '$bc4'
                WHERE id = $id
            ";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0 ) {
    echo "
        <script>
            alert('data bobot berhasil disimpan!');
            document.location.href = 'perangkinganpengguna.php';
        </script>
        ";
  } else {
    echo "
        <script>
            alert('data bobot gagal disimpan!');
        </script>
    ";
    mysqli_error($conn);
  }
 

}


?>

<?php require_once 'tampletes/headerpengguna.php'; ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-3 mt-3">


    </div>
    <div class="jumbotron col-7 mt-5 animate__animated animate__bounceInDown animate__slower">
        <h2 class="ml-5">DATA LAPTOP</h2>


        <form action="" method="post">

    <?php while ( $data = mysqli_fetch_assoc($result) ) : ?>
        <div class="ml-5">
        <div class="form-group row mt-5">

            <label for="bc1" class="col-sm-4 col-form-label mt">HARGA</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="bc1" id="bc1"required value="<?= $data["bc1"]; ?>">
            </div> 
        </div>
        <div class="form-group row">
            <label for="bc2" class="col-sm-4 col-form-label">Prosesor</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="bc2" id="bc2"required value="<?= $data["bc2"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc3" class="col-sm-4 col-form-label">RAM</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="bc3" id="bc3"required value="<?= $data["bc3"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc4" class="col-sm-4 col-form-label">VGA</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="bc4" id="bc4"required value="<?= $data["bc4"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-7">
            <input type="hidden" class="form-control" name="id" id="id"required value="<?= $data["id"] ?>">
            </div>
        </div>
        </div>
         <hr class="mt-5"><p class="ml-5">*Masukan Nilai Untuk Setiap Kriteria (Total Nilai 10)</p><hr>

        <?php endwhile; ?>

        <div class="form-group row justify-content-end col-sm-11 mt-4">
            <button type="submit" name="submit" class="btn btn-info btn-lg">Cari</button>
        </div>

        </form>

    </div>
  </div>

<div class="container mt-5"></div>
?>
<?php require_once 'tampletes/footer.php'; ?>