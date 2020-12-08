<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/18
 * Time: 1:11
 */
require 'init.php';
$id = $_GET['id'];
echo $id;

session_start();
$user_id = $_SESSION['user']['id'];

//通过get传入的id，查询本id的文章数据
$user_edit_post_sql_1 = "select * from info18010265 where id=$id";
$user_edit_post_stmt_1 = $pdo->query($user_edit_post_sql_1);
$user_edit_post_data_1 = $user_edit_post_stmt_1->fetchAll(PDO::FETCH_ASSOC);


if(!empty($_POST)){
    //获取post表单中的数据
    $user_edit_post_data_2 = array('id'=>$id);

    $user_edit_post_fileds = array('title','time','author','post');
    foreach ($user_edit_post_fileds as $value){
        $user_edit_post_data_2[$value] = isset($_POST[$value]) ? trim(htmlspecialchars($_POST[$value])) : '';
    }

    //修改数据，并返回到数据库中
    $user_edit_post_sql_2 = 'update info18010265 set title=:title,time=:time,author=:author,post=:post where id=:id';
    $user_edit_post_stmt_2 = $pdo->prepare($user_edit_post_sql_2);
    if(!$user_edit_post_stmt_2->execute($user_edit_post_data_2)){
        exit('Fail'.implode('-',$user_edit_post_stmt_2->errorInfo()));
    }
    //跳转回about页面
    header('Location:about.php');
    exit;
}

require './view/editpost.html';