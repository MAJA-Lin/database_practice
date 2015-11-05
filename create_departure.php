<?php
// create_departure.php
require_once "bootstrap.php";

$travelId = $argv[1];
$newCity = $argv[2];
$newReason = $argv[3];

$travel = $entityManager->find('Travel', $travelId);

//$passport = $entityManager->getRepository('Passport')->findBy('')


$departure = new Departure();
$departure->setTravel($travel);
$departure->setCity($newCity);
$departure->setReason($newReason);
$departure->setTime();

$entityManager->persist($departure);
$entityManager->flush();

echo "Travel ID is " . $travel->getId() . "\n";
echo "Departure ID is " . $departure->getId() . "\n";
echo "Country: " . $departure->getCountry() . "\n";
echo "Transportation: " . $departure->getTransportation() . "\n";

echo "Here are var_dump: \n";
var_dump($departure);
