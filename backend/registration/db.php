<?php

    // Database configuration
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "login_db";
    $conn = "";

    try {
        $conn = mysqli_connect(
            $db_server, 
            $db_user, 
            $db_password, 
            $db_name
        );

        echo "Connected successfully";
    } catch (mysqli_sql_exception) {
        echo"Could not connect";
    }


?>