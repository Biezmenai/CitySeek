<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 2016-10-19
 * Time: 00:18
 */

$conn = mysqli_connect("localhost", "root", "", "cityseek");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}