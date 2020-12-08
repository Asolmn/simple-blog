<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/18
 * Time: 1:47
 */
require 'init.php';

//获取当前文章id
$id = $_GET['id'];
$user_delete_post_data = array('id'=>$id);

//删除对应id的数据，相当于删除本文
$user_delete_post_sql = "delete from info18010265 where id=:id";
$user_delete_post_stmt = $pdo->prepare($user_delete_post_sql);

if(!$user_delete_post_stmt->execute($user_delete_post_data)){
    exit('Fail'.implode('-',$user_delete_post_stmt->errorInfo()));
}

header('Location:about.php');
