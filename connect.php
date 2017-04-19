<?php
/**
 * Created by PhpStorm.
 * User: Backslash
 * Date: 19/04/17
 * Time: 12:11
 */

try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}