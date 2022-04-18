<?php

require_once "../engine/dbh.inc.php";

$id = $_GET['id'] ?? null;

$statement=$pdo->prepare('DELETE FROM vendors WHERE vendor_id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

$pid = $_GET["pid"];
header("Location: vendors.php?id=$pid");
?>