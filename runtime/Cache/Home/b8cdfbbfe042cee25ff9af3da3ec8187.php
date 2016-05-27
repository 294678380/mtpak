<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta content="telephone=no" name="format-detection">
		<title><?php echo ($title?$title:'mtpak'); ?></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/zhangtaifeng/mtpak/public/css/viewport.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/zhangtaifeng/mtpak/public/css/swiper-3.3.0.min.css"/>
		<script src="http://localhost/zhangtaifeng/mtpak/public/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/zhangtaifeng/mtpak/public/js/base.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/zhangtaifeng/mtpak/public/js/angular/angular.min.js" type="text/javascript" charset="utf-8"></script>
		<!--[if lt IE 9]><script type="text/javascript" src="http://localhost/zhangtaifeng/mtpak/public/js/html5.js"></script><![endif]-->
	</head>
	<script type="text/javascript">
		var windowwidth = $(window).width();
	</script>
	<body>
		<header>
					<p><?php echo ($headertitle); ?></p>
					<div class="heading">
						<div class="headingbox">
							<div class="logo">
								<img src="http://localhost/zhangtaifeng/mtpak/public/images/logo.png" />
							</div>
							<a href="javascript:;" class="phone">
								<?php echo ($tel); ?>
							</a>
						</div>
					</div>
				</header>
		
		
	<div class="banner">
			<div class="swiper-wrapper">
			    <div class="swiper-slide"><img src="http://localhost/zhangtaifeng/mtpak/public/images/banner.jpg"/></div>
			    <div class="swiper-slide"><img src="http://localhost/zhangtaifeng/mtpak/public/images/banner.jpg"/></div>
			    <div class="swiper-slide"><img src="http://localhost/zhangtaifeng/mtpak/public/images/banner.jpg"/></div>
			 </div>
			 <div class="swiper-pagination"></div>
		</div>

		
	
		<!--内容区-->
	
		<div class="container">
			<!--top-->
			<div class="mt-ctop">
				<?php if(is_array($prolist)): $i = 0; $__LIST__ = array_slice($prolist,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-top-c mt-top-c<?php echo ($i); ?> mtpro">
						<div class="mtl">
							<p><?php echo substr($row['title'],0,5);?></p>
							<div class="strleng"><?php echo substr($row['title'],0,23);?>...</div>
							<span>GO</span>
						</div>
						<div class="mtr">
							<img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/>
						</div>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!--top::end-->
			<!--center-->
			<div class="mt-center">
				<?php if(is_array($prolist)): $i = 0; $__LIST__ = array_slice($prolist,3,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 3 );++$i; if($mod == '1'): ?><a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-random-list mtpro">
							<img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/>
						</a>
						<?php else: ?>
						<a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-random-list mtpro">
							<div class="mt-random-list-bg blur"><img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/></div>
							<div class="mrl-img">
								<img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/>
							</div>
							<div class="mrl-text">
								<span><?php echo substr($row['title'],0,5);?></span>
								<?php echo substr($row['title'],0,23);?>...
							</div>
						</a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<!--随机列表-->
			</div>
			<!--center:end-->
			<!--footer-->
			<div class="mt-footer">
				<?php if(is_array($prolist)): $i = 0; $__LIST__ = array_slice($prolist,7,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-random-list mtpro">
						<div class="mrlf-top">
								<div class="mt-random-list-bg blur"><img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/></div>
								<div class="mrl-img"><img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/></div>
						</div>
						<div class="mrlf-bot">
							<p><?php echo substr($row['title'],0,5);?></p>
							<span><?php echo substr($row['title'],5);?></span>
						</div>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!--footer::end-->
			
			<!--center-->
			<div class="mt-center">
				<!--随机列表-->
				<?php if(is_array($prolist)): $i = 0; $__LIST__ = array_slice($prolist,9,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 3 );++$i; if($mod == '1'): ?><a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-random-list mtpro">
							<img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/>
						</a>
						<?php else: ?>
						<a data-uid="<?php echo ($row["id"]); ?>" title="<?php echo ($row["title"]); ?>" href="<?php echo U('procontent',array('id'=>$row['id']));?>" class="mt-random-list mtpro">
							<div class="mt-random-list-bg blur"><img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/></div>
							<div class="mrl-img"><img src="http://localhost/zhangtaifeng/mtpak/public/images/<?php echo ($row["timg"]); ?>"/></div>
							<div class="mrl-text">
								<span><?php echo substr($row['title'],0,5);?></span>
								<?php echo substr($row['title'],0,23);?>...
							</div>
						</a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!--center:end-->
		</div>
		<!--内容区::end-->
		<div class="loading none">
			<img src="http://localhost/zhangtaifeng/mtpak/public/images/loading.gif"/><br/> loading...
		</div>

		
		<footer>
			<p>phone：<?php echo ($tel); ?> &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;   QQ：<?php echo ($qq); ?></p>
			<span><?php echo ($copy); ?></span>
		</footer>
		<script src="http://localhost/zhangtaifeng/mtpak/public/js/swiper-3.3.0.jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			//滚动
					var mySwiper = new Swiper('.banner', {
							autoplay: 5000,//可选选项，自动滑动
							autoplayDisableOnInteraction:false,
							pagination : '.swiper-pagination',
							paginationType:"fraction",
							loop:true
						});
					if(windowwidth<=720){
						$(".phone").attr("href","tel:<?php echo ($tel); ?>");
					}
					$(document).ready(function(){
						$("img").on("error",function(){
							$(this).attr("src","http://localhost/zhangtaifeng/mtpak/public/images/loading.gif");
						});
					});
					var MT = {
				//请求数据
				getNextPro:function(url,uid,len,callback){	
					$.ajax({
						type:"post",
						url:url,
						async:true,
						data:{
							"uid":uid,
							"len":len
						}
					}).done(callback).fail(function(){
						alert("Request failed, please check your network!")
					});
				},
				//获得随机数
				getrand:function (begin,end){
					return Math.floor(Math.random()*(end-begin))+begin;
					
				},
				//四列
				mtcenter:function(msg,start,len){  //msg=数据,start=开始位置,len=数量
					if(msg[start]==undefined){
						return "";
					}
					var mtcentert = "<div class='mt-center'>",
						slen=start+len,
						i=start,
						rand = MT.getrand(1,5)-1;
						for(i;i<slen;i++){
							if(msg[i]!=undefined){
								if(i==rand){
									mtcentert += '<a data-uid="'+msg[i].id+'" title="'+msg[i].title+'" href="/zhangtaifeng/mtpak/Home/Index/procontent/id/'+msg[i].id+'.html" class="mt-random-list mtpro">';
									mtcentert += '<img src="http://localhost/zhangtaifeng/mtpak/public/images/'+msg[i].timg+'"/>';
									mtcentert += '</a>';
								}else{
									mtcentert += '<a data-uid="'+msg[i].id+'" title="'+msg[i].title+'" href="/zhangtaifeng/mtpak/Home/Index/procontent/id/'+msg[i].id+'.html" class="mt-random-list mtpro">';
									mtcentert += '<div class="mt-random-list-bg blur"><img src="http://localhost/zhangtaifeng/mtpak/public/images/'+msg[i].timg+'"/></div>';
									mtcentert += '<div class="mrl-img"><img src="http://localhost/zhangtaifeng/mtpak/public/images/'+msg[i].timg+'"/></div>';
									mtcentert += '<div class="mrl-text"><span>'+msg[i].title.substr(0,5)+'</span>'+msg[i].title.substr(0,23)+'...</div>';
									mtcentert += '</a>';
								}
									
							}//for end
							
						}
					mtcentert += '</div>';
					return mtcentert;
				},
				//两列
				mtfooter:function(msg,start,len){  //msg=数据,start=开始位置,len=数量
					if(msg[start]==undefined){
						return "";
					}
					var mtcentert = '<div class="mt-footer">',
						slen=start+len,
						i=start;
						for(i;i<slen;i++){
							if(msg[i]!=undefined){
									mtcentert += '<a data-uid="'+msg[i].id+'" title="'+msg[i].title+'" href="/zhangtaifeng/mtpak/Home/Index/procontent/id/'+msg[i].id+'.html" class="mt-random-list mtpro">';
									mtcentert += '<div class="mrlf-top"><div class="mt-random-list-bg blur"><img src="http://localhost/zhangtaifeng/mtpak/public/images/'+msg[i].timg+'"/></div>';
									mtcentert += '<div class="mrl-img"><img src="http://localhost/zhangtaifeng/mtpak/public/images/'+msg[i].timg+'"/></div></div>';
									mtcentert += '<div class="mrlf-bot"><p>'+msg[i].title.substr(0,5)+'</p><span>'+msg[i].title.substr(0,23)+'...</span></div>';
									mtcentert += '</a>';
							}
							
									
						}
					mtcentert += '</div>';
						return mtcentert;
					}
				
				}
		</script>
		
	<script>
		$(document).ready(function(){
			(function(){
					var _win = $(window),
					docheight = $(document).height(),
					winheight = $(window).height(),
					//底部高度
					bottomtop = docheight-winheight,
					stime = null;
					
					_win.resize(function(){
						docheight = $(document).height();
						winheight = $(window).height();
						bottomtop = docheight-winheight;
					});
					_win.scroll(function(){
						var scrolltop = $(this).scrollTop(),
						scrollto = bottomtop-scrolltop;
						if(scrollto<=20){
							if(stime==null){
								stime = setTimeout(function(){
									//开始加载
									$(".loading").show();
									var mtpro = $(".mtpro"),
									htmlobj="",
									//记录最后id
									lastuid = mtpro.eq(mtpro.length-1).attr("data-uid");
									MT.getNextPro("<?php echo U('prolistshow');?>",lastuid,10,function(msg){
										//等于0加载完成
										if(msg==="0"){
											$(".loading").html("Loading completed");
											return false;
										}
										//组合加载元素
										 htmlobj +=  MT.mtcenter(msg,0,4);
										 htmlobj +=  MT.mtfooter(msg,4,2);
										 htmlobj +=  MT.mtcenter(msg,6,4);
										 //插入
										$(".container").append(htmlobj);
										//加载完成
										$(".loading").hide();
										stime = null;
									});
								},800);//settimeover
							};//if stime==null end
						}//if scrollto<=20 end
					});//scrollevent end
				})();
		});
	</script>

	</body>
</html>