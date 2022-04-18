<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../../engine/dbh.inc.php";
$id=$_POST["supid"] ?? null;
$statement = $pdo->prepare("DELETE FROM suppliers WHERE id=:id");
$statement->bindValue(":id",$id);
$statement->execute();

$stmt = $pdo->prepare("DELETE FROM users where emp_id=:id");
$stmt->bindValue(":id",$id);
$stmt->execute();
header("Location: ../sups.php?mess=deleted");

?>