<?php
session_start();
header('Content-Type: application/json');
require_once '../db_handler/dbh.php';

$response = ['success' => false, 'message' => ''];


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) && empty($password)) {
        $response['message'] = 'Email and password must be provided.';
    } elseif (empty($email)) {
        $response['message'] = 'Email is required.';
    } elseif (empty($password)) {
        $response['message'] = 'Password is required.';
    } elseif (Dbh::verifyUser($email, $password)) {
        $_SESSION['email'] = $email;
        $response['success'] = true;
        $response['message'] = 'Login successful.';
        $response['name'] = Dbh::getUserName($email);
    } else {
        $response['message'] = 'Invalid email or password.';
    }
} else {
    $response['message'] = 'Email and password must be provided.';
}

echo json_encode($response);
