<?php
session_start();
if(isset($_SESSION['login'])){
  header('Location: index.php');
}else{
  header('Location: forms/auth/login.php');
}