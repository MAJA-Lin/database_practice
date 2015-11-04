<?php
/**
 * Memory benchmark related to 
 * 	http://stackoverflow.com/questions/11657835/how-to-get-a-one-dimensional-scalar-array-as-a-doctrine-dql-query-result
 */
// Build an array of 50 MiB
$data = [];
for ($i = 0; $i < 1024; $i++) {
    $data[] = ['id' => str_repeat(' ', 1024 * 50)]; // store 50kb more
}
// Variant 1, will double memory usage to 100 MiB, if uncommented
$ids1 = [];
$ids1 = array_map('current', $data);
// Variant 2, will stay at 50 MiB
/*
$ids2 = [];
foreach ($data as $d) {
    $ids2[] = $d['id'];
}
*/
echo 'peak memory: ' . (memory_get_peak_usage() / 1024 / 1024) . " MiB\n";
