<?php
/**
 * Created by PhpStorm.
 * User: Backslash
 * Date: 19/04/17
 * Time: 12:11
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function get_database() {
    static $dbh = null;
    if ($dbh !== null) {
        return $dbh;
    }

    try {
        $user = 'mybestroulette';
        $pass = 'surpriseme';

        $dbh = new PDO('mysql:host=128.1.1.114;dbname=mybestroulette', $user, $pass);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
