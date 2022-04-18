<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "dbh.inc.php";
    $username=$_POST['username'];
    $input_password=$_POST['password'];

    if(empty($username) || empty($input_password)){
        header('Location: ../public/index.php?mess=emptyinputs');
        exit;
    }
    $statement=$pdo->prepare("SELECT * FROM login WHERE login_username=:username");
    $statement->bindValue(":username",$username);
    $statement->execute();
    $resultdata=$statement->fetch(PDO::FETCH_ASSOC);

    $password_hashed=$resultdata['login_password'];
    if(password_verify($input_password,$password_hashed)){
        if($resultdata['login_rank']=='admin'){
            session_start();
            $_SESSION["username"] = $resultdata["login_username"];
            header('Location: ../admin/index.php');
            exit;
        }
        if($resultdata['login_rank']=='vendor'){
            session_start();
            $statement=$pdo->prepare("SELECT vendor.vendor_id,vendor.location FROM vendor WHERE vendor_login_id=:id ");
            $statement->bindValue(":id",$resultdata["login_id"]);
            $statement->execute();
            $vendor_id = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION["username"] = $resultdata["login_username"];
            $_SESSION["vid"] = $vendor_id["vendor_id"];
            $_SESSION["location"] = $vendor_id["location"];
            header('Location: ../vendor/index.php');
            exit;           
        }
        else{
            exit;
        }
    }
    else{
        header('Location: ../public/index.php?mess=wrongpwd');
        exit;  
    }
}

else{
    header("Location: ../public/index.php?mess=nouser");
    exit();
}

?>