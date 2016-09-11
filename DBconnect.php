<<<<<<< HEAD
<?php
$mysqli = new mysqli("localhost", "root", "", "car_service_db");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" .
        $mysqli->connect_errno . ") " .
        $mysqli->connect_error;
}
//echo "[".$mysqli->host_info . "]\n";
=======
<?php
$mysqli = new mysqli("localhost", "root", "", "service_station");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" .
        $mysqli->connect_errno . ") " .
        $mysqli->connect_error;
}
echo "[".$mysqli->host_info . "]\n";
>>>>>>> origin/master
