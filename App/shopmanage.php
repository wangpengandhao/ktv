<?php
class shopmanage{
    public $db;
    function  __construct()
    {
        $obj=new db();
        $this->db=$obj->mysql;
    }

    function index(){
        $title='商店管理';
        include 'App/views/shopmanage.html';
    }
    /////////////////////////////
    function  show(){
        $mysql=new mysqli('localhost','root','','ktv',3306);
//        pdo
        $mysql->query('set names utf8');
        $data=$mysql->query("select * from shop")->fetch_all(1);
        echo json_encode($data);
    }
    ////////////////////////////////////////
    function insert(){
        $data=$_POST;
        $keys=array_keys($data);
        $str='(';
        for ($i=0;$i<count($keys);$i++){
            $str .=$keys[$i].',';
        }
        $str=substr($str,0,-1);
        $str.=') values (';
        foreach ($data as $v){
            $str.="'{$v}',";
        }
        $str=substr($str,0,-1);
        $str.=')';
        $sql="insert into shop {$str}";
        $this->db->query($sql);
        /*$sname=$_POST['sname'];
        $type= $_POST['type'];
        $hot=$_GET['hot'];
        $description=$_GET['description'];
        $price= $_GET['price'];
        $capacity= $_GET['capacity'];
        $file=$_GET['file'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $mysql->query("insert into shop (sname,type,hot,description,price,capacity,file) values ('{$sname}',{$type},'{$hot}','{$description}','{$price}','{$capacity}','{$file}')");*/
        if ($this->db->affected_rows){
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
        $mysql->query("delete from shop where sid={$ids}");
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
        $mysql->query("update shop set $type='$value' where sid=$ids");
        if($mysql->affected_rows){
            echo 'ok';
            exit;
        }else{
            echo 'error';
        }
    }
    function upload(){
        /*$_FILES['file'];*/
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            if(!file_exists('Public/upload')){
                mkdir('Public/upload');
            }
            $data=date('y-m-d');
            if (!file_exists('Public/upload/'.$data)){
                mkdir('Public/upload/'.$data);
            }
            $path='Public/upload/'.$data.'/'.$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                echo '/ktv/'.$path;
            }
        }
    }
}