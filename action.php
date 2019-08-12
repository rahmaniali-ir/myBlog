<?php

require_once('config.php');

$action = $_REQUEST['action'] ?? '';

if(empty($action)) {
    die();
}

switch($action) {
    case 'addToCart':
        
        if(!isSignin()) {
            dieJson([
                'status' => false,
                'reason' => 'user'
            ]);
        }
        
        $courseId = $_REQUEST['course'] ?? null;

        if($courseId == null) {
            dieJson([
                'status' => false,
                'reason' => 'courseId'
            ]);
        }

        $exists = recordExists('course', "courseId = $courseId");

        if(!$exists) {
            dieJson([
                'status' => false,
                'reason' => 'course'
            ]);
        }

        $userId = getCurrentUser()['id'];
        
        if(recordExists('cart', "course = $courseId AND user = $userId;")) {
            dieJson([
                'status' => false,
                'reason' => 'exists'
            ]);
        }

        if(!runQuery("INSERT INTO cart (user, course) VALUES ($userId, $courseId);")) {
            dieJson([
                'status' => false,
                'reason' => 'database'
            ]);
        }

        $cart = getQuery("SELECT COUNT(*) FROM cart WHERE user = $userId;")[0]['COUNT(*)'];
        
        dieJson([
            'status' => true,
            'count' => $cart
        ]);
        break;

    case 'removeFromCart':

        if(!isSignin()) {
            dieJson([
                'status' => false,
                'reason' => 'user'
            ]);
        }
        
        $courseId = $_REQUEST['course'] ?? null;

        if($courseId == null) {
            dieJson([
                'status' => false,
                'reason' => 'courseId'
            ]);
        }

        $exists = recordExists('course', "courseId = $courseId");

        if(!$exists) {
            dieJson([
                'status' => false,
                'reason' => 'course'
            ]);
        }

        $userId = getCurrentUser()['id'];
        
        if(!recordExists('cart', "course = $courseId AND user = $userId;")) {
            dieJson([
                'status' => false,
                'reason' => 'notExists'
            ]);
        }

        if(!runQuery("DELETE FROM cart WHERE course = $courseId AND user = $userId;")) {
            dieJson([
                'status' => false,
                'reason' => 'database'
            ]);
        }

        $cart = getQuery("SELECT * FROM cart WHERE user = $userId;");
        $count = count($cart);

        $sum = 0;
        foreach($cart as $item) {
            $id = $item['course'];
            $money = getQuery("SELECT price, courseOffPercent FROM course WHERE courseId = $id")[0];
            $sum += calcPrice($money['price'], $money['courseOffPercent']);
        }
        
        dieJson([
            'status' => true,
            'count' => $count,
            'sum' => $sum
        ]);
        break;
    case 'signin':
        $email = $_REQUEST['email'] ?? null;
        $password = $_REQUEST['password'] ?? null;

        if(!$email) {
            dieJson([
                'result' => false,
                'reason' => 'emptyEmail'
            ]);
        }

        if(!$password) {
            dieJson([
                'result' => false,
                'reason' => 'emptyPassword'
            ]);
        }

        $user = getUser($email);
        if(!$user) {
            dieJson([
                'result' => false,
                'reason' => 'user'
            ]);
        }

        $signin = signin($email, $password);

        if(!$signin) {
            dieJson([
                'result' => false,
                'reason' => 'password'
            ]);
        }

        dieJson([
            'result' => true
        ]);
        break;
    case 'signup':
        $name = $_REQUEST['name'] ?? null;
        $email = $_REQUEST['email'] ?? null;
        $password = $_REQUEST['password'] ?? null;

        if(!$name) {
            dieJson([
                'result' => false,
                'reason' => 'emptyName'
            ]);
        }

        if(!$email) {
            dieJson([
                'result' => false,
                'reason' => 'emptyEmail'
            ]);
        }

        // TODO: Check for regex

        if(!$password) {
            dieJson([
                'result' => false,
                'reason' => 'emptyPassword'
            ]);
        }

        $signup = signup($email, $password, $name);

        if($signup) {
            dieJson([
                'result' => true
            ]);
        }

        dieJson([
            'result' => false
        ]);
        break;
    case 'signout':
        
        dieJson([
            'result' => signout()
        ]);
        break;
    case 'pay':
        
        include_once('pay/functions.php');

        $userId = getCurrentUser()['id'];

        $api = getQuery('SELECT apiKey FROM info;')[0]['apiKey'];

        $cartItems = getQuery("
            SELECT price, courseOffPercent
            FROM cart
            INNER JOIN course
            ON cart.course = course.courseId
            WHERE cart.user = $userId;
        ");
        
        $amount = 0;
        foreach($cartItems as $item) {
            $amount += calcPrice($item['price'], $item['courseOffPercent']);
        }

        $description = "Test description";
        $redirect = 'http://learnpath.ir/buy';

        $mobile = "";
        $factorNumber = "";

        $result = send($api, $amount, $redirect, $mobile, $factorNumber, $description);
        $result = json_decode($result);

        if($result->status) {
            $token = $result->token;
            $go = "https://pay.ir/pg/$token";

            if($addToken) {
                dieJson([
                    'status' => true,
                    'url' => $go
                ]);
            } else {
                dieJson([
                    'status' => false,
                    'reason' => 'database'
                ]);
            }
        } else {
            dieJson([
                'status' => false,
                'reason' => $result->errorMessage
            ]);
        }

        break;
}
