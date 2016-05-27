/*@ ztf
 *@email 294678380@qq.com
 *@date 2016-03-16 
 * */
var CK = {
	/*弹窗dialog封装
	 *http://lab.seaning.com/_doc/API.html#options  参数文档地址
	 * */
	confirm:function(o){
		var b={
			 title: '提示',
			    content: '确定',
			    icon: 'succeed',
			    lock:true,
			    background:"#000000",
			    width:'auto',
			    height:'auto',
			    opacity:"0",
			    top:"-240px",
			    okVal:'确定',
			    cancelVal:'取消',
			    zIndex:"2016",
			    esc:true,
			    ok: function(){
			        //ok按钮执行的函数
			    },
			    init:function(){
			    	//对话框弹出后执行的函数
			    	
			    },
			    cancel:function(){
			    	//取消按钮执行的函数
			    }
		}
		$.extend(true,b,o);
		var fart = art.dialog(b);
		setTimeout(function(){
			fart.position("50%","20px")
		},0);
		return fart;
	},
	//提示框 t:提示内容字符串，d：多少秒后消失
	tips:function(t,d){
		if($(".aui_outer1").length>=1){
			return;
		}
		$('.aui_outer').removeClass('aui_outer1');
		typeof t=='string'?t=t:t="出错！";
		typeof d=='number'?d=d:d=2;
		var opts={
			title: false,
			time:d,
			fixed: true,
			cancel:false,
			zIndex:"2016",
			content:t,
			init:function(){
				$('.aui_outer').addClass('aui_outer1');
			},
			close:function(){
				$('.aui_outer').removeClass('aui_outer1');
			}
		};
		return art.dialog(opts);
	},
	open:function(url,options,cache){
			var opts=$.extend({
				title: false,
				lock: true,
				skin: "",
				opacity: 0.3,
				fixed: true,
				padding: 0,
				content: null,
				okVal:"确定",
				cancelVal:"取消",
				ok:null,
				cancel:null
			}, options);
			opts.skin="artDialog_diySkin1 QXT-popup-open "+opts.skin;
			return art.dialog.open(url,opts,cache);
		},
	pull:function(url,options,cache){
		var win = $(window);
		var opts=$.extend({
			title: "创可后台管理",
			lock: true,
			skin: "",
			opacity: 0.3,
			fixed: true,
			resize:true,
			esc:true,
			left:win.width()*2+"px",
			top:"0px",
			width:"70%",
			height:"100%",
			padding: 0,
			content: null,
			okVal:"确定",
			cancelVal:"123",
			ok:function(){
				
			},
			cancel:function(){
				
			},
			init:function(){
				//打开后回调
				$(".CK-rightbar").addClass("Ck-openon");
				fartopen.position("100%","0px")
			},
			close:function(){
				fartopen.position(win.width()*2+"px","0px");
				$(".CK-rightbar").removeClass("Ck-openon");
				setTimeout(function(){
					$(".CK-rightbar").remove();
					fartopen.hide();
				},500);
				return false;
			}
		}, options);
		opts.skin="artDialog_diySkin1 CK-rightbar "+opts.skin;
		var fartopen = art.dialog.open(url,opts,cache);
		return fartopen;
	},
	//当前页面索引
	leftsliderbarindex:function(n,i){
		/*u表示当前所在的选项  i表示当前索引*/
		var o = $('.leftsliderbar');
		o.children('.leftsliderbar-list:eq('+n+')').children('ul').children('li:eq('+i+')').addClass('active');
	},
	//选择城市联动 需要引入插件 area.js  obj=select对象
	addeventcity:function(obj){
		obj.on('change',function(){
			var sval = $(this).val();
			$(this).next(".s_province-lk-bg").html(sval);
			$(this).parent("div").attr("title",sval);
		});
	},
	//获取get参数 t:要获取的参数名 s:参数设置默认值
	getres:function(t,s){
		var f = window.location.href,
		n=f.indexOf("?")
		if(n==-1){
			return s;
		}else{
			f=f.substring(n+1);
			f = f.split(/[=&]/);
			for(n=0;n<f.length;n++){
				if(f[n]===t){
					return f[n+1];
				}
			}
		}
	},
	//日历方法 需先调用插件文件 e为调用jquery对象
	clendar:function(e){
		$(".Calendarbox").remove();
		var atime = $('body').Calendar({
					width:"240px",						//宽
					height:'260px',						//高
					titletext:"请选择时间",				//标题
					prevtext:"<",					//上月按钮的text 
					nexttext:">",					//下月按钮的text
					datecs:'datecs',					//是否显示月份  空为不显示  传入一个class值则创建一个显示年份和月份的盒子  	
					ecallback:function(e){				//切换产生的回调函数		有一个参数e  e为切换的按钮对象
						
					},
				callback:function(d){
						$(".Calendarbox").css({"left":e.offset().left+'px',"top":e.offset().top+e.height()+'px'});
						$(document).on("click",function(){$(".Calendarbox").remove();});
						$("#clearok").on("click",function(){if($("#cdateh").val().length<1){$("#cdateh").val("00");}else if(Number($("#cdateh").val())>24){
								CK.tips("小时不能超过24");
								return;
							}
							if($("#cdatem").val().length<1){
								$("#cdatem").val("00")
							}else if(Number($("#cdatem").val())>60){
								CK.tips("分钟不能超过60");
								return;
							}
							if($("#cdates").val().length<1){
								$("#cdates").val("00")
							}else if(Number($("#cdates").val())>60){
								CK.tips("秒钟不能超过60");
								return;
							}
							var date = $(".Datetitle>.formdate").attr("title")+" "+$("#cdateh").val()+":"+$("#cdatem").val()+":"+$("#cdates").val();
							e.val(date);
							$(".Calendarbox").remove();
						});
						$(".Calendarbox").on("click",function(event){
							if(event && event.stopPropagation){
								event.stopPropagation();
							}else{
								window.event.cancelBubble = true;
							}
						});
						$(".Datetitle").on("click","td",function(){
							$(".Datetitle>td").removeClass("formdate");
							$(this).addClass("formdate");
						});
				}
			});
	},
	//单选，多选按钮  o为laebl元素对象  checked-on选中样式
	checkboxval:function(o){
	    var cheb = o.children("input[type=checkbox]");
		var c = cheb.is(":checked");
		c?o.addClass("checked-on"):o.removeClass("checked-on");
		o.on("click",function(){
			c = cheb.is(":checked");
			c?o.addClass("checked-on"):o.removeClass("checked-on");
		});
	},
	//手机号验证 t为输入文本 返回布尔值
	phonecode:function(t){
		var rex = /^1[3456789][0-9]{9,9}$/g;
		var tl = rex.test(t);
		if(!tl){
			this.tips("请输入正确的手机号码");
		}
		return tl;
	},
	emailcode:function(t){
		var rex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/g;
		var tl = rex.test(t);
		if(!tl){
			this.tips("请输入正确的邮箱");
		}
		return tl;
	},
	//公共select
	CKselect:function(){
		$(".selbtn,.s_province").on("change",function(){
				$(this).next().html($(this).find("option:selected").text());
			});
		$(".selbtn,.s_province").each(function(){
			$(this).next().html($(this).find("option:selected").text());
		});
	},
	//bind函数  fn为绑定function context为执行环境对象
	bind:function(fn,context){
		var _arg = [].slice.call(arguments,2);
		return function(){
			var _fnarg = _arg.concat([].slice.call(arguments));
			return fn.apply(context,_fnarg);
		}
	},
	//选项卡公共函数  oul::选项卡ul  callback回调函数第一个参数返回当前点击event 第二个返回当前项索引 
	tab:function(oul,callback){
		oul.on("click","li",function(event){
			$(this).siblings("li").removeClass("active");
			$(this).addClass("active");
			if(callback){
				callback(event,$(this).index());
			}
		});
	}
	
}


$(function(){ 

 CK.CKselect();
//修复登陆页问题
//判断浏览器是否支持placeholder属性
  supportPlaceholder='placeholder'in document.createElement('input'),
 	placeholder=function(input){
		var text = input.attr('placeholder'),
		defaultValue = input.defaultValue;
		if(!defaultValue){
			input.val(text).addClass("phcolor");
		}
		input.focus(function(){
		if(input.val() == text){
			$(this).val("");
		  }
		});
		input.blur(function(){
		if(input.val() == ""){
		$(this).val(text).addClass("phcolor");
		  }
		});
		//输入的字符不为灰色
		input.keydown(function(){
			$(this).removeClass("phcolor");
		    });
		  };
  //当浏览器不支持placeholder属性时，调用placeholder函数
  if(!supportPlaceholder){
 	$('input').each(function(){
 		text = $(this).attr("placeholder");
 		if($(this).attr("type") == "text"){
 		placeholder($(this));
      }
    });
  }
 });