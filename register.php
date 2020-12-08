<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 1:55
 */
require 'init.php';

if(!empty($_POST)){

    $user_register_data = array();
    $user_register_fileds = array('username','password','age','email','phone','about');
    //获取post中的数据，保存到user_register_data数组中
    foreach ($user_register_fileds as $value){
        $user_register_data[$value] = isset($_POST[$value]) ? trim(htmlspecialchars($_POST[$value])) : '';
    }
    //向数据库中插入数据
    $user_register_sql = 'insert into user18010265(username,password,age,email,phone,about) values (:username,:password,:age,:email,:phone,:about)';
    //执行语句
    $user_register_stmt = $pdo->prepare($user_register_sql);
    if(!$user_register_stmt->execute($user_register_data)){
        exit('Fail'.implode('-',$user_register_stmt->errorInfo()));
    }
    //执行后跳转到登录页面
    header('Location:login.php');
    exit;
}

require './view/register.html';