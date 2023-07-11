<?php
include_once('lib/db_login.php');

$q = $_GET['term'];
$sql ="SELECT * FROM tb_akun WHERE no_reff LIKE '%".$q."%'"; // menampilkan data yg ada didatabase yg sesuai dengan inputan user ( nik )
$result = $db->query($sql);
while ($data = $result->fetch_array()){
        $row['value']    =$data['no_reff'];
        $row['nama_akun']    =$data['nama_reff'];
        $row_set[]        =$row;
}
//echo json_encode($result);
echo json_encode($row_set);
?>