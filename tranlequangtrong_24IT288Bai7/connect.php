<?php

$connect = mysqli_connect('localhost', 'root', '', 'tintuc');
if (mysqli_connect_errno() !== 0) {
    die("Error: Could not connect to the database. ".mysqli_connect_error());
}
mysqli_set_charset($connect, 'utf8');
