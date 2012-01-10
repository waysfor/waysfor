/* 自动补全搜索
 * editby shaman 2011-06-07
 */
(function($){
	$.fn.autoTip=function(opt){
		var _setting={    //默认的设置
			url:"http://localhost/myjqPlug/autoTip/autoTip.php",
			tipWid:196
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
								$('<li class='+_odd+'><a href="javascript:show_load('+val.id+')">'+val.classname+'</a></li>').appendTo(_sel_ul).hover(function(){
									$(this).addClass("hover").click(function(){
										_this.val($(this).text());
										
										$('[name=classname]').val(val.classname);
										if(val.status=='0'){
											h_status='请选择课程性质';
										}else if(val.status=='1'){
											h_status='公开课';
										}else if(val.status=='2'){
											h_status='企业内训';
										}
										$('.styledselect_form_1').eq(0).val(h_status);
										if(val.classtype=='0'){
											h_classtype='未分类';
										}else if(val.classtype=='1'){
											h_classtype='人力资源';
										}else if(val.classtype=='2'){
											h_classtype='综合管理';
										}else if(val.classtype=='3'){
											h_classtype='生产管理';
										}else if(val.classtype=='4'){
											h_classtype='营销管理';
										}else if(val.classtype=='5'){
											h_classtype='财务管理';
										}else if(val.classtype=='6'){
											h_classtype='物流采购';
										}
										$('.styledselect_form_1').eq(2).val(h_classtype);
										
										/*
										KindEditor.create('textarea[name="classcontent"]',{
											width:'99%'
										}).appendHtml(val.content);
										*/
										KE.html('textarea[name="classcontent"]',val.content);

										$('[name=status]').val(val.status);
										$('[name=classtype]').val(val.classtype);
										$('[name=object]').val(val.object);
										//$('[name=classcontent]').val(val.content);
										clearInterval(_delay);
										_sel_ul.hide(0);
									})
								},function(){
									$(this).removeClass("hover")
								});
							})
						}else{
							$('<li>无相关记录！</li>').appendTo(_sel_ul)
						}
					})
				}
			};
		})
	}
})(jQuery)