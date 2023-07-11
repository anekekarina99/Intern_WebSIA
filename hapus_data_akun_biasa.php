<?php
include_once('lib/db_login.php');
$no_reff = $_GET['no_reff'];
$id = $_GET['id'];
$query = "DELETE FROM tb_akun WHERE no_reff='$no_reff' AND id='$id'";
$result = $db->query($query);

if(!$result){
    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
}else{
    echo "<script>
                  
    var yakin = confirm('Data Akun sudah dihapus di jurnal');
    if (yakin) {
        window.location='data_akun_biasa.php';
    } </script>";

};

?>