<?php
  include_once('lib/db_login.php');
?>
<?php include 'include/header_nrc_laba_rugi.php'; ?>

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
            <div class="container mt-1">
            <div class="row justify-content-sm-center">
            <div class="col-sm">
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <select class="form-control form-control-sm mt-3" style="width: 150px;">
                            <option>Bulan</option>
                        </select>  
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <select class="form-control form-control-sm mt-3" style="width: 150px;">
                            <option>Tahun</option>
                        </select>  
                    </div>
                </div>
                <div class="col-sm">
                <a class="btn btn-success mt-4" href="#" role="button">Cari</a>
                </div>      
            </div>
           
        </div>  
            <div class="card-header">
            <h3 class="card-title text-center font-weight-bold"> Laporan laba rugi : <br><span class="text-secondary">  <?php 
                
                      $tahun = $_GET['tahun'];
                      $query = "SELECT DISTINCT tahun FROM tb_neraca WHERE tahun= '$tahun'"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        while ($row = $result->fetch_object()) {

                          echo $row->tahun;
                        }
                        
                      }
                      
                      ?></span></h3>
                <h4 class="card-title"> Pendapatan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama Akun
                      </th>
                      <th>
                        Total
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     
                $query = "SELECT * FROM tb_neraca WHERE nama_reff ='Penjualan' || nama_reff='Pendapatan lain lain'"; 
                 $result = $db->query($query);
 
                 if(!$result){
                   die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                 }else{
                   $i = 1;
                   while ($row = $result->fetch_object()) {
 
                    echo '<tr>';
                    echo '<th scope="row">'.$row->nama_akun.'</th>';
                    echo '<td>'.$row->saldo_debit.'</td>';
                    echo '</tr>';
                   }
                 
                 }
 
             ?>
                    </tbody>
                  </table>
                </div>
              </div>


              <div class="card-header">
                <h4 class="card-title"> Biaya</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama Akun
                      </th>
                      <th>
                        Total
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     
                 $query = "SELECT * FROM tb_neraca WHERE nama_reff='Biaya Usaha' OR nama_reff ='Biaya Adm & Umum' OR nama_reff='Biaya Gaji Karyawan'OR nama_reff='Biaya Pelatihan'OR nama_reff='Biaya Depresiasi'OR nama_reff='Biaya Trans/Kom/Infrms'OR nama_reff='Biaya Lain' "; 
                 $result = $db->query($query);
 
                 if(!$result){
                   die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                 }else{
                   
                   while ($row = $result->fetch_object()) {
                    
                   
                     echo '<tr>';
                    echo '<th scope="row">'.$row->nama_akun.'</th>';
                    echo '<td>'.$row->saldo_debit.'</td>';
                    echo '</tr>';  
                   }
                   
                 }
 
               $result->free();
               $db->close();
 
             ?>

                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <a class="btn btn-primary mt-4 shadow" href="laba_rugi.php" role="button">Kembali</a>
          </div>
          
        </div>

      </div>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 