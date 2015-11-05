<?php

require_once "bootstrap.php";

$dql = "SELECT t, d FROM Travel t JOIN t.departure d";

$result = $entityManager->createQuery($dql)->getScalarResult();
echo "The traveling & departure result are : \n";
foreach ($result as $key => $value) {

    var_dump($value);
    /*
    $query = $entityManager->find('Travel', $value['t_id']);
    $entityManager->remove($query);
    */
}

$entityManager->flush();