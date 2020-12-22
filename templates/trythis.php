
<?php

if(!isset($_SESSION)){session_start();}  

header('Content-Type: application/json');
$pdo = new PDO('mysql:dbname=' . 'zoo'. ';host=' . 'localhost','root','', 
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function checkAdmin($email,$password){
    global $pdo;
    $present ='';
    $loginstmt= $pdo->prepare("SELECT * FROM admin WHERE email=:email");
    $loginstmt->execute(['email'=>$email]);
    if($loginstmt->rowCount()>0){
        $admin=$loginstmt->fetch();
            $checkPassword=password_verify($password, $admin['password']);
            if($checkPassword == true){
                $present['loggedinas']='LoggedInAdmin';
                $present['name']=$admin['admin_name'];
                $present['position']='Administrator';
                $present['admin_id']=$admin['admin_id'];
                $present['has']='Yes';
            }
            else{
                $present['has']='No';
            }
    }
    else{
        $present['has']='No';
    }
    return $present;
}

function checkSponsors($email,$password){
    global $pdo;
    $present ='';
    $loginstmt= $pdo->prepare("SELECT * FROM sponsors WHERE email=:email");
    $loginstmt->execute(['email'=>$email]);
    if($loginstmt->rowCount()>0){
        $sponsor=$loginstmt->fetch();
        $checkPassword=password_verify($password, $sponsor['password']);
            if($checkPassword == true){
                $present['loggedinas']='LoggedInSponsor';
                $present['name']=$sponsor['client_name'];
                $present['position']='Sponsor';
                $present['spons_archived']=$sponsor['archived_status'];
                $present['spons_signed']=$sponsor['signed_status'];
                $present['sp_id']=$sponsor['sp_id'];
                $present['has']='Yes';
            }
            else{
                $present['has']='No';
            }
    }
    else{
        $present['has']='No';
    }
    return $present;
}

function checkStaffs($email,$password){
    global $pdo;
    $present ='';
    $loginstmt= $pdo->prepare("SELECT * FROM staffs WHERE email=:email");
    $loginstmt->execute(['email'=>$email]);
    if($loginstmt->rowCount()>0){
        $staff=$loginstmt->fetch();
        $checkPassword=password_verify($password, $staff['password']);
            if($checkPassword == true){
                $present['name']=$staff['name'];
                $present['type']=$staff['type'];
                $present['staff_archived']=$staff['archive_status'];     
                $present['staff_id']=$staff['staff_id'];
                $present['has']='Yes';
            }
            else{
                $present['has']='No';
            }
    }
    else{
        $present['has']='No';
    }
    return $present;

}


$process=[];
    
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email =$_POST['email'];
    $password=$_POST['password'];


    if(checkAdmin($email,$password)['has']=='Yes' ){
            $process['data']='LoggedInAdmin';
            $_SESSION['name']=checkAdmin($email,$password)['name'];
            $_SESSION['position']=checkAdmin($email,$password)['position'];
            $_SESSION['admin_id']=checkAdmin($email,$password)['admin_id'];   
            $_SESSION['position']='Administrator';
    }

   else if(checkSponsors($email,$password)['has']=='Yes' ){
        // $process['data']='LoggedInSponsor';
            $process['data']='LoggedInSponsor';
            $_SESSION['name']=checkSponsors($email,$password)['name'];
            $_SESSION['position']='Sponsor';
            $_SESSION['spons_archived']=checkSponsors($email,$password)['spons_archived'];
            $_SESSION['spons_signed']=checkSponsors($email,$password)['spons_signed'];
            $_SESSION['sp_id']=checkSponsors($email,$password)['sp_id'];
   }
   else if(checkStaffs($email,$password)['has']=='Yes' ){
        $process['data']=checkStaffs($email,$password)['type'];
        $_SESSION['name']=checkStaffs($email,$password)['name'];
        $_SESSION['type']=checkStaffs($email,$password)['type'];
        $_SESSION['staff_archived']=checkStaffs($email,$password)['staff_archived'];
        $_SESSION['staff_id']=checkStaffs($email,$password)['staff_id'];
       
    }
    else{
        $process['data']='Error';
    }


}


	echo json_encode($process);
?>  