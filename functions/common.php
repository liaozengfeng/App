<?php
function curl_post($url,$data)
{
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function curl_get($url)
{
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

// 无限极分类
function createTree($data,$parent_id=0,$level=0)
{
 //1定义一个容器(新数组)
 static $new_arr=[];
 //2遍历数据一条条比对
 foreach($data as $k=>$v){
  if($v['parent_id']==$parent_id){
   $v['level']=$level;
   $new_arr[]=$v;
   createTree($data,$v['sort_id'],$level+1);
  }
 }
 return $new_arr;
}
