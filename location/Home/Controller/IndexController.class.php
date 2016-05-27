<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){
    	$this->publicdata();
		//查询产品最大的值
		$maxproModel = D("AdminPro");
		$maxpro = $maxproModel->query("select id from admin_pro order by id desc limit 1");
		$maxprouid = (int)$maxpro[0]["id"]+1;
		//最大值即最新产品
		$_prolist = $this->prolist($maxprouid);
		$this->assign("prolist",$_prolist);
		$this->assign("procontenturl",U("procontent"));
		$this->display("index");
		
	}
	public function procontent(){
		echo I("get.id");
	}
	//下拉加载请求地址
	public function prolistshow(){
		if(IS_AJAX){
			$this->prolist();
		}else{
			$this->_empty();
		}
	}
	//找不到页面
	public function _empty(){
		echo "404 no found <a href=".U(index).">back home</a>";
	}
	//私有方法  公共信息
	private function publicdata(){
		$DataModel = D("AdminData");
		//查询数据
		$publicdata = $DataModel->select();
		$this->assign("copy",$publicdata[0]["copr"]);
    	$this->assign("qq",$publicdata[0]["qq"]);
    	$this->assign("tel",$publicdata[0]["tel"]);
		//头部宣传信息
		$this->assign("headertitle",$publicdata[0]["cate"]);
	}
	//私有方法  产品信息  每次查询大于uid后的列表 13个  post请求 
	private function prolist($_uid){
		//产品
		$ProModel = D("AdminPro");
		//查询条件查询小于 uid后面的参数
		$_uid = (int)I("post.uid",$_uid);   //起始id
		$_proleng = (int)I("post.ulen",13); //查询个数
		$prosql = "SELECT * FROM admin_pro where id<{$_uid} order by id desc limit {$_proleng}";
		$prolist = $ProModel->query($prosql);
		
		if(IS_AJAX){
			//ajax请求返回
			if(count($prolist)<=0){
				$this->ajaxReturn("0");
			}else{
				$this->ajaxReturn($prolist);
			}
		}else{
			return $prolist;
		}
	}
	
	
}