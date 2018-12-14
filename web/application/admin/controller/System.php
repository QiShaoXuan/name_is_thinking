<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;


class System extends Admin{

    /*角色列表*/
    public function  roleList(){
        $role=getDbMsgs('role');
        return json('0','',$role);
    }

    /*角色编辑*/
    public function editRole(){
        $id=input('id');  //角色id
        $data=[
            'name'=>input('name'),
            'menu_list'=>input('menu_list')
        ];
        if($id){
            $edit=editDbMsg('role',array('id'=>$id),$data);
            $msg='编辑';
        }else{
            $edit=addDbMsg('role',array('id'=>$id),$data);
            $msg='新增';
        }
        if($edit){
            return json('0',$msg.'成功');
        }else{
            return json('100',$msg.'失败');
        }
    }

    /*删除角色信息*/
    public function delRole(){
        $id=input('id');  //角色id
        $del=delDbMsg('role',array('id'=>$id));
        if($del){
            return json('0','删除成功');
        }else{
            return json('100','删除失败');
        }
    }

    /*菜单列表*/
    public function  menuList(){
        $menu=getDbMsgs('menu');
        return json('0','',$menu);
    }

    /*菜单编辑*/
    public function editMenu(){
        $id=input('id');  //菜单id
        $data=[
            'name'=>input('name'),
            'module'=>input('module'),
            'controller'=>input('controller'),
            'parent_id'=>input('parent_id'),
            'sort'=>input('sort'),
            'status'=>input('status')
        ];
        if($id){
            $edit=editDbMsg('menu',array('id'=>$id),$data);
            $msg='编辑';
        }else{
            $edit=addDbMsg('menu',array('id'=>$id),$data);
            $msg='新增';
        }
        if($edit){
            return json('0',$msg.'成功');
        }else{
            return json('100',$msg.'失败');
        }
    }

    /*删除菜单信息*/
    public function delMenu(){
        $id=input('id');  //菜单id
        $del=delDbMsg('menu',array('id'=>$id));
        if($del){
            return json('0','删除成功');
        }else{
            return json('100','删除失败');
        }
    }


}