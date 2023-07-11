<?php
  include_once('lib/db_login.php');
?>
<?php include 'include/header_akun.php'; ?>

<!--content-->

<div class="content">
     
<div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cloud-upload-94 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Data Akun</p>
                      <p class="card-title">
                      <?php
                       $result = mysqli_query($db, "SELECT * FROM tb_akun");
                       
                       
                       $row_cnt = mysqli_num_rows($result);

                       echo "$row_cnt";

                       ?><p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-book-bookmark text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Buku Besar</p>
                      <p class="card-title"> <?php
                       $result = mysqli_query($db, "SELECT DISTINCT tahun FROM tb_buku");
                       
                       
                       $row_cnt = mysqli_num_rows($result);

                       echo "$row_cnt";

                       ?><p>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cart-simple text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Neraca Saldo</p>
                      <p class="card-title"> <?php
                       $result = mysqli_query($db, "SELECT DISTINCT tahun FROM tb_neraca");
                       
                       
                       $row_cnt = mysqli_num_rows($result);

                       echo "$row_cnt";

                       ?><p>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jurnal Umum</p>
                      <p class="card-title"> <?php
                       $result = mysqli_query($db, "SELECT DISTINCT tahun FROM tb_jurnal");
                       
                       
                       $row_cnt = mysqli_num_rows($result);

                       echo "$row_cnt";

                       ?><p>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
        </div>

        <div class="row">
            
        <!-- Tabel -->
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Data Akun</h4>
              </div>
              <div class="card-body">

                <?php
              include_once('lib/db_login.php');

              
                $id = !empty($_GET['id']) ? $_GET['id']:'';
                $no_reff = !empty($_GET['no_reff']) ? $_GET['no_reff']:'';
                $query ="SELECT * FROM tb_akun WHERE no_reff='$no_reff'AND id='$id'";
                $result = $db->query($query);
                while($row = $result->fetch_object()){

                ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="mb-3">
                    <label for="no_reff" class="form-label">No.Reff/Akun</label>
                    <input type="text" class="form-control" id="no_reff" aria-describedby="anything" name="no_reff" value="<?php echo $row->no_reff ?>"required>
                    <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_noreff)) echo $error_noreff; ?></div>
                  </div>
                  <div class="mb-3">
                    <label for="nama_akun" class="form-label">Nama Akun</label>
                    <input type="text" class="form-control" id="nama_akun" name ="nama_akun" value="<?php echo $row->nama_reff ?>"required>
                    <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_namakun)) echo $error_namakun; ?></div>
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control" rows="4" id="keterangan" name="keterangan" value="<?php echo $row->keterangan ?>"required></textarea>
                    <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_keterangan)) echo $error_keterangan; ?></div>
                  </div>
               
                  <input type="submit"  value="submit" name="submit" class="btn btn-danger shadow rounded">
                  <input type="button" value="Kembali"  class="btn btn-primary shadow rounded" onclick="history.back()">
                </form>

                <?php } ?>
                </div>
              </div>
            </div>
          </div>
          
        </div>

      </div>

      <?php 





if (isset($_POST['submit'])) {
    $valid = TRUE;
  $no_reff = $nama_akun= $keterangan = $tanggal_awal = $tanggal_akhir= '';

$no_reff = $_POST['no_reff'];
if(empty($no_reff)){
  $error_noreff = 'harus diisi';
  $valid = FALSE;
}
$nama_akun = $_POST['nama_akun'];
  if(empty($nama_akun)){
    $error_namakun = ' harus diisi';
    $valid = FALSE;
  }


$keterangan = $_POST['keterangan'];
if(empty($keterangan)){
  $error_keterangan = 'harus diisi';
  $valid = FALSE;
}

if($valid==TRUE) {

$query = "UPDATE tb_akun SET no_reff ='$no_reff',nama_akun='$nama_akun',keterangan='$keterangan' WHERE id='$id'";
 $result = $db->query($query);

 
      if (!$result) {
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
      } else {

      
          echo "<script>
              
              var yakin = alert('Data Anda akan di edit di jurnal');
              if (yakin) {
                  window.location='data_akun.php';
              }</script>";
      
          $db->close();
          
        }
  }else{
    echo "<script>alert('Maaf belum berhasil');window.location='data_akun.php'</script>";
  }
};

?>
     
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 