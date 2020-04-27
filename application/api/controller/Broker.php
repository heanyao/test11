<?php

namespace app\api\controller;
use think\Request;

header('content-type:application/json;charset=utf-8');

class Broker extends Common
{

    private $obj;
    private $uid;

    public function _initialize()
    {
       $this->checkLogin();
       $this->obj = Model('broker');
       $this->uid = (int)session('userinfo.id');
    }
 
    //一级评论提交
    public function leavemessages()
    {
        //加载渲染时的评论数据
        if (Request::instance()->isGet()){
            $datas['broker_id']=input('broker_id');  
            $datas['support']=input('support');
            $datas['num']=input('num');  
            $datas['page']=input('page');     
                if (!isset($datas['num'])) {
                    $datas['num'] = 6;
                }

                if (!isset($datas['page'])) {
                    $datas['page'] = 1;
                }

                if (!isset($datas['support'])) {
                    $datas['support'] = 0;
                }

            $res=$this->obj->leavemsg($datas);
        };

        //POST提交时提交的评论数据
        if (Request::instance()->isPost()){
            $datas['broker_id']=input('post.broker_id'); 
            $datas['star']=input('post.star');  
            $datas['support']=input('post.support'); 
            $datas['msg']=input('post.msg');   
            $datas['netizen_id']= $this->uid;    
            
            $datas['create_time'] = time();
                if(!$datas['support']){
                    $this->returnMsg(400, '请点击是否推荐！');
                }
                if(!$datas['star']){
                    $this->returnMsg(400, '请选择评论星数！');
                }
            //图片上传
            $datas['comment_pics']=$this->obj->upload();

            //2. 往数据库插入文章信息
            $res = db('broker_comments')->insertGetId($datas);   
        }

        if ($res == null) {
            $this->returnMsg(400, '暂无数据！');
        } 
            //响应数据给客户端
            $this->returnMsg(200, '操作成功！', $res);
    }


    //二级及以上的评论提交
    public function subcomments()
    {
         
        //POST提交时提交的评论数据
        if (Request::instance()->isPost()){
            $postdata['pid']= input('post.commentid');
            $postdata['broker_id']= input('post.broker_id');
            $postdata['msg']= input('post.msg');
            $postdata['netizen_id']= $this->uid;     
            $postdata['create_time'] = time();

            //图片上传
            $datas['comment_pics']=$this->obj->upload();

            //2. 往数据库插入文章信息
            $res = db('broker_comments')->insertGetId($postdata);   

            }
 
        if ($res == null) {
            $this->returnMsg(400, '暂无数据！');
        } 
            //响应数据给客户端
            $this->returnMsg(200, '操作成功！', $res);
    }


}
