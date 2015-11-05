<?php
// create_immigration.php
require_once "bootstrap.php";

$travelId = $argv[1];
$newCity = $argv[2];
$newReason = $argv[3];

$travel = $entityManager->find('Travel', $travelId);

//$passport = $entityManager->getRepository('Passport')->findBy('')


$immigration = new Immigration();
$immigration->setTravel($travel);
$immigration->setCity($newCity);
$immigration->setReason($newReason);
$immigration->setTime();

$entityManager->persist($immigration);
$entityManager->flush();

echo "Travel ID is " . $travel->getId() . "\n";
echo "Immigration ID is " . $immigration->getId() . "\n";
echo "Country: " . $immigration->getCountry() . "\n";
echo "Transportation: " . $immigration->getTransportation() . "\n";

echo "Here are var_dump: \n";
var_dump($immigration);
