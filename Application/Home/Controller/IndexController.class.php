<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	header("Content-Type:text/html;charset=utf-8");
        echo '主页！';
    }

    private function guid(){
	    if (function_exists('com_create_guid')){
	        return com_create_guid();
	    }else{
	        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	        $charid = strtoupper(md5(uniqid(rand(), true)));
	        $hyphen = chr(45);// "-"
	        $uuid = chr(123)// "{"
	                .substr($charid, 0, 8).$hyphen
	                .substr($charid, 8, 4).$hyphen
	                .substr($charid,12, 4).$hyphen
	                .substr($charid,16, 4).$hyphen
	                .substr($charid,20,12)
	                .chr(125);// "}"
	        return $uuid;
	    }
	}

    public function register(){
    	if(IS_GET){
    		$this->display();
    	}
    	if(IS_POST){
    		$mobile = I('post.mobile','');
    		$password = I('post.password','','md5');
    		$confirm_password = I('post.confirm_password','','md5');
    		$checkcode = I('post.checkcode','');
    		if($confirm_password == $password){
    			$Users = M('Users');
    			$data['YHSJ'] = $mobile;
    			$data['YHMM'] = $password;
    			$data['GUID'] = $this->guid();
    			$find_result = $Users->where("YHSJ=$mobile")->find();
    			if($find_result){
    				$this->error("手机号已注册！");
    			}else{
    				$result = $Users->add($data);
	    			if($result){
	    				$this->success("注册成功！","login",3);
	    			}else{
	    				$this->error("注册失败！");
	    			}
    			} 			
    		}else{
    			$this->error("两次密码输入不一致！");
    		}
    	}
    }

    public function login(){
    	if(IS_GET){
    		$this->display();
    	}
    	if(IS_POST){
    		$mobile = I('post.mobile','');
    		$password = I('post.password','','md5');
    		$Users = M('Users');
    		$find_result = $Users->where("YHSJ=$mobile")->getField('YHMM');
    		if($find_result){
    			if($find_result == $password){
    				$this->success("登录成功！","index",3);
		    	}else{
		    		$this->error("密码错误！");
		    	}
    		}else{
    			$this->error("该账户不存在！");
    		}
    	}
    }
}