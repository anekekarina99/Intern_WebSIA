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
              <form action="" method="POST">
              <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" required>
                    <div class="error" style="color: blue; font-size: 12px;"> Isian format : Tahun-Bulan-Tanggal, contoh 2021-01-13 </div>
                    <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_tanggal)) echo $error_tanggal; ?></div>
                  </div>

                  <div class="mb-3">
              <label for="bulan" class="form-label">Bulan</label>
                <input type="text" class="form-control" id="bulan" name="bulan"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_bulan)) echo $error_bulan; ?></div>
              </div>

              
              <div class="mb-3">
              <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_tahun)) echo $error_tahun; ?></div>
              </div>

              <div class="mb-3">
                <label for="no_reff" class="form-label">No.Reff/ Akun</label>
                <input type="text" class="form-control" id="no_reff" name ="no_reff"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_noreff)) echo $error_noreff; ?></div>
              </div>

              <div class="mb-3">
                <label for="nama_akun" class="form-label">Nama Akun</label>
                <input type="text" class="form-control" id="name_akun"name="nama_akun"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_namakun)) echo $error_namakun; ?></div>
              </div>

              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan"name="keterangan"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_keterangan)) echo $error_keterangan; ?></div>
              </div>

              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Saldo</label>
                    <select class="form-control" name="jenis">
                        <option >---Silahkan dipilih---</option>
                        <option value="Debit">Debit</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_jenis)) echo $error_jenis; ?></div>
              </div>
                 
              <div class="mb-3">
              <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" id="saldo" name="saldo"required>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_saldo)) echo $error_saldo; ?></div>
              </div>

            

              <div class="mb-3">
              <label for="bukti" class="form-label">Nomor Bukti</label>
                <input type="text" class="form-control" id="bukti" name="bukti" required>
                <div class="error" style="color: blue; font-size: 12px;"> Isian format : Tahun-Bulan-Tanggal, contoh 2021/01/13 </div>
                <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_bukti)) echo $error_bukti; ?></div>
              </div>
            
              <input type="submit"  value="submit" name="submit" class="btn btn-info shadow rounded">
              
              <a class="btn btn-danger shadow rounded"href="jurnal_umum_biasa.php" role="button">Kembali</a>
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
              $i =0;
              $result = mysqli_query($db, "SELECT * FROM tb_jurnal");     
              $i = mysqli_num_rows($result);
              $sem = $i+1;
              $query = "INSERT INTO tb_jurnal (tgl,nama_reff,no_reff,keterangan,jenis,debit_jurnal,kredit_jurnal,no_bukti,bulan,tahun,id) VALUES ('$tanggal','$nama_akun','$no_reff','$keterangan','$jenis','$saldo','0','$no_bukti','$bulan','$tahun','$sem')";
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
                      $query3 = "INSERT INTO tb_buku (tgl_buku,nama_akun,no_reff_akun,no_bukti,debit_buku,kredit_buku,saldo_kredit,saldo_debit,tahun,bulan,id)
                       VALUES ('$tanggal','$nama_akun','$no_reff','$no_bukti','$saldo','0','0','$saldo_debit_sem', '$tahun','$bulan','$sem')";
                       $result = $db->query($query3);

                      if (!$result) {
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query3);
                        echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                      } else {
                        $query4 = "SELECT SUM(saldo_debit) AS total_debit FROM tb_buku WHERE no_reff_akun ='$no_reff'";
                        $result = $db->query($query4);

                        $row = $result->fetch_array();
                        $total_debit = $row["total_debit"];

                        $result = mysqli_query($db, "SELECT * FROM tb_neraca WHERE nama_reff='$nama_akun'");     
                        $i = mysqli_num_rows($result);

                        if($i >0){

                          $query5 = "UPDATE tb_neraca SET saldo_debit='$total_debit' WHERE no_reff = '$no_reff'";
                          $result = $db->query($query5);
  
                            if (!$result) {
                              die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                              echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                            } else{
    
                              echo "<script>
                      
                              var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                              if (yakin) {
                                  window.location='tambah_akunTo_jurna_biasa.php';
                              } </script>";
                            $db->close();
                            }
                        }else{
                          $result = mysqli_query($db, "SELECT * FROM tb_neraca");     
                          $i = mysqli_num_rows($result);

                          $query5 = "INSERT INTO tb_neraca (no_reff,nama_reff,id,saldo_debit,saldo_kredit,bulan,tahun) VALUES('$no_reff','$nama_akun','$i','$total_debit','0','$bulan','$tahun')";
                          $result = $db->query($query5);
  
                            if (!$result) {
                              die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                              echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                            } else{
    
                              echo "<script>
                      
                              var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                              if (yakin) {
                                  window.location='tambah_akunTo_jurna_biasa.php';
                              } </script>";
                            $db->close();
                            }
                        }
                    }
                  }
                }
            }else{
              if($jenis=='Kredit'){
                $i =0;
                $result = mysqli_query($db, "SELECT * FROM tb_jurnal");     
                $i = mysqli_num_rows($result);
                $sem = $i+1;
                $query = "INSERT INTO tb_jurnal (tgl,nama_reff,no_reff,keterangan,jenis,debit_jurnal,kredit_jurnal,no_bukti,bulan,tahun,id) VALUES ('$tanggal','$nama_akun','$no_reff','$keterangan','$jenis','0','$saldo','$no_bukti','$bulan','$tahun','$sem')";
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
                      $query3 = "INSERT INTO tb_buku (tgl_buku,nama_akun,no_reff_akun,no_bukti,debit_buku,kredit_buku,saldo_kredit,saldo_debit,tahun,bulan,id)
                       VALUES ('$tanggal','$nama_akun','$no_reff','$no_bukti','0','$saldo','$saldo_kredit_sem','0', '$tahun','$bulan','$sem')";
                       $result = $db->query($query3);

                      if (!$result) {
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query3);
                        echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                      } else {

                        $query4 = "SELECT SUM(saldo_kredit) AS total_kredit FROM tb_buku WHERE no_reff_akun = '$no_reff'";
                        $result = $db->query($query4);

                        $row = $result->fetch_array();
                        $total_kredit = $row["total_kredit"];


                        $result = mysqli_query($db, "SELECT * FROM tb_neraca WHERE nama_reff='$nama_akun'");     
                        $i = mysqli_num_rows($result);

                        $i=$i+1;
                        if($i >0){

                          $query5 = "UPDATE tb_neraca SET saldo_kredit='$total_kredit' WHERE no_reff = '$no_reff'";
                          $result = $db->query($query5);
  
                            if (!$result) {
                              die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                              echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                            } else{
    
                              echo "<script>
                      
                              var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                              if (yakin) {
                                  window.location='tambah_akunTo_jurna_biasa.php';
                              } </script>";
                            $db->close();
                            }
                        }else{
                          $result = mysqli_query($db, "SELECT * FROM tb_neraca");     
                          $i = mysqli_num_rows($result);
                           $i =$i+1; 
                          $query5 = "INSERT INTO tb_neraca (no_reff,nama_reff,id,saldo_debit,saldo_kredit,bulan,tahun) VALUES('$no_reff','$nama_akun','$i','0','$total_kredit','$bulan','$tahun')";
                          $result = $db->query($query5);
  
                            if (!$result) {
                              die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                              echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
                            } else{
    
                              echo "<script>
                      
                              var yakin = confirm('Data Akun sudah ditambahkan di jurnal');
                              if (yakin) {
                                  window.location='tambah_akunTo_jurna_biasa.php';
                              } </script>";
                            $db->close();
                            }
                        }
                    }
                  }
                }
              }else{
                  $error_jenis = "Mohon maaf tidak sesuai";
            }
          }
        
      }else{
        echo "<script>confirm('Maaf belum berhasil, isi data secara lengkap');window.location='tampil_jurnal_biasa.php'</script>";
      }
    };
 
      ?>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 