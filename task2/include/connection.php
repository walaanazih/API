<?php

$dbHost = "localhost";
$dbDatabase = "task2";
$dbUser = "root";
$dbPass = "";

$con = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);
$con->set_charset("utf8");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	
}

function get_db_connection()
{

    $dbHost = "localhost";
    $dbDatabase = "task2";
    $dbUser = "root";
    $dbPass = "";

    $con = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);
    $con->set_charset("utf8");

    return $con;

}