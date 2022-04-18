<?php

require_once "../engine/dbh.inc.php";

$id = $_GET['id'] ?? null;

$statement=$pdo->prepare('DELETE FROM newspapers WHERE Newspaper_id =:id');
$statement->bindValue(':id',$id);
$statement->execute();

header("Location: newspapers.php?mess=deleted");
?>