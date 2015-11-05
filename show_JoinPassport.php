<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$dql = "SELECT p, t, d, i FROM Travel t JOIN t.departure d JOIN t.immigration i JOIN t.passport p";
$query = $entityManager->getRepository('Travel')->findBy(array('passport' => 2));

$result = $entityManager->createQuery($dql)
    ->getScalarResult();
$result_all = $entityManager->getRepository('Passport')->findAll();

echo "Search : <br>";
printTravelTable($query);

/*
select t.passport_id, t.id, p.name, p.nationality, p.gender, t.transportation, t.country, d.city, i.city, d.reason, d.time from travel t inner join departure d on t.id = d.travel_id inner join passport p on p.id = t.passport_id inner join immigration i on t.id = i.travel_id;
*/


echo "<h2>The passports which have travel data are : </h2><br><br>";

printPassport($result);

echo "<h2>All Passports : </h2><br>";

printPassportTable($result_all);
