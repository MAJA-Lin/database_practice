<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$dql = "SELECT t, d, i FROM Travel t JOIN t.departure d JOIN t.immigration i";


/*
select t.passport_id, t.id, p.name, p.nationality, p.gender, t.transportation, t.country, d.city, i.city, d.reason, d.time from travel t inner join departure d on t.id = d.travel_id inner join passport p on p.id = t.passport_id inner join immigration i on t.id = i.travel_id;
*/

$result_join = $entityManager->createQuery($dql)->getScalarResult();
$result_pp = $entityManager->getRepository('Passport')->findAll();
$result_tr = $entityManager->getRepository('Travel')->findAll();
$result_de = $entityManager->getRepository('Departure')->findAll();
$result_im = $entityManager->getRepository('Immigration')->findAll();

echo "<h2>The travel join data : </h2><br><br>";
printTravel($result_join);

echo "<h2>All Passports : </h2><br>";
printPassportTable($result_pp);

echo "<h2>All Travels : </h2><br>";
printTravelTable($result_tr);

echo "<br> <h2>Departure Table : </h2><br>";
printDepartureTable($result_de);

echo "<br> <h2>Immigration Table : </h2><br>";
printImmigrationTable($result_im);