<?php
require_once 'dbh.php';
header('Content-Type: application/json');
echo json_encode(Dbh::selectAllFromTable('personnels'));