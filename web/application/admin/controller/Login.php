<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;


class Login extends Admin{

    /*登录*/
    public function  login(){
      //  $username=input('username');
        $username='admin';
       // $password=input('password');
        $password='123456';
        $user=getDbMsg('user',array('name'=>$username));
        if($user){
            if($user['password']===$password){
                session('user',$user);
                return json('0','登录成功');
            }else{
                return json('100','登录失败');
            }
        }
    }

    /*登出*/
    public function logout(){
        session('user',null);
        return json('0','退出登录');
    }



}