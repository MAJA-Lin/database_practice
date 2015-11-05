<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$id = $_GET['id'];

//$dql = "SELECT t, d FROM Travel t JOIN t.departure d";
//$dql = "SELECT p, t, d, i FROM Travel t JOIN t.passport p JOIN t.departure d JOIN t.immigration i";

$result_de = $entityManager->getRepository('Departure')->findAll();

echo "Data before deleting : \n";

printDepartureTable($result_de);

$query = $entityManager->find('Departure', $id);
$entityManager->remove($query);
$entityManager->flush();

echo "Delete successfully!<br><br>";

$result_de = $entityManager->getRepository('Departure')->findAll();
printDepartureTable($result_de);