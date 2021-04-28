<?php
//   include "DatabaseOOP.php";
//   $db = new DatabaseOOP("localhost", "root", "", "m07uf3");
//   $db->connect();
//   include "DatabaseProc.php";
//   $db = new DatabaseProc("localhost", "root", "", "m07uf3");
//   $db->connect();
   include "DatabasePDO.php";
   $db = new DatabasePDO("localhost", "root", "", "m07uf3");
   $db->connect();


?>