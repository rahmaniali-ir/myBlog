<?php

function isSignin() {
    if(isset($_SESSION['learnPath'])) {
        $learnPath = $_SESSION['learnPath'];

        if(isset($learnPath['signin'])) {
            if($learnPath['signin'] == true) {
                return true;
            }
        }
    }

    return false;
}

function getUser($email) {
    $user = getQuery("SELECT * FROM user WHERE email = '$email';");

    if(!$user) {
        return false;
    }
    
    return $user[0];
}

function signin($email, $password) {
    $user = getUser($email);
    if(!$user) {
        return false;
    }

    if($user['password'] != sha1($password)) {
        return false;
    }

    $_SESSION['learnPath']['signin'] = true;
    $_SESSION['learnPath']['id'] = $user['userId'];
    $_SESSION['learnPath']['name'] = $user['fullName'];

    return true;
}

function signup($email, $password, $name) {
    $emailBefore = getQuery("SELECT COUNT(*) FROM user WHERE email = '$email';");
    
    if($emailBefore[0]['COUNT(*)'] > 0) {
        return false;
    }

    $hash = sha1($password);

    $result = runQuery("INSERT INTO user (email, password, fullName) VALUES ('$email', '$hash', '$name');");

    if($result !== false) {
        $user = getQuery("SELECT * FROM user WHERE email = '$email';")[0];
        $_SESSION['learnPath']['signin'] = true;
        $_SESSION['learnPath']['id'] = $user['userId'];
        $_SESSION['learnPath']['name'] = $user['fullName'];
        return true;        
    }

    return false;
}

function signout() {
    try {
        unset($_SESSION['learnPath']);
        session_destroy();

        return true;
    } catch (Exception $e) {}
    
    return false;
}

function getCurrentUser() {
    return $_SESSION['learnPath'] ?? false;
}
