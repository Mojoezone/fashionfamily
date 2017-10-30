<?php
//just some variable dont need to be in order for data
$database = 'joe_products';
$username = 'joe_blog';
$password = '';
$db_host  = 'localhost';

//connect to the database this the order that need to be in
$db = new mysqli(
  $db_host, $username, $password, $database
);

//check for Error
if($db->connect_errno > 0){
  die('Error connecting to database');
}

//store our security salt in a constant strengthening the password data base and login, if the salt change every password becomes Invalid, constant is cap usually, we can access SALT on every page
define('SALT', 'dwaldjladjlw&*^&%^@#!@kfka7834280daj&(^(#*-/+))' );



//no close php
