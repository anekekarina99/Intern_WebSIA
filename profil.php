<?php
include_once('lib/db_login.php');
session_start();
?>
<?php include 'include/header_profil_biasa.php'; ?>


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="places-buttons">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <h4 class="card-title">
                                    <?php
                                
                                    $user = $_SESSION['username'];
                                    $query ="SELECT * FROM user WHERE username='$user'";
                                    $result = $db->query($query);

                                    if (!$result) {
                                        die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
                                    } else {
                                        while ($row = $result->fetch_object()) {
                                            echo $row->nama;

                                    ?>
                                            <p class="category"><?php echo $row->nip;
                                                             ?></p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <a  type="button" class="btn btn-primary btn-block" href="edit_profil.php?user=<?php echo $row->nip; } } ?> 
                                                        ">Edit</a>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    $result->free();
                    $db->close();

                    ?>

                    <!--end Content-->
                    <?php include 'include/footer.php'; ?>