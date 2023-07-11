
<?php
include_once('lib/db_login.php');

$no_reff = !empty($_GET['no_reff']) ? $_GET['no_reff']:'';
$tgl =!empty($_GET['tgl']) ? $_GET['tgl'] :'';
$id =  !empty($_GET['id']) ? $_GET['id'] : '';
$jenis = !empty($_GET['jenis']) ? $_GET['jenis']: '';
$query = "DELETE FROM tb_jurnal WHERE id='$id'";
$result = $db->query($query);

if(!$result){
    die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
}else{

    $query = "DELETE FROM tb_buku WHERE id='".$id."'";
    $result = $db->query($query);

    if(!$result){
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
    }else{
        if($jenis=='Debit'){
            $query5 = "SELECT SUM(saldo_debit) AS total_debit FROM tb_buku WHERE no_reff_akun = '$no_reff'";
            $result2 = $db->query($query5) or die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query5);
                

               
                $row = $result2->fetch_array();
           
                $total_debit = $row['total_debit'];
                $total_debit = intval($total_debit);
        
                    $query= "UPDATE tb_neraca SET saldo_debit='$total_debit' WHERE no_reff = '$no_reff'";
                    $result = $db->query($query);
                    if(!$result){
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                    }else{
        
                         
                        echo "<script>
                                    
                        var yakin = confirm('Data Akun sudah dihapus di jurnal?');
                        if (yakin) {
                            window.location ='jurnal_umum.php';
                        } </script>";
                                }
            
       
       
        }else{
            $total_kredit = isset($total_kredit) ? isset($total_kredit) : '';
        $query4 = "SELECT SUM(saldo_kredit) AS total_kredit FROM tb_buku WHERE no_reff_akun = '".$no_reff."'";
        $result = $db->query($query4);

        $row = $result->fetch_array();

       
        $total_kredit = $row["total_kredit"];
        $total_kredit = intval($total_kredit);
        

            $query = "UPDATE tb_neraca SET saldo_kredit='$total_kredit' WHERE no_reff = '$no_reff' ";
            $result = $db->query($query);
            if(!$result){
                die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
            }else{

                 
            echo "<script>
                        
            var yakin = confirm('Data Akun sudah dihapus di jurnal?');
            if (yakin) {
                window.location ='jurnal_umum.php';
            } </script>";
                    }
       
        }
          
    }

};

?>