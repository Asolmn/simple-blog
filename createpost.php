<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 23:22
 */
require './init.php';

//获取当前登录用户的用户名和id
session_start();
$user_id = $_SESSION['user']['id'];
$user_create_post_data = array('user_id'=>$user_id);


if(!empty($_POST)){
    //设置插入语句
    $user_create_post_sql = 'insert into info18010265(title,time,post,user_id,author) values(:title,:time,:post,:user_id,:author)';

    //获取post中的数据
    $user_create_post_fileds = array('title','time','post','post','author');
    foreach ($user_create_post_fileds as $value){
        $user_create_post_data[$value] = isset($_POST[$value]) ? trim(htmlspecialchars($_POST[$value])) : '';
    }

    //执行语句，把数据插入到表中
    $user_create_post_stmt = $pdo->prepare($user_create_post_sql);
    if(!$user_create_post_stmt->execute($user_create_post_data)){
        exit('Fail'.implode('-',$user_create_post_stmt->errorInfo()));

    }
    //跳转到主页
    header('Location:post.php');
    exit;

}



require './view/createpost.html';