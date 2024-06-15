<?php

// Database Details
session_start();
define( "DB_HOST", "localhost" );
define( "DB_USER", "root" );
define( "DB_PASSWORD", "" );
define( "DB_NAME", "pharma" );

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(mysqli_error($con));