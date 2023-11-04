<?php
include("../db/connect.php");
require('crud-oop.php');

//OBJECT
$hapusData = new Product($db);

//OOP Edit Data
$hapusData->deleteProducts();
?>