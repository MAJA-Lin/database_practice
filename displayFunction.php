<?php
require_once "bootstrap.php";


function printPassport($row)
{
    echo "<table width=\"80%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Passport ID</td>";
    echo "<td>Name</td>";
    echo "<td>Nationality</td>";
    echo "<td>Gender</td>";
    echo "<td>Travel ID</td>";
    echo "<td>Transportation</td>";
    echo "<td>Target Country</td>";
    echo "<td>Immigration City</td>";
    echo "<td>Immigration Time</td>";
    echo "<td>Departure City</td>";
    echo "<td>Departure Time</td>";
    echo "<td>Reason</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['p_id']. "</td>";
        echo "<td>" . $value['p_name']. "</td>";
        echo "<td>" . $value['p_nationality']. "</td>";
        echo "<td>" . $value['p_gender']. "</td>";
        echo "<td>" . $value['t_id']. "</td>";
        echo "<td>" . $value['t_transportation']. "</td>";
        echo "<td>" . $value['t_country']. "</td>";
        echo "<td>" . $value['i_city']. "</td>";
        echo "<td>" . $value['i_time']->format('Y-m-d H:i:s'). "</td>";
        echo "<td>" . $value['d_city']. "</td>";
        echo "<td>" . $value['d_time']->format('Y-m-d H:i:s'). "</td>";
        echo "<td>" . $value['d_reason']. "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function printTravel($row)
{
    echo "<table width=\"80%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Travel ID</td>";
    echo "<td>Transportation</td>";
    echo "<td>Target Country</td>";
    echo "<td>Immigration City</td>";
    echo "<td>Immigration Time</td>";
    echo "<td>Departure City</td>";
    echo "<td>Departure Time</td>";
    echo "<td>Reason</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['t_id']. "</td>";
        echo "<td>" . $value['t_transportation']. "</td>";
        echo "<td>" . $value['t_country']. "</td>";
        echo "<td>" . $value['i_city']. "</td>";
        echo "<td>" . $value['i_time']->format('Y-m-d H:i:s'). "</td>";
        echo "<td>" . $value['d_city']. "</td>";
        echo "<td>" . $value['d_time']->format('Y-m-d H:i:s'). "</td>";
        echo "<td>" . $value['d_reason']. "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function printPassportTable($row)
{
    //var_dump($row);
    echo "<table width=\"40%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Passport ID</td>";
    echo "<td>Name</td>";
    echo "<td>Nationality</td>";
    echo "<td>Gender</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value->getId() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getNationality() . "</td>";
        echo "<td>" . $value->getGender() . "</td>";
        echo "</tr>";
    }
    echo "</table>";

}

function printTravelTable($row)
{
    echo "<table width=\"100%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Travel ID</td>";
    echo "<td>Passport ID</td>";
    echo "<td>Name</td>";
    echo "<td>Nationality</td>";
    echo "<td>Gender</td>";
    echo "<td>Country</td>";
    echo "<td>Transportation</td>";
    echo "<td>Departure ID</td>";
    echo "<td>Departure City</td>";
    echo "<td>Departure Time</td>";
    echo "<td>Departure Reason</td>";
    echo "<td>immigration ID</td>";
    echo "<td>immigration City</td>";
    echo "<td>immigration Time</td>";
    echo "<td>immigration Reason</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";

        echo "<td>" . $value->getId() . "</td>";

        if (!($value->getPassport() == null )) {
            echo "<td>" . $value->getPassport()->getId() . "</td>";
            echo "<td>" . $value->getPassport()->getName() . "</td>";
            echo "<td>" . $value->getPassport()->getNationality() . "</td>";
            echo "<td>" . $value->getPassport()->getGender() . "</td>";
            echo "<td>" . $value->getCountry() . "</td>";
            echo "<td>" . $value->getTransportation() . "</td>";
        } else {
            echo "<td><strong>null</strong></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        }

        if (!($value->getDeparture() == null )) {
            echo "<td>" . $value->getDeparture()->getId() . "</td>";
            echo "<td>" . $value->getDeparture()->getCity() . "</td>";
            echo "<td>" . $value->getDeparture()->getTime()->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . $value->getDeparture()->getReason() . "</td>";
        } else {
            echo "<td><strong>null</strong></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        }

        if (!($value->getImmigration() == null )) {
            echo "<td>" . $value->getImmigration()->getId() . "</td>";
            echo "<td>" . $value->getImmigration()->getCity() . "</td>";
            echo "<td>" . $value->getImmigration()->getTime()->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . $value->getImmigration()->getReason() . "</td>";
        } else {
            echo "<td><strong>null</strong></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        }


        echo "</tr>";
    }
    echo "</table>";

}

function printDepartureTable($row)
{
    echo "<table width=\"40%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Travel ID</td>";
    echo "<td>Departure ID</td>";
    echo "<td>Departure City</td>";
    echo "<td>Departure Time</td>";
    echo "<td>Departure Reason</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";
        if (!$value->getTravel()== null){
            echo "<td>" . $value->getTravel()->getId() . "</td>";
        } else {
            echo "<td><strong>Null</strong></td>";
        }

        echo "<td>" . $value->getId() . "</td>";
        echo "<td>" . $value->getCity() . "</td>";
        echo "<td>" . $value->getTime()->format('Y-m-d H:i:s') . "</td>";
        echo "<td>" . $value->getReason() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function printImmigrationTable($row)
{
    echo "<table width=\"40%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Travel ID</td>";
    echo "<td>immigration ID</td>";
    echo "<td>immigration City</td>";
    echo "<td>immigration Time</td>";
    echo "<td>immigration Reason</td>";
    echo "</tr>";

    foreach ($row as $key => $value) {
        echo "<tr>";

        if (!$value->getTravel()== null){
            echo "<td>" . $value->getTravel()->getId() . "</td>";
        } else {
            echo "<td><strong>Null</strong></td>";
        }

        echo "<td>" . $value->getId(). "</td>";
        echo "<td>" . $value->getCity(). "</td>";
        echo "<td>" . $value->getTime()->format('Y-m-d H:i:s'). "</td>";
        echo "<td>" . $value->getReason(). "</td>";
        echo "</tr>";
    }
    echo "</table>";
}