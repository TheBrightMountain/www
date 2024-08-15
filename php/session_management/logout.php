<?php
session_start();
header('Content-Type: application/json');


unset($_SESSION['email']);


echo json_encode(['success' => true]);
