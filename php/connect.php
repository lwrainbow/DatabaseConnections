<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=lianxiao_web7', "lianxiao_person", "fF8Fk6G#%Ths");
} catch (Exception $e) {
    die('Could not connect to DB: ' . $e->getMessage());
}