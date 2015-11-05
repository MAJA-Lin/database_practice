<?php

require_once "bootstrap.php";
require_once "displayFunction.php";

$id = $_GET['id'];

$dql = "SELECT p, t, d, i FROM Travel t JOIN t.passport p JOIN t.departure d JOIN t.immigration i WHERE p.id = ?1";


/*
select t.passport_id, t.id, p.name, p.nationality, p.gender, t.transportation, t.country, d.city, i.city, d.reason, d.time from travel t inner join departure d on t.id = d.travel_id inner join passport p on p.id = t.passport_id inner join immigration i on t.id = i.travel_id;
*/



$result = $entityManager->createQuery($dql)->setParameter(1, $id)->getScalarResult();
echo "Your search passport join table is : <br><br>";

printPassport($result);
