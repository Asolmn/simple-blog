<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 22:13
 */

require './init.php';


session_start();
//获取登录用户名
$username = $_SESSION['user']['username'];
//获取登录用户的id
$id = $_SESSION['user']['id'];

//查询目前登录用户的所有数据
$user_edit_sql_1 = "select * from user18010265 where id=$id";
$user_stmt_edit = $pdo->query($user_edit_sql_1);
$user_edit_data = $user_stmt_edit->fetchAll(PDO::FETCH_ASSOC);


//如果$_POST不为空
if(!empty($_POST)){
    //获取post中的数据
    $user_edit_sql_data = array('id'=>$id);
    $user_edit_fileds = array('username','password','age','email','phone','about');
    foreach ($user_edit_fileds as $value){
        $user_edit_sql_data[$value] = isset($_POST[$value]) ? trim(htmlspecialchars($_POST[$value])) : '';
    }

    //提交用户信息修改
    $user_edit_sql_2 = "update user18010265 set username=:username,password=:password,age=:age,email=:email,phone=:phone,about=:about where id=:id";
    $user_edit_sql_stmt = $pdo->prepare($user_edit_sql_2);
    if(!$user_edit_sql_stmt->execute($user_edit_sql_data)){
        exit('Fail'.implode('-',$user_edit_sql_stmt->errorInfo()));
    }
    //执行成功后，跳转到主页
    header('Location:post.php');
    exit;
}

require './view/edit.html';
