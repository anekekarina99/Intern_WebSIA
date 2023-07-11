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

                  ?>
                <p>
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

                                        ?>
                <p>
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

                                        ?>
                <p>
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

                                        ?>
                <p>
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
              <a type="button" class="btn btn-warning rounded shadow-sm" href="tambah_data_akun.php">Tambah Akun</a>

            </div>
          </div>

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
                <th>
                  Keterangan
                </th>
                <th>
                  Aksi
                </th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM tb_akun";
                $result = $db->query($query);

                if (!$result) {
                  die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
                } else {
                  $i = 1;
                  while ($row = $result->fetch_object()) {

                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $row->no_reff . '</td>';
                    echo '<td>' . $row->nama_reff . '</td>';
                    echo '<td>' . $row->keterangan . '</td>';
                    if ($row->keterangan != 'Sudah diverifikasi') {
                      echo '<td>   <a class="btn btn-secondary shadow rounded" href="verifikasi.php?no_reff=' . $row->no_reff . '&id=' . $row->id . '" role="button">Verifikasi</a>
                                      <a class="btn btn-primary shadow rounded" href="edit_data_akun.php?no_reff=' . $row->no_reff . '&id=' . $row->id . '" role="button">Edit</a>
                                      <a class="btn btn-danger shadow rounded" href="hapus_data_akun.php?no_reff=' . $row->no_reff . '&id=' . $row->id . '" role="button">Hapus</a></td>';
                    } else {
                      echo '<td> </td>';
                    }
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