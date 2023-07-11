<?php
  include_once('lib/db_login.php');
?>
<?php include 'include/header_buku.php'; ?>

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
                <div class="container mt-1 mb-2">

                <?php

                    $query = "SELECT DISTINCT bulan,tahun,nama_akun FROM tb_buku"; 
                    $result = $db->query($query);

                    if(!$result){
                    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                    }else{
                    $i = 1;
                    while ($row = $result->fetch_object()) {

                        echo '<a type="button" class="btn btn-info text-white shadow rounded-md" href="tampil_buku.php?bulan='.$row->bulan.'&tahun='.$row->tahun.'&nama_reff='.$row->nama_akun.'">'.$row->nama_akun.'</a>';
                     
                                
                                $i++;
                    }
                    echo '</tr>';
                    
                    }

                ?>
               
                </div>
                
            <div class="card-header">
                <h5 class="card-title text-center font-weight-bold"> Buku Besar :  <br><span class="text-secondary mt-2">  <?php 
                
                      $bulan = $_GET['bulan'];
                      $tahun = $_GET['tahun'];
                      $nama_reff = $_GET['nama_reff'];
                      $query = "SELECT DISTINCT nama_akun,no_reff_akun  FROM tb_buku WHERE bulan = '$bulan'AND tahun= '$tahun' AND nama_akun ='$nama_reff'"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        while ($row = $result->fetch_object()) {

                          echo $row->nama_akun;
                       
                      
                      ?></span></h5>

                      <h6> Nomor Reff: <span class="text-info font-weight-bold"><?php 

                            echo $row->no_reff_akun;
                      
                    }
                        
                }
                      ?></span>
                      </h6>
              </div>
              <div class="card-body">
           
                <div class="table-responsive">
                
                  <table class="table table-hover table-striped">
                    <thead class=" text-primary text-center">
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Nama Akun/ Nama Reff
                      </th>
                      <th >
                        No.Bukti
                      </th>
                      <th >
                        Debit
                      </th>
                      <th >
                        Kredit
                      </th>
                      <th>
                        Saldo Debit
                      </th>
                      <th>
                        Saldo Kredit
                      </th>
                    </thead>
                    <tbody>
                    <?php
                      $query = "SELECT * FROM tb_buku WHERE bulan='$bulan' AND tahun='$tahun' AND nama_akun='$nama_reff'"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        $jumlah=0;
                        $jumlah2 =0;
                        $i = 0;
                        while ($row = $result->fetch_object()) {

                            $jumlah= $row->saldo_debit + $jumlah;
                            $jumlah2= $row->saldo_kredit + $jumlah2;
                        
                          echo '<tr>';
                          echo '<td>'.date('d F Y',strtotime($row->tgl_buku)).'</td>';
                          echo '<td>'.$row->nama_akun.'</td>';
                          echo '<td>'.$row->no_bukti.'</td>';
                          echo '<td>Rp ' . number_format($row->debit_buku,2,',','.').'</td>';
                          echo '<td>Rp ' . number_format($row->kredit_buku,2,',','.').'</td>';
                          echo '<td>Rp ' . number_format($jumlah,2,',','.').'</td>';
                        
                            echo '<td>Rp ' . number_format($jumlah2,2,',','.').'</td>';
                            echo '</tr>';

                            echo '<tr class="shadow">';
                            echo  '<td  colspan="5" class="text-center"><p class="font-weight-bold text-secondary" style="font-size:18px;">Total : </p></td>';
                            echo '<td class="text-left" ><p class="font-weight-bold text-secondary" style="font-size:18px;"> Rp'.number_format($jumlah,2,',','.'). '</p> </td>';
                            echo '<td class="text-left" ><p class="font-weight-bold text-secondary" style="font-size:18px;"> Rp'.number_format($jumlah2,2,',','.'). '</p> </td>';
                            echo '</tr>';
                        };
                       
                       

                       
                       
                      }
                        
  

                      $result->free();
                      $db->close();
                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
            
            <a type="button" class="btn btn-danger text-white shadow rounded-md" href="buku_besar.php">Kembali</a>
            
          
        </div>

      </div>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 