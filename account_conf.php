<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])) // Jika Belum Login Maka otomatis redirect ke halamn login
{
include "login.php";
}
else // Jika Sudah LOGIN maka bisa di akses
{
include "include_account_conf.php";
}
?>