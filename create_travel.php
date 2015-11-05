<?php
// create_travel.php
require_once "bootstrap.php";

$passportId = $argv[1];
$newCountry = $argv[2];
$newTransportation = $argv[3];

$passport = $entityManager->find('Passport', $passportId);

$travel = new Travel();
$travel->setPassport($passport);
$travel->setTransportation($newTransportation);
$travel->setCountry($newCountry);

$entityManager->persist($travel);
$entityManager->flush();

echo "Passport ID is " . $passport->getId() . "\n";
echo "Travel ID is " . $travel->getId() . "\n";
echo "Country: " . $travel->getCountry() . "\n";
echo "Transportation: " . $travel->getTransportation() . "\n";

echo "Here are var_dump: \n";
var_dump($travel);
