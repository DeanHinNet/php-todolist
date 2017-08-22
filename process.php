<?php
require('new-connection.php');

$query = "SELECT * FROM tasks";
$results = fetch_all($query);
var_dump($results);
?>
