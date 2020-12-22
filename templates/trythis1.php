
<?php

if(!isset($_SESSION)){session_start();}  

header('Content-Type: application/json');
$pdo = new PDO('mysql:dbname=' . 'zoo'. ';host=' . 'localhost','root','', 
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


function checkRecord($email,$password,$table){
    global $pdo;
    $stmt ='SELECT * FROM '.$table.' WHERE email=:email';
    $present ='';
    $loginstmt= $pdo->prepare($stmt);
    $loginstmt->execute(['email'=>$email]);
    if($loginstmt->rowCount()>0){
        $record=$loginstmt->fetch();
            $checkPassword=password_verify($password, $record['password']);
            if($checkPassword == true){

                if($table=='staffs'){
                    $present['name']=$record['name'];
                    $present['type']=$record['type'];
                    $present['staff_archived']=$record['archive_status'];     
                    $present['staff_id']=$record['staff_id'];
                    $present['has']='Yes';
                    
                } 
                
                if($table=='admin'){
                    $present['loggedinas']='LoggedInAdmin';
                    $present['name']=$record['admin_name'];
                    $present['position']='Administrator';
                    $present['admin_id']=$record['admin_id'];
                    $present['has']='Yes';
                }

                if($table=='sponsors'){
                    $present['loggedinas']='LoggedInSponsor';
                    $present['name']=$record['client_name'];
                    $present['position']='Sponsor';
                    $present['spons_archived']=$record['archived_status'];
                    $present['spons_signed']=$record['signed_status'];
                    $present['sp_id']=$record['sp_id'];
                    $present['has']='Yes';
                }

                


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

    if(checkRecord($email,$password,'staffs')['has']=='Yes'){
        $process['data']=checkRecord($email,$password,'staffs')['type'];
                $_SESSION['name']=checkRecord($email,$password,'staffs')['name'];
                $_SESSION['type']=checkRecord($email,$password,'staffs')['type'];
                $_SESSION['staff_archived']=checkRecord($email,$password,'staffs')['staff_archived'];
                $_SESSION['staff_id']=checkRecord($email,$password,'staffs')['staff_id'];
       
    }

       else if(checkRecord($email,$password,'admin')['has']=='Yes'){
            $process['data']='LoggedInAdmin';
            $_SESSION['name']=checkRecord($email,$password,'admin')['name'];
            $_SESSION['position']=checkRecord($email,$password,'admin')['position'];
            $_SESSION['admin_id']=checkRecord($email,$password,'admin')['admin_id'];   
            $_SESSION['position']='Administrator';
        }
        else if(checkRecord($email,$password,'sponsors')['has']=='Yes'){
            $process['data']='LoggedInSponsor';
            $_SESSION['name']=checkRecord($email,$password,'sponsors')['name'];
            $_SESSION['position']='Sponsor';
            $_SESSION['spons_archived']=checkRecord($email,$password,'sponsors')['spons_archived'];
            $_SESSION['spons_signed']=checkRecord($email,$password,'sponsors')['spons_signed'];
            $_SESSION['sp_id']=checkRecord($email,$password,'sponsors')['sp_id'];

        }
        
        else{
            $process['data']='Error';
        }

}



    echo json_encode($process);
    

?>  