<?php
namespace app\index\model;
use think\Model;
class User  extends Model
{
    public function save_user_info($data){
        $res = db('user')->where('id', session('userinfo')['id'])->update($data);
        return $res;
    }

}
