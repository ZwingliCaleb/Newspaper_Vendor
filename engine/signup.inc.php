<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $mobile = $_POST["mobile"];
    $password=$_POST["password"];
    $email = $_POST["email"];
    $usertype = $_POST["usertype"];
    $password_repeat = $_POST["password_repeat"];
    require_once "dbh.inc.php";
    if($password!==$password_repeat){
        header('Location: ../public/register.php?password no match');
        exit;
    }
    function createuser($pdo,$username,$password,$usertype){
        $statement=$pdo->prepare("INSERT INTO login (login_username,login_password,login_rank) VALUES(:username,:password,:rank)");
        $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
        $statement->bindValue(":username",$username);
        $statement->bindValue(":password",$hashedpwd);
        $statement->bindValue(":rank",$usertype);        
        $statement->execute();
       return $login_id = $pdo->lastInsertId();
    }
    $lid = createuser(
       $pdo,
       $username,
       $password,
       $usertype
    );
   
    function createemp($pdo,$usertype,$name,$mobile,$email,$login_id){
        if($usertype=='admin'){
            $statement=$pdo->prepare("INSERT INTO admin(admin_name,admin_phone,admin_email,admin_login_id) VALUES(:name,:phone,:email,:login_id)");
        }
        if($usertype=='vendor'){
            $statement=$pdo->prepare("INSERT INTO vendor(vendor_name,vendor_mobile_no,vendor_email,vendor_login_id) VALUES(:name,:phone,:email,:login_id)");
        }
        $statement->bindValue(":name",$name);
        $statement->bindValue(":phone",$mobile);
        $statement->bindValue(":email",$email);
        $statement->bindValue(":login_id",$login_id);
        $statement->execute();
    }
    createemp($pdo,$usertype,$name,$mobile,$email,$lid);
    header('Location: ../public/index.php');
    
}


else{
    header('Location: ../');
}
?>