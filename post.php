<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 1:42
 */
require 'init.php';

session_start();
$username = $_SESSION['user']['username'];

$id = $_SESSION['user']['id'];

//查询info表中的所有数据
$user_post_sql = 'select * from info18010265';
//获取执行语句后的数据
$user_stmt_post = $pdo->query($user_post_sql);
$user_post_data = $user_stmt_post->fetchAll(PDO::FETCH_ASSOC);


//查询当前用户的友链
$user_id = $_SESSION['user']['id'];
$user_archives_sql = "select * from archives18010265 where user_id=$user_id";
$user_archives_stmt = $pdo->query($user_archives_sql);
$user_archives_data = $user_archives_stmt->fetchAll(PDO::FETCH_ASSOC);

require './view/post.html';