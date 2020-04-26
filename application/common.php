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
// 加密
function encryptStr($str, $key='fforex22'){
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = $block - (strlen($str) % $block);
  $str .= str_repeat(chr($pad), $pad);
  $enc_str = mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
  return base64_encode($enc_str);
}

// 解密
function decryptStr($str, $key='fforex22'){
  $str = base64_decode($str);
  $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = ord($str[($len = strlen($str)) - 1]);
  return substr($str, 0, strlen($str) - $pad);
}


    //自定义二维数组排序
function diySort($a, $b){
    $key='addtime';
    if($a[$key] == $b[$key]) return 0;
    return ($a[$key] < $b[$key])?-1:1;
}

 