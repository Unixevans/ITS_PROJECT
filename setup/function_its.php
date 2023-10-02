<?php

$conn = mysqli_connect("sql203.infinityfree.com", "if0_35089016", "V0flSgHyBW1hO", "if0_35089016_dataweb");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}





?>