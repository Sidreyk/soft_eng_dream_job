<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $age = trim($_POST['age']);
    $membershipType = trim($_POST['membershipType']);
    $membershipDateStart = trim($_POST['membershipDateStart']);

    if (!empty($username) && !empty($user_password) && !empty($firstName) && !empty($lastName) && !empty($age) && !empty($membershipType) && !empty($membershipDateStart)) {
        
        $query = insertIntoUserAccounts($pdo, null, $username, $user_password, $firstName, $lastName, $age, $membershipType, $membershipDateStart);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editUserBtn'])) {
    $user_id = $_GET['user_id'];
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $age = trim($_POST['age']);
    $membershipType = trim($_POST['membershipType']);
    $membershipDateStart = trim($_POST['membershipDateStart']);

    if (!empty($user_id) && !empty($username) && !empty($user_password) && !empty($firstName) && !empty($lastName) && !empty($age) && !empty($membershipType) && !empty($membershipDateStart)) {

        $query = updateAUser($pdo, $user_id, $username, $user_password, $firstName, $lastName, $age, $membershipType, $membershipDateStart);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Update failed";
        }
    }
    else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteUserBtn'])) {

    $user_id = $_GET['user_id'];
    if (!empty($user_id)) {
        $query = deleteAUser ($pdo, $user_id);

        if ($query) {
            header("Location: ../index.php");
            exit();
        }
        else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid user ID";
    }
}

?>
