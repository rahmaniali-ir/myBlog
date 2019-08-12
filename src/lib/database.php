<?php

// $databaseServer = 'localhost';
// $databaseDatabase = 'learnPath';
// $databaseUsername = 'alirahmani';
// $databasePassword = 'ali911379';

// $pdo = new PDO("mysql:host=$databaseServer;dbname=$databaseDatabase;", $databaseUsername, $databasePassword);
// $pdo->query("SET CHARACTER SET utf8");

function runQuery($query) {
    
    if(!$query) {
        return false;
    }
    
    global $pdo;
    
    if($results = $pdo->query($query)) {
        return $results;
    } else {
        return false;
    }
}

function getQuery($query) {
    
    if(!$query) {
        return false;
    }
    
    global $pdo;
    
    $results = $pdo->query($query);
    
    $rows = [];

    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}

function recordExists($table, $where = '') {
    if((!is_string($table)) || empty($table)) {
        return false;
    }

    if(empty($where)) {
        $exists = getQuery("SELECT COUNT(*) FROM $table;")[0]['COUNT(*)'];
    } else {
        $exists = getQuery("SELECT COUNT(*) FROM $table WHERE $where;")[0]['COUNT(*)'];
    }
    
    if($exists > 0) {
        return true;
    } else {
        return false;
    }
}

function tableCount($table, $where = '') {
    
    if(!$table) {
        return false;
    }
    
    global $pdo;
    
    $query = "SELECT COUNT(*) FROM $table";
    
    if($where) {
        $query .= " WHERE $where";
    }
    
    $results = $pdo->query($query);
    
    if($row = $results->fetch(PDO::FETCH_ASSOC)) {
        return $row['COUNT(*)'];
    }
}
