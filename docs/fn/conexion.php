<?php
$hostname_ = "localhost";
$database_ = "xxxxxxxx";
$username_ = "xxxxxxx";
$password_ = "xxxxxxx";
$conexion  = mysqli_connect($hostname_, $username_, $password_, $database_);
mysqli_set_charset($conexion, 'utf8');
