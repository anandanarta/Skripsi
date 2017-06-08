<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname_sample = "sampling_module";
$dbname_odk = "odk_prod";
date_default_timezone_set("Asia/Bangkok");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname_sample", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['form_id'])){
    	$form_id = $_POST['form_id'];
    	$id = $_POST['id'];
    	$form_id = 'skripsicontoh';
    	$query = "SELECT * FROM sampling_pref WHERE form_id = '$form_id' ";
    	$stmt = $conn->prepare($query);
    	$stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();    	
    	$var_id = $result[0]['var_id'];
    	$type = $result[0]['sampling_type'];
    	if($type == "systematic"){
            //$id_user = $_POST['id_user'];
            //$form_id = $_POST['form_id'];
            //$uuid = $_POST['uuid']; 
            //$create_at = date("Y-m-d h:i:sa");
            //$query = "INSERT INTO user_upload (id_user,form_id,uuid,create_at) VALUES ('$id_user', '$form_id','$uuid','$create_at')";
            $query = "SELECT * FROM systematic_pref WHERE form_id = '$form_id'";
            $stmt = $conn->prepare($query);
    		$stmt->execute();
    		$result = $stmt->fetchAll();
    		$var_order = $result[0]['var_order'];
    		$order = json_decode($var_order);
    		$order = implode(", ", $order);
    		$n = $result[0]['jumlah'];
    		include "systematicnew.php"; 
            
        }else if($fungsi == "getuuid"){
            $nim = $_GET['nim'];
            $password = $_GET['password'];
            $query = "SELECT nama FROM panitia WHERE password = '$password' AND nim = '$nim'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            
            echo json_encode(array('respon'=>$result));
        }else if($fungsi == "uploadAbsensi"){
            $nomor_pendaftaran = $_GET['nomor_pendaftaran'];
            $tanggal = $_GET['tanggal'];
            $jam_datang = $_GET['jam_datang'];
            $time_stamp = date("Y-m-d h:i:sa");
           
            
                    $queryInsert = "INSERT INTO absensi (tanggal,jam_datang,no_pendaftaran,time_stamp) VAlUES ('$tanggal','$jam_datang','$nomor_pendaftaran','$time_stamp')";
                    $conn->exec($queryInsert);
                    $statusInsert['respon']=1;
                    echo json_encode($statusInsert);                
            
        }else if($fungsi == "getListMaba"){
            $nim_pk = $_GET['nim_pk'];
            $queryGetMaba = "SELECT m.no_pendaftaran, m.nama, m.path_foto, m.asal_prop, m.no_hp, m.email FROM mahasiswa m INNER JOIN kelompok k ON m.id_kelompok=k.id_kelompok WHERE k.nim_pk='$nim_pk'";
            $stmt = $conn->prepare($queryGetMaba);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            echo json_encode(array('respon'=>$result));
        }
    }    
}catch(PDOException $e)
    {
    $e->getMessage();
    }
$conn = null;
?> 



