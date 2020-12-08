<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 1:20
 */


require 'init.php';

//获取数据库的用户名和密码
$user_login_sql = 'select id,username,password from user18010265';
$user_stmt_login = $pdo->query($user_login_sql);
$user_login_data = $user_stmt_login->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['username'])&&isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //循环从数据库获取的数据，和post请求发送的数据，进行比较
    foreach ($user_login_data as $value){
        $id=$value['id'];
        if($value['username'] == $username && $value['password'] == $password) {
            print_r($value['username']==$username);
            //如果一样，则跳转到博客首页
            session_start();
            $_SESSION['user'] = array('id' => $id, 'username' => $value['username']);
            header('Location:post.php');
            exit;
        }else{
            header('Location:./logfail.php');
//            header('content-type:text/html;charset=utf-8');
//            $url='logfail.php';
//            echo "<script>window.location.href='$url';</script>";
        }
    }
}

require './view/login.html';