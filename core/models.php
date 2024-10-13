<?php

require_once 'dbConfig.php' ;

function insertIntoUserAccounts($pdo,$user_id, $username,$user_password,$firstName,$lastName, $age, $membershipType, $membershipDateStart) {

    $sql = "INSERT INTO users_accounts (user_id, username, user_password,firstName,lastName, age, membershipType, membershipDateStart) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$user_id, $username,$user_password,$firstName,$lastName, $age, $membershipType, $membershipDateStart]) ;

    if ($executeQuery) {
        return true;
    }
}

function seeAllUserAccounts($pdo){
    $sql = "SELECT * FROM users_accounts";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    
    if($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getUserById($pdo, $user_id){
    $sql = "SELECT * FROM users_accounts WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$user_id])) {
            return $stmt->fetch();
    }
}

function updateAUser($pdo, $user_id, $username,$user_password,$firstName,$lastName, $age, $membershipType, $membershipDateStart){
    
    $sql = "UPDATE users_accounts
        SET username = ?,
            user_password = ?,
            firstName = ?,
            lastName = ?,
            age = ?,
            membershipType = ?,
            membershipDateStart = ?
        WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$username,$user_password,$firstName,$lastName, $age, $membershipType, $membershipDateStart, $user_id]);

    if($executeQuery){
        return true;
    }
}

function deleteAUser($pdo, $user_id) {
    $stmt = $pdo->prepare("DELETE FROM users_accounts WHERE user_id = ?");

    $executeQuery = $stmt->execute([$user_id]);

    if ($executeQuery) {
        return true;
    }
}

?>