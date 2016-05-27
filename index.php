<?php
header("Content-type:text/html;charset=utf-8");
	//1.判断当前php版本是否支持thinkphp  3.2以上版本需要php5.3以上的环境支持！
	if(version_compare(PHP_VERSION,"5.3.0")==-1){
		exit("当前php版本不支持thinkphp框架");
	};
	//2.定义一个rootpath常亮  当前根目录的地址				dirname()去掉路径后面的文件名
	define("ROOT_PATH",dirname($_SERVER["SCRIPT_FILENAME"])."/");
	//3.定义think_path thinkphp框架所在的目录
	define("THINK_PATH",ROOT_PATH."ThinkPHP/");
	//4.定义应用目录
	define("APP_PATH",ROOT_PATH."location/");
	//5.开启debug模式
	define("APP_DEBUG",true);
	//6.定义临时文件存放目录runtime目录
	define("RUNTIME_PATH",ROOT_PATH."runtime/");
	//7.引入thinkphp入口文件
	require THINK_PATH."ThinkPHP.php";
