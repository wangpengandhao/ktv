<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/11/8
 * Time: 16:53
 */
class login{
    function index(){
        include 'App/views/login.html';
    }
    function check(){
        $user=$_REQUEST['user'];
        $pass=$_REQUEST['pass'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $data=$mysql->query("select * from admin where user='{$user}'")->fetch_all(1);
        for ($i=0;$i<count($data);$i++){
            if ($data[$i]['pass']==$pass){
                echo 'ok';
                exit;
            }
        }
        echo 'error';
    }
}