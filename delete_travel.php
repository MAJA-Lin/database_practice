<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$id = $_GET['id'];

//$dql = "SELECT t, d FROM Travel t JOIN t.departure d";
$dql = "SELECT p, t, d, i FROM Travel t JOIN t.passport p JOIN t.departure d JOIN t.immigration i";

$result = $entityManager->createQuery($dql)->getScalarResult();

echo "Data before deleting : \n";

printPassport($result);

$query = $entityManager->find('Travel', $id);
$entityManager->remove($query);
$entityManager->flush();

echo "Delete successfully!<br><br>";

$result = $entityManager->createQuery($dql)->getScalarResult();
printPassport($result);