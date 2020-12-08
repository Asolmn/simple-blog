<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/18
 * Time: 16:28
 */

require 'init.php';

session_start();
$username = $_SESSION['user']['username'];

$id = $_GET['id'];

//打印当前浏览的博客
//通过get传入的id，当作查询条件
$user_browsepost_sql_1 = "select * from info18010265 where id=$id";
$user_browsepost_stmt_1 = $pdo->query($user_browsepost_sql_1);
$user_browsepost_data_1 = $user_browsepost_stmt_1->fetchAll(PDO::FETCH_ASSOC);

$post_id = $_GET['id'];

//检测评论表单，有没有发来的post的数据
//如果有，使用insert语句，插入数据库
if(!empty($_POST)){
    $comment = $_POST['comment'];
    $post_id = $_GET['id'];
    $user_comment_data_1 = array('comment'=>$comment,'post_id'=>$post_id);

    $user_comment_sql_1 = 'insert into comment18010265(comment,post_id) values(:comment,:post_id)';
    $user_comment_stmt_1 = $pdo->prepare($user_comment_sql_1);
    if(!$user_comment_stmt_1->execute($user_comment_data_1)){
        exit('Fail'.implode('-',$user_comment_stmt_1->errorInfo()));
    };

}

//打印评论数据库中的所有评论
$user_comment_sql_2 = "select * from comment18010265 where post_id=$post_id";
$user_comment_stmt_2 = $pdo->query($user_comment_sql_2);
$user_comment_data_2 = $user_comment_stmt_2->fetchAll(PDO::FETCH_ASSOC);


//查询当前用户的友链
$userids = $_SESSION['user']['id'];
$user_archives_sql = "select * from archives18010265 where user_id=$userids";
$user_archives_stmt = $pdo->query($user_archives_sql);
$user_archives_data = $user_archives_stmt->fetchAll(PDO::FETCH_ASSOC);

require './view/browsepost.html';