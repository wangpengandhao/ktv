<?php
class gamemanage{
    function index(){
        include 'App/views/gamemanage.html';
    }
    function  show(){
        $mysql=new mysqli('localhost','root','','ktv',3306);
//        pdo
        $mysql->query('set names utf8');
        $data=$mysql->query("select * from game")->fetch_all(1);
        echo json_encode($data);
    }
    function insert(){
        $gname=$_GET['gname'];
        $type= $_GET['type'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $mysql->query("insert into  game (gname,type) values ('{$gname}',{$type})");
        if ($mysql->affected_rows){
            echo 'ok';
            exit;
        }else{
            echo 'error';
        }
    }
    function delete(){
        $ids=$_GET['id'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $mysql->query("delete from game where gid={$ids}");
        if($mysql->affected_rows){
            echo 'ok';
            exit;
        }else{
            echo 'error';
        }
    }
    function update(){
        $ids=$_GET['ids'];
        $value=$_GET['value'];
        $type=$_GET['type'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $mysql->query("update game set $type='$value' where gid=$ids");
        if($mysql->affected_rows){
            echo 'ok';
            exit;
        }else{
            echo 'error';
        }
    }
}