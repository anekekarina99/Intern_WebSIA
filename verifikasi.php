<?php
include_once('lib/db_login.php');
$no_reff = $_GET['no_reff'];
$nama = $_GET['nama_akun'];
$keterangan = 'Sudah diverifikasi';
$id = $_GET['id'];
$query = "UPDATE tb_akun SET keterangan='$keterangan' WHERE no_reff='$no_reff'";
$result = $db->query($query);

if(!$result){
    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
}else{
    echo "<script>
                  
    var yakin = confirm('Apakah anda yakin data akun akan diverifikasi?');
    if (yakin) {
        window.location='data_akun.php';
    } </script>";

};

?>