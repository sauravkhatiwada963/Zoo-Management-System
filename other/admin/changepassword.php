<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];
$main = $_POST['cby'];
unset($_POST['cby']);
$pass = $_POST['password'];
$_POST['password']=password_hash($pass, PASSWORD_DEFAULT);

if($main=='admin_id'){
    $stmt = $pdo->prepare('UPDATE admin SET password=:password WHERE admin_id=:admin_id ');
    $stmt->execute(['admin_id'=>$_POST['admin_id'] ,'password'=>$_POST['password'] ]);
    $out['data']='updated';
}
else if($main == 'staff_id'){
    $stmt = $pdo->prepare('UPDATE staffs SET password=:password WHERE staff_id=:staff_id ');
    $stmt->execute([ 'staff_id'=>$_POST['staff_id'] ,'password'=>$_POST['password']  ]);
    $out['data']='updated';
}
else if($main == 'sp_id'){
    $stmt = $pdo->prepare('UPDATE sponsors SET password=:password WHERE sp_id=:sp_id ');
    $stmt->execute(['sp_id'=>$_POST['sp_id'] ,'password'=>$_POST['password']]);
    $out['data']='updated';
 
}


echo json_encode($out);
?>
