<?php
  include_once('lib/db_login.php');
?>
<?php include 'include/header_jurnal_biasa.php'; ?>

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
                <h4 class="card-title"> Tambah Data Akun Ke Jurnal</h4>
              </div>
              <div class="card-body">
              <?php
                include_once('lib/db_login.php');

                $id = !empty($_GET["id"]) ? $_GET["id"] : '';
                $no_reff = !empty($_GET['no_reff']) ? $_GET['no_reff']:'';
                $query ="SELECT * FROM tb_jurnal WHERE id='$id'";
                $result = $db->query($query);
                while($row = $result->fetch_object()){

                ?>
              <form action="" method="POST">
              <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row->tgl; ?>"required>
                    <div class="error" style="color: blue; font-size: 12px;"> Isian format : Tahun-Bulan-Tanggal, contoh 2021-01-13 </div>
                    <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_tanggal)) echo $error_tanggal; ?></div>
                  </div>

                  <div class="mb-3">
              <label for="bulan" class="form-label">Bulan</label>
                <input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $row->bulan; ?>"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_bulan)) echo $error_bulan; ?></div>
              </div>

              
              <div class="mb-3">
              <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun"value="<?php echo $row->tahun; ?>"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_tahun)) echo $error_tahun; ?></div>
              </div>

              <div class="mb-3">
                <label for="no_reff" class="form-label">No.Reff/ Akun</label>
                <input type="text" class="form-control" id="no_reff" name ="no_reff" value="<?php echo $row->no_reff; ?>"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_noreff)) echo $error_noreff; ?></div>
              </div>

              <div class="mb-3">
                <label for="nama_akun" class="form-label">Nama Akun</label>
                <input type="text" class="form-control" id="name_akun"name="nama_akun" value="<?php echo $row->nama_reff; ?>"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_namakun)) echo $error_namakun; ?></div>
              </div>

              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan"name="keterangan" value="<?php echo $row->keterangan; ?>"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_keterangan)) echo $error_keterangan; ?></div>
              </div>

              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Saldo</label>
                    <select class="form-control" name="jenis">
                       
                        <?php 
                        if($row->jenis =="Debit" ){
                            echo "<option value=".$row->jenis.">".$row->jenis."</option>";
                            echo " <option value='Kredit'>Kredit</option>";
                        }else{
                            echo "<option value=".$row->jenis.">".$row->jenis."</option>";
                            echo " <option value='Debit'>Debit</option>";
                        }
                        ?>
                    </select>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_jenis)) echo $error_jenis; ?></div>
              </div>
                 
              <div class="mb-3">
              <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" id="saldo" name="saldo" value="
                <?php 
                
                if($row->jenis =="Debit" ){
                        echo $row->debit_jurnal;

                }else{
                    echo $row->kredit_jurnal;
                    }?>" required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_saldo)) echo $error_saldo; ?></div>
              </div>

        
              <div class="mb-3">
              <label for="bukti" class="form-label">Nomor Bukti</label>
                <input type="text" class="form-control" id="bukti" name="bukti" value="<?php echo $row->no_bukti; ?>"required>
                <div class="error" style="color: blue; font-size: 12px;"> Isian format : Tahun-Bulan-Tanggal, contoh 2021/01/13 </div>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_bukti)) echo $error_bukti; ?></div>
              </div>
            
              <input type="submit"  value="Tambah" name="submit" class="btn btn-info shadow rounded">
              
              <a class="btn btn-danger shadow rounded text-white" onclick="window.history.back()" role="button">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
      <?php 

        include_once('lib/db_login.php');

        if (isset($_POST['submit'])) {
            $valid = TRUE;
          $tanggal=$bulan= $tahun= $nama_akun=$no_reff=$jenis =$saldo=$no_bukti=$keterangan='';

        $tanggal = $_POST['tanggal'];
        if(empty($tanggal)){
          $error_tanggal = 'harus diisi';
          $valid = FALSE;
        }

        $bulan = $_POST['bulan'];
        if(empty($bulan)){
          $error_bulan = 'harus diisi';
          $valid = FALSE;
        }

        $tahun = $_POST['tahun'];
        if(empty($tahun)){
          $error_tahun = 'harus diisi';
          $valid = FALSE;
        }

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
            $error_keterangan = ' harus diisi';
            $valid = FALSE;
          }
        
          $jenis = $_POST['jenis'];
          if(empty($jenis)){
            $error_jenis = 'harus diisi';
            $valid = FALSE;
          }
          
        $saldo = $_POST['saldo'];
        if(empty($saldo)){
          $error_saldo = 'harus diisi';
          $valid = FALSE;
        }

        $no_bukti = $_POST['bukti'];
        if(empty($no_bukti)){
          $no_bukti = 'harus diisi';
          $valid = FALSE;
        }

        
        if($valid==TRUE) {
          if($jenis=='Debit'){
            $query = "UPDATE tb_jurnal SET tgl = '$tanggal',nama_reff ='$nama_akun',no_reff ='$no_reff',keterangan='$keterangan',jenis='$jenis',debit_jurnal='$saldo',kredit_jurnal='0',no_bukti='$no_bukti',bulan='$bulan',tahun='$tahun'WHERE id='$id'";
            $result = $db->query($query);
              if (!$result) {
                die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
              } else {
          
                  $query2 = "SELECT  * FROM tb_jurnal ";
                  $result = $db->query($query2);

                  if (!$result) {
                    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query2);
                    echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                  } else {

                    $saldo_debit_sem = 0;
                    
                    while ($row = $result->fetch_object()) {

                          $saldo_debit_sem =  $row->debit_jurnal - $row->kredit_jurnal ;
                      }

                    $query3 = "UPDATE tb_buku SET debit_buku ='$saldo_debit_sem'WHERE id='$id'";
                     $result = $db->query($query3);

                    if (!$result) {
                      die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query3);
                      echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                    } else {

                        $query4 = "SELECT SUM(saldo_debit) AS total_debit FROM tb_buku WHERE no_reff_akun ='$no_reff'";
                      $result = $db->query($query4);

                      $row = $result->fetch_array();
                      $total_debit = $row["total_debit"];

                      $query5 = "UPDATE tb_neraca SET saldo_debit ='$total_debit'WHERE nama_reff='$nama_akun'";
                      $result = $db->query($query5);

                      if (!$result) {
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                        echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                      } else{

                        echo "<script>
                
                        var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                        if (yakin) {
                            window.location='edit_data_jurnal_biasa.php';
                        } </script>";
                       $db->close();
                      }
                    
                  }
                }
                
            }
          }else{
            if($jenis=='Kredit'){
              $query = "UPDATE tb_jurnal SET tgl = '$tanggal',nama_reff ='$nama_akun',no_reff ='$no_reff',keterangan='$keterangan',jenis='$jenis',debit_jurnal='0',kredit_jurnal='$saldo',no_bukti='$no_bukti',bulan='$bulan',tahun='$tahun'WHERE id='$id'";
            $result = $db->query($query);
              if (!$result) {
                die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
              } else {
                  $query2 = "SELECT  * FROM tb_jurnal ";
                $result = $db->query($query2);

                  if (!$result) {
                    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query2);
                    echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                  } else {

                    $saldo_debit_sem = 0;
                    $saldo_kredit_sem = 0;
                    while ($row = $result->fetch_object()) {

                          $saldo_kredit_sem =  $saldo_debit_sem -$row->debit_jurnal + $row->kredit_jurnal ;
                      }
                    $query3 = "UPDATE tb_buku WHERE kredit_buku='$saldo_kredit_sem'WHERE id='$id'";
                     $result = $db->query($query3);

                    if (!$result) {
                      die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query3);
                      echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                    } else {
                      

                      $query4 = "SELECT SUM(saldo_kredit) AS total_kredit FROM tb_buku WHERE no_reff_akun = '$no_reff'";
                      $result = $db->query($query4);

                      $row = $result->fetch_array();
                      $total_kredit = $row["total_kredit"];

                      $query5 = "UPDATE tb_neraca SET saldo_kredit ='$total_kredit'WHERE nama_reff='$nama_akun'";
                      $result = $db->query($query5);

                      if (!$result) {
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                        echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                      } else{

                        echo "<script>
                
                        var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                        if (yakin) {
                            window.location='edit_data_jurnal_biasa.php';
                        } </script>";
                       $db->close();
                      }  
                  }
                }
            }
          }else{
                $error_jenis = "Mohon maaf tidak sesuai";
          }
        }
      
    }else{
      echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal.php'</script>";
    }
  }
};

 
      ?>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 