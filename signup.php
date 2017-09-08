<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password]))
{
include "include_signup.php";
}
else
{
include "login.php";
}
?>