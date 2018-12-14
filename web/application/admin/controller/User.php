<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;


class User extends Admin{

    /*用户列表*/
    public function userList(){
       $user=getDbMsgs('user',[],'name,phone,role_id,status,create_time');
       return json('0','',$user);
    }

    /*修改用户信息*/
    public function editUser(){
        $id=input('id');  //用户id
        $data=[
            'name'=>input('name'),
            'phone'=>input('phone'),
            'password'=>input('password'),
            'role_id'=>input('role_id'),
            'status'=>input('status'),
            'email'=>input('email')
        ];
        if($id){
            $edit=editDbMsg('user',array('id'=>$id),$data);
            $msg='编辑';
        }else{
            $data['create_time']=time();
            $edit=addDbMsg('user',array('id'=>$id),$data);
            $msg='新增';
        }
        if($edit){
            return json('0',$msg.'成功');
        }else{
            return json('100',$msg.'失败');
        }
    }

    /*删除用户信息*/
    public function delUser(){
        $id=input('id');  //用户id
        $del=delDbMsg('user',array('id'=>$id));
        if($del){
            return json('0','删除成功');
        }else{
            return json('100','删除失败');
        }
    }


}