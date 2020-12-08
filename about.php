<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/18
 * Time: 0:52
 */
require 'init.php';

session_start();
$user_id = $_SESSION['user']['id'];
$username = $_SESSION['user']['username'];

//查询本用户的所有文章
$user_about_sql = "select * from info18010265 where user_id=$user_id";
$user_about_stmt = $pdo->query($user_about_sql);
$user_about_data = $user_about_stmt->fetchAll(PDO::FETCH_ASSOC);


//查询当前用户的友链
$userid = $_SESSION['user']['id'];
$user_archives_sql = "select * from archives18010265 where user_id=$userid";
$user_archives_stmt = $pdo->query($user_archives_sql);
$user_archives_data = $user_archives_stmt->fetchAll(PDO::FETCH_ASSOC);

require './view/about.html';


