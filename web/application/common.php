<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/*查询数据表中多条信息，返回二维数组
 * $db  数据表名称
 * $where  where条件（数组形式）
 * $order  排序方式（默认按照id正序排列）
 * */
function getDbMsgs($db,$where=[],$field='',$order='id asc'){
    $db_name=Db($db);
    $data=$db_name->where($where)->field($field)->order($order)->select();
    return $data;
}

/*查询数据表中单条信息，返回一维数组
 * $db  数据表名称
 * $where  where条件（数组形式）
 * $order  排序方式（默认按照id正序排列）
 * */
function getDbMsg($db,$where=[],$field='',$order='id asc'){
    $db_name=Db($db);
    $data=$db_name->where($where)->order($order)->find();
    return $data;
}

/*
 * *返回json信息
 * */
function json($code,$msg,$data=[]){
    $result=json_encode(array('code'=>$code,'msg'=>$msg,'data'=>$data),JSON_UNESCAPED_UNICODE);
    return $result;
}

/*修改数据表中信息
 * $db  数据表名称
 * $where  where条件（数组形式）
 * $editData  修改的数据（数组形式）
 * */
function editDbMsg($db,$where=[],$editData=[]){
    $db_name=Db($db);
    $data=$db_name->where($where)->update($editData);
    return $data;
}

/*添加数据表中信息
 * $db  数据表名称
 * $where  where条件（数组形式）
 * $addData  插入的数据（数组形式）
 * */
function addDbMsg($db,$where=[],$addData=[]){
    $db_name=Db($db);
    $data=$db_name->where($where)->insertGetId($addData);
    return $data;
}

/*删除数据表中信息
 * $db  数据表名称
 * $where  where条件（数组形式）
 * */
function delDbMsg($db,$where=[]){
    $db_name=Db($db);
    $data=$db_name->where($where)->delete();
    return $data;
}