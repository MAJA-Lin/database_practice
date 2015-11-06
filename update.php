<?php

require_once "bootstrap.php";
require_once "displayFunction.php";


$check = $_GET['check'];
$id = $_GET['id'];

$result_pp = $entityManager->getRepository('Passport')->findAll();
echo "<h2>All Passports : </h2><br>";
printPassportTable($result_pp);

$result_tr = $entityManager->getRepository('Travel')->findAll();
echo "<h2>All Connected Travels : </h2><br>";
printTravelTable($result_tr);

switch ($check) {
    case Check::None:
        echo "None";
        break;
    case Check::Passport:
        $update = $entityManager->find('Passport', $id);

        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            $update->setName($name);
        } elseif (isset($_GET['nation'])) {
            $nation = $_GET['nation'];
            $update->setNationality($nation);
        } elseif (isset($_GET['gender'])) {
            $gender = $_GET['gender'];
            $update->setGender($gender);
        }
        break;
    case Check::Travel:
        $update = $entityManager->find('Travel', $id);
        if (isset($update)) {
            if (is_null($update->getDeparture())) {
                $de = new Departure();
                $update->addDeparture($de);
                $update->getDeparture()->setTime();
                $entityManager->persist($de);
                $entityManager->persist($update);
                //$entityManager->flush();
            }


            if (isset($_GET['country'])) {
                $country = $_GET['country'];
                $update->setCountry($country);
            } elseif (isset($_GET['trans'])) {
                $trans = $_GET['trans'];
                $update->setTransportation($trans);
            } elseif (isset($_GET['dCity'])) {
                $dCity = $_GET['dCity'];
                $update->getDeparture()->setCity($dCity);
            } elseif (isset($_GET['reason'])) {
                $reason = $_GET['reason'];
                $update->getDeparture()->setReason($reason);
            } else {
                $update->getDeparture()->setTime();
            }

        } else {
            echo "Can't find Travel! <br>";
        }
        break;
    case Check::Departure:
        $update = $entityManager->find('Departure', $id);
        var_dump($update);
        if (isset($_GET['dCity'])) {
            $dCity = $_GET['dCity'];
            $update->setCity($dCity);
        } elseif (isset($_GET['reason'])) {
            $reason = $_GET['reason'];
            $update->setReason($reason);
        } elseif (isset($_GET['time'])) {
            $time = $_GET['time'];
            $update->setTime($time);
        }
        break;
    case Check::Immigration:
        $update = $entityManager->find('Immigration', $id);

        if (isset($_GET['iCity'])) {
            $iCity = $_GET['iCity'];
            $update->setCity($iCity)
;        } elseif (isset($_GET['reason'])) {
            $reason = $_GET['reason'];
            $update->setReason($reason);
        } elseif (isset($_GET['time'])) {
            $time = $_GET['time'];
            $update->setTime($time);
        }
        break;
    default:
        # code...
        break;
}

if (isset($update)) {
    $entityManager->persist($update);
    $entityManager->flush();
}

$result_tr = $entityManager->getRepository('Travel')->findAll();
echo "<h2>Travels after updated: </h2><br>";
printTravelTable($result_tr);






abstract class BasicEnum {
    private static $constCacheArray = NULL;

    private static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict = true);
    }
}

abstract class Check extends BasicEnum {
    const None = 0;
    const Passport = 1;
    const Travel = 2;
    const Departure = 3;
    const Immigration = 4;
}


