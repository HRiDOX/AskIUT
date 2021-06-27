<?php


$con = mysqli_connect('localhost', 'root', '', 'loginpro');

// Function Clean String values
function escape($string)
{


    global $con;
    return mysqli_real_escape_string($con, $string);
}

// query Function

function query($query)
{
    global $con;
    return mysqli_query($con, $query);
}


// Confirmation Function

function Confirm($result)
{
    global $con;
    if (!$result) {
        die('Query Failed' . mysqli_error($con));
    }
}
// Fatch data from Database

function fatech_data($result)
{
    return mysqli_fetch_assoc($result);
}
//    Row values From database;
function row_count($count)
{
    return mysqli_num_rows($count);
}
