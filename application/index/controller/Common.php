<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{

    public function _initialize(){


    	//当前位置

        }

	// 判断是否登录
	function checkLoginTp5()
	{
	    $userId = session('userinfo.id');
	    if (empty($userId)) {
	        $this->error('请先登录',url('index/user/c_login'));
	    }
	}


}
