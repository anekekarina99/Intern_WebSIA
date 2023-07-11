<?php
  include_once('lib/db_login.php');
?>
<?php include 'include/header_neraca.php'; ?>

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

 