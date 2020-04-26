<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


use think\Route;
//配置用户登录的请求路径
Route::post('user/login', 'api/user/login');
Route::post('user/fastlogin', 'api/user/fastlogin');
// Route::get('userprofile/:userid','index/userprofile/getuserprofile');
//配置验证码请求路径
Route::get('code/:time/:username/:is_exist/:country_code', 'api/code/get_code');
//配置用户注册的请求路径
Route::post('user/register', 'api/user/register');
//配置用户找回密码请求路径
Route::post('user/findpwd', 'api/user/findpwd');
//配置用户上传头像请求路径
Route::post('user/icon', 'api/user/uploadheadimg');
//验证修改邮箱或手机时的验证码
Route::post('user/checkoldpwd', 'api/user/checkoldpwd');
//修改邮箱及手机号
Route::post('user/newemailandphone', 'api/user/newemailphone');
