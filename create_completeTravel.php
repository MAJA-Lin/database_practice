<?php
// create_compelete.php
require_once "bootstrap.php";
require_once "displayFunction.php";

/*
$passportId = $argv[1];
$newCountry = $argv[2];
$newTransportation = $argv[3];
$departureCity = $argv[4];
$immigrationCity = $argv[5];
$reason = $argv[6];
*/

$passportId = $_GET['id'];
$newCountry = $_GET['country'];
$newTransportation = $_GET['trans'];
$departureCity = $_GET['city'];
$immigrationCity = $_GET['city2'];
$reason = $_GET['reason'];

$passport = $entityManager->find('Passport', $passportId);

$travel = new Travel();
$travel->setPassport($passport);
$travel->setTransportation($newTransportation);
$travel->setCountry($newCountry);

$entityManager->persist($travel);
$entityManager->flush();

$travelId = $travel->getId();

$departure = new Departure();
$immigration = new Immigration();

$departure->setTravel($travel);
$departure->setReason($reason);
$departure->setCity($departureCity);
$departure->setTime();

$immigration->setTravel($travel);
$immigration->setReason($reason);
$immigration->setCity($immigrationCity);
$immigration->setTime();

$entityManager->persist($immigration);
$entityManager->persist($departure);
$entityManager->flush();

$de = $travel->getDeparture();
$im = $travel->getImmigration();

//$travel->addDeparture($departure);

$dql = "SELECT t, d, i FROM Travel t JOIN t.departure d JOIN t.immigration i WHERE (d = ?1 OR i = ?2)";

$result = $entityManager->createQuery($dql)
    ->setParameter(1, $de)
    ->setParameter(2, $im)
    ->getScalarResult();

//var_dump($result);
printTravel($result);


/*
echo "Passport ID is " . $passport->getId() . "\n";
echo "Travel ID is " . $travel->getId() . "\n";
echo "Country: " . $travel->getCountry() . "\n";
echo "Transportation: " . $travel->getTransportation() . "\n";

echo "Here are var_dump: \n";
var_dump($travel);
*/


