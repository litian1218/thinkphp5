<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\User as UserModel; //引用user类

/**
*
*/
class User extends Controller
{
    public function index()
    {
        //对象实例化
        $User  = new UserModel();
        //取数据
        $users = $User::all();
        // dump($users);

        // 数据传入V层
        $this->assign('users',$users);
        return $this->fetch();
    }
    // 批量新增
    public function addList()
    {
        $User = new UserModel();
        $list = [
            ['nickname'=>'meiko1','email'=>'123@11.com','birthday'=>strtotime('1999-06-01')],
            // ['nickname'=>'deft','email'=>'132@11.com','birthday'=>strtotime('1999-05-02')],
            // ['nickname'=>'marin','email'=>'123@11.com','birthday'=>strtotime('199706701')],
        ];
        if ($User->saveAll($list)) {
            return '用户批量新增成功';
        }
        else{
            return $User->getError();
        }
    }
}