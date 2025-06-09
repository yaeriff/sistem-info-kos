<?php
session_start();

function isLogin()
{
  if(!isset($_SESSION['login'])){
    header('Location: ../dashboard/index.php');
  }
}
