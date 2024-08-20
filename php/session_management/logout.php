<?php
session_start();
header('Content-Type: application/json');


// unset($_SESSION['email']);
session_destroy();

echo json_encode(['success' => true]);
