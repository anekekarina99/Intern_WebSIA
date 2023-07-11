<?php
  include_once('lib/db_login.php');

  session_start();

  if($_SESSION['status'] !="pegawai"){
    header("location:index.php");
  };
?>
<?php include 'include/header_index_biasa.php'; ?>

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
           <!--  <button type="button" class="btn btn-warning" onclick="">Tambah Akun</button> -->
                </div>  


            <div class="card-header">
                <h4 class="card-title"> Data Akun</h4>
              </div>
              <div class="card-body">
           
                <div class="table-responsive">
                
                  <table class="table table-hover table-striped">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        No.Reff
                      </th>
                      <th>
                        Nama Reff
                      </th>
                      <th >
                        Keterangan
                      </th>
                      <th >
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                    <?php
                      $query = "SELECT * FROM tb_akun"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        $i = 1;
                        while ($row = $result->fetch_object()) {

                          echo '<tr>';
                          echo '<th scope="row">'.$i.'</th>';
                          echo '<td>'.$row->no_reff.'</td>';
                          echo '<td>'.$row->nama_reff.'</td>';
                          echo '<td>'.$row->keterangan.'</td>';
                          echo '<td>  <a class="btn btn-secondary shadow rounded" href="edit_data_akun.php?no_reff='.$row->no_reff.'" role="button">Edit</a>
                                      <a class="btn btn-danger shadow rounded" href="hapus_data_akun.php?no_reff='.$row->no_reff.'" role="button">Hapus</a></td>';
                          
                                      $i++;
                        }
                        echo '</tr>';
                        
                      }

                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

<!--Tabel jurnal umum-->

<div class="card">
            <div class="container mt-1">
            <div class="row">
                <div class="col-5">
                <a type="button" class="btn btn-primary shadow rounded" href="tambah_akunTo_jurna.php">Tambah Akun ke Jurnal</a>
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
                <a class="btn btn-info mt-3" href="#" role="button">Cari</a>
                </div>      
            </div>
           
        </div>  
            <div class="card-header">
                <h4 class="card-title"> Jurnal </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead class=" text-secondary">
                      <th>
                        No
                      </th>
                      <th>
                        Periode
                      </th>
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                    <?php 


                $query = "SELECT DISTINCT bulan, tahun FROM tb_jurnal"; 
                $result = $db->query($query);

                if(!$result){
                  die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                }else{
                  $i = 1;
                  while ($row = $result->fetch_object()) {

                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->bulan.' '.$row->tahun.'</td>';
                    echo '<td>  <a class="btn btn-md btn-warning shadow rounded" href="tampil_jurnal.php?bulan='.$row->bulan.'&tahun='.$row->tahun.'" role="button">Tampil</a>
                              </td>';
                              
                              $i++;
                  }
                  echo '</tr>';
                  
                }

            ?>
                   
                     
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!--End tabel jurnal umum-->

            <!--Tabel buku-->

            <div class="card">
            <div class="container mt-1">
            <div class="row justify-content-sm-center">
            <div class="col-sm">
               
                </div>
                <div class="col-sm">
                <!--
                    <div class="form-group">
                        <select class="form-control form-control-sm mt-3" style="width: 150px;">
                            <option>Bulan</option>
                        </select>  
                    </div>-->
                </div>
                <div class="col-sm">
                   <!-- <div class="form-group">
                        <select class="form-control form-control-sm mt-3" style="width: 150px;">
                            <option>Tahun</option>
                        </select>  
                    </div>-->
                </div>
                <div class="col-sm">
                <!--<a class="btn btn-success mt-4" href="#" role="button">Cari</a>-->
                </div>    
            </div>
           
        </div>  
            <div class="card-header">
                <h4 class="card-title"> Buku Besar</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead class=" text-secondary">
                      <th>
                        No
                      </th>
                      <th>
                        Bulan
                      </th>
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      
                    <?php 


              $query = "SELECT DISTINCT bulan, tahun FROM tb_buku"; 
              $result = $db->query($query);

              if(!$result){
                die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
              }else{
                $i = 1;
                while ($row = $result->fetch_object()) {

                  echo '<tr>';
                  echo '<th scope="row">'.$i.'</th>';
                  echo '<td>'.$row->bulan.' '.$row->tahun.'</td>';
                  echo '<td>  <a class="btn btn-md btn-warning shadow rounded" href="tampil_buku_biasa.php?bulan='.$row->bulan.'&tahun='.$row->tahun.'&nama_reff=0" role="button">Tampil</a>
                            </td>';
                            
                            $i++;
                }
                echo '</tr>';
                
              }


              ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                <!--End tabel buku-->

                <!--Tabel neraca saldo-->
                <div class="card">
            <div class="container mt-1">
           
        </div>  
            <div class="card-header">
                <h4 class="card-title"> Neraca Saldo</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Tahun
                      </th>
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     
                    $query = "SELECT DISTINCT tahun FROM tb_neraca"; 
                $result = $db->query($query);

                if(!$result){
                  die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                }else{
                  $i = 1;
                  while ($row = $result->fetch_object()) {

                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->tahun.'</td>';
                    echo '<td>  <a class="btn btn-md btn-warning shadow rounded text-right" href="tampil_neraca_saldo.php?tahun='.$row->tahun.'" role="button">Tampil</a>
                              </td>';
                              
                              $i++;
                  }
                  echo '</tr>';
                }

              

            ?>
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                <!--end-->
                
                <!--Tabel laba/rugi-->

                <div class="card">
            <div class="container mt-1">
        
           
        </div>  
            <div class="card-header">
                <h4 class="card-title"> Laba dan Rugi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Tahun
                      </th>
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     
                     $query = "SELECT DISTINCT tahun FROM tb_neraca"; 
                 $result = $db->query($query);
 
                 if(!$result){
                   die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                 }else{
                   $i = 1;
                   while ($row = $result->fetch_object()) {
 
                     echo '<tr>';
                     echo '<th scope="row">'.$i.'</th>';
                     echo '<td>'.$row->tahun.'</td>';
                     echo '<td>  <a class="btn btn-md btn-warning shadow rounded text-right" href="tampil_laba_rugi.php?tahun='.$row->tahun.'" role="button">Tampil</a>
                               </td>';
                               
                               $i++;
                   }
                   echo '</tr>';
                 }
 
               $result->free();
               $db->close();
 
             ?>

                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                <!--End laba/rugi-->
          </div>
          
        </div>

      </div>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 