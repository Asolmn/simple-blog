<?php
/**
 * Created by PhpStorm.
 * User: Asolmn
 * Date: 2020/6/17
 * Time: 1:20
 */

header('Content-type:text/html;charset=utf-8');

$dsn = 'mysql:host=localhost;dbname=jh;charset=utf8';

try{
    $pdo = new PDO($dsn,'root','123456');
}catch (PDOException $e){
    exit('Connent Mysql Server Fail'.$e->getMessage());
}
