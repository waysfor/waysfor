/* 自动补全搜索
 * editby shaman 2011-06-07
 */
(function($){
	$.fn.autoTip=function(opt){
		var _setting={    //默认的设置
			url:"http://localhost/myjqPlug/autoTip/autoTip.php",
			tipWid:186
		},
		o=$.extend(_setting,opt);
		$(this).each(function(){
			var _this=$(this).find("#autoTip"),
				_wrap=$("<div/>",{
					"id":"autoTip_box",
					"style":"display:inline;position:relative;height:"+_this.outerHeight()+"px"
				}),
				_sel_ul=$("<ul/>",{
					"class":"autoTip_list",
					"style":"display:none;position:absolute;left:0;top:"+_this.outerHeight()+"px;width:"+o.tipWid+"px"
				}),
				_delay;
			_this.wrap(_wrap).after(_sel_ul);
			_this.bind({
				"keyup":function(){
					_search()
				},"blur":function(){
					_delay=setInterval(function(){_sel_ul.hide(0)},300);
				},"focus":function(){
					clearInterval(_delay);
					if($.trim(_this.val())==""){
						_sel_ul.hide(0).empty();
					}
					_sel_ul.show(0);
				}
			})
			function _search(){
				var _keyValue=$.trim(_this.val());
				_sel_ul.hide(0).empty(); //先清空列表
				if(_keyValue!=""){
					$.getJSON(o.url,'keyWord='+_keyValue,function(data){
						_sel_ul.show(0);
						if(data.status){
							$.each(data.list,function(i,val){
								var _odd=i%2==0?"odd":"none";
								$('<li class='+_odd+' rel="'+val.id+'">'+val.classname+'</li>').appendTo(_sel_ul).hover(function(){$(this).addClass("hover")},function(){$(this).removeClass("hover")});
							})
						}else{
							$('<li>无相关记录！</li>').appendTo(_sel_ul)
						}
						
						_sel_ul.find("li").click(function(){
							_this.val($(this).text());
							//$('[name=object]').val('111');
							clearInterval(_delay);
							_sel_ul.hide(0);
						})
					})
				}
			};
		})
	}
})(jQuery)