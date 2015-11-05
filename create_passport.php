<?php
// create_passport.php
require_once "bootstrap.php";

$newPassportName = $argv[1];
$newPassportNationality = $argv[2];
$newPassportGender = $argv[3];


$passport = new Passport();
$passport->setName($newPassportName);
$passport->setNationality($newPassportNationality);
$passport->setGender($newPassportGender);

$entityManager->persist($passport);
$entityManager->flush();

echo "Created Passport with ID " . $passport->getId() . "\n";
echo "Name: " . $passport->getName() . "\nGender: " . $passport->getGender();
echo "\nNationality: " . $passport->getNationality() . "\n";
