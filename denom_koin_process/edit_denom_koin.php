<?php 

session_start();
include "../koneksi.php";
header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
  $update_field='';
  if(isset($input['denom_koin'])) {
    $update_field.= "denom_koin='".$input['denom_koin']."'";
  } else if(isset($input['rp1'])) {
    $update_field.= "rp1='".$input['rp1']."'";
  } else if(isset($input['rp2'])) {
    $update_field.= "rp2='".$input['rp2']."'";
  } else if(isset($input['rp3'])) {
    $update_field.= "rp3='".$input['rp3']."'";
  } else if(isset($input['rp4'])) {
    $update_field.= "rp4='".$input['rp4']."'";
  }else if(isset($input['rp5'])) {
    $update_field.= "rp5='".$input['rp5']."'";
  }else if(isset($input['rp6'])) {
    $update_field.= "rp6='".$input['rp6']."'";
  }else if(isset($input['inpak'])) {
    $update_field.= "inpak='".$input['inpak']."'";
  }else if(isset($input['created_at'])) {
    $update_field.= "created_at='".$input['created_at']."'";
  }
  if($update_field && $input['id']) {
    $sql_query = $mysqli->query("UPDATE denom_koin SET $update_field WHERE id_denom_koin='" . $input['id'] . "'");
    // $sql_query = "UPDATE denom_koin SET $update_field WHERE id_denom_koin='" . $input['id'] . "'";
    // var_dump($sql_query); die();
    if(!$sql_query){
      echo $mysqli->connect_errno." - ".$mysqli->connect_error;
      exit();

    }else{

      if ($_SESSION['level'] == 'karyawan') {
          echo json_encode('success');
        
      }elseif ($_SESSION['level'] == 'manager') {
          echo json_encode('success');
      }elseif ($_SESSION['level'] == 'asmen') {
          echo json_encode('success');
      }
    }
  }
}elseif ($input['action'] == 'delete') {
  print_r($input['id']);
  echo json_encode('Delete Berhasil');
}

?>