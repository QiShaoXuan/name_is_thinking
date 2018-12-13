<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;


class Login extends Controller{

    /*登录*/
    public function  index(){
      //  $username=input('username');
        $username='admin';
       // $password=input('password');
        $password='123456';
        $user=getDbMsg('user',array('name'=>$username));
        if($user){
            if($user['password']===$password){
               // return json('0','登录成功');
            }else{
               // return json('0','登录失败');
            }
        }

    }




}