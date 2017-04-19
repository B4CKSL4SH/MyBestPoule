<?php
/**
 * Created by PhpStorm.
 * User: Backslash
 * Date: 19/04/17
 * Time: 12:11
 */


$user = 'mybestroulette';
$pass = 'surpriseme';

try {
    $dbh = new PDO('mysql:host=128.1.1.114;dbname=mybestroulette', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}