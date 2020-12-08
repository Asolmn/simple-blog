<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 21:38
 */
session_start();
unset($_SESSION['user']);
header('Location:login.php');