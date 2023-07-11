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
                <div class="container mt-1">
            
                <div class="row">
                <div class="col-sm">
            <a rulo="button" class="btn btn-md btn-primary rounded shadow" href="tambah_akunTo_jurna_biasa.php">Tambah Data Akun ke Jurnal</a>
            <a class="btn btn-md btn-danger shadow rounded" href="jurnal_umum_biasa.php" role="button">Kembali</a>
                </div> 
                </div>  

                </div>
                
            <div class="card-header">
                <h4 class="card-title text-center font-weight-bold"> Jurnal Umum : <br><span class="text-secondary">  <?php 
                
                      $bulan = $_GET['bulan'];
                      $tahun = $_GET['tahun'];
                      $query = "SELECT DISTINCT bulan,tahun FROM tb_jurnal WHERE bulan = '$bulan'AND tahun= '$tahun'"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        while ($row = $result->fetch_object()) {

                          echo $row->bulan;
                          echo ",";
                          echo $row->tahun;
                        }
                        
                      }
                      
                      ?></span></h4>
              </div>
              <div class="card-body">
           
                <div class="table-responsive">
                
                  <table class="table table-hover table-striped ">
                    <thead class=" text-primary text-center">
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Nama Akun
                      </th>
                      <th>
                        Keterangan
                      </th>
                      <th>
                        No Reff
                      </th>
                      <th >
                        Debit
                      </th>
                      <th >
                        Kredit
                      </th>
                      <th >
                        No.Bukti
                      </th>
                      <th >
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                    <?php
                      $query = "SELECT * FROM tb_jurnal WHERE bulan='$bulan' AND tahun='$tahun'"; 
                      $result = $db->query($query);

                      if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      }else{
                        $jumlah=0;
                        $jumlah2 =0;
                        $i = 1;
                        while ($row = $result->fetch_object()) {

                         $jumlah= $row->debit_jurnal + $jumlah;
                         $jumlah2= $row->kredit_jurnal + $jumlah2;
                          echo '<tr>';
                          echo '<td>'.date('d F Y',strtotime($row->tgl)).'</td>';
                          if($row->jenis =="Debit"){
                            echo '<td class="text-left">'.$row->nama_reff.'</td>';
                          }else{
                            echo '<td class="text-right">'.$row->nama_reff.'</td>';
                          }
                          
                          echo '<td>'.$row->keterangan.'</td>';
                          echo '<td>'.$row->no_reff.'</td>';
                          echo '<td>Rp ' . number_format($row->debit_jurnal,2,',','.').'</td>';
                          echo '<td>Rp ' . number_format($row->kredit_jurnal,2,',','.').'</td>';
                          echo '<td>'.$row->no_bukti.'</td>';
                          echo '<td class="text-right">  <a class="btn btn-sm btn-secondary shadow rounded" href="edit_data_jurnal_biasa.php?id='.$row->id.'&no_reff='.$row->no_reff.'" role="button">Edit</a>
                                    <a class="btn btn-sm btn-danger shadow rounded" href="hapus_data_jurnal_biasa.php?no_reff='.$row->no_reff.'&tgl='.$row->tgl.'&id='.$row->id.'&jenis='.$row->jenis.'" role="button">Hapus</a></td>';
                                    $i++;
                       
                        }
                        echo '</tr>';
                        echo '<tr class="shadow">';
                        echo  '<td  colspan="4" class="text-center"><p class="font-weight-bold text-danger" style="font-size:18px;">Total : </p></td>';
                        echo '<td class="text-left" ><p class="font-weight-bold text-danger" style="font-size:18px;"> Rp'.number_format($jumlah,2,',','.'). '</p> </td>';
                        echo '<td class="text-left" ><p class="font-weight-bold text-danger" style="font-size:18px;"> Rp'.number_format($jumlah2,2,',','.'). '</p> </td>';
                        echo  '<td  colspan="2" class="text-center"> </td>';
                        echo '</tr>';

                        echo '<tr>';
                        if($jumlah == $jumlah2){
                         
                          echo '<td colspan ="8" class="bg-info text-center text-light font-weight-bold shadow"style="font-size:15px;" > SEIMBANG</td>';
                        }else{
                        echo '<td colspan ="8" class="bg-warning text-dark text-center font-weight-bold shadow"style="font-size:15px;"> BELUM SEIMBANG</td>';
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
          </div>
          
        </div>

      </div>
    
  <!--end Content-->
  <?php include 'include/footer.php'; ?>

 