<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/18
 * Time: 18:05
 */
require 'init.php';

$user_id = $_GET['id'];

//检测表单，如果有内容，使用insert语句，插入到友链数据库中
if(!empty($_POST)){
    $content = $_POST['content'];
    $name = $_POST['name'];
    $user_archives_data = array('content'=>$content,'name'=>$name,'user_id'=>$user_id);
    $user_archives_sql = 'insert into archives18010265(content,name,user_id) values(:content,:name,:user_id)';
    $user_archives_stmt = $pdo->prepare($user_archives_sql);
    if(!$user_archives_stmt->execute($user_archives_data)){
        exit('Fail'.implode('-',$user_archives_stmt->errorInfo()));
    }
    header('Location:post.php');
    exit;

}




require './view/archives.html';