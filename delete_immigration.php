<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$id = $_GET['id'];

//$dql = "SELECT t, d FROM Travel t JOIN t.immigration d";
//$dql = "SELECT p, t, d, i FROM Travel t JOIN t.passport p JOIN t.immigration d JOIN t.immigration i";

$result_de = $entityManager->getRepository('Immigration')->findAll();

echo "Data before deleting : \n";

printImmigrationTable($result_de);

$query = $entityManager->find('Immigration', $id);
$entityManager->remove($query);
$entityManager->flush();

echo "Delete successfully!<br><br>";

$result_de = $entityManager->getRepository('Immigration')->findAll();
printImmigrationTable($result_de);