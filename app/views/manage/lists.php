<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>列表页</title>
<link rel="stylesheet" href="/www/manage/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="/www/js/jquery.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="/www/manage/js/ui.core.js" type="text/javascript"></script>
<script src="/www/manage/js/ui.checkbox.js" type="text/javascript"></script>
<script src="/www/manage/js/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="/www/manage/js/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="/www/manage/js/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="/www/manage/js/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="/www/manage/js/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
		image: "/www/manage/images/forms/choose-file.gif",
		imageheight : 21,
		imagewidth : 78,
		width : 310
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="/www/manage/js/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="/www/manage/js/jquery.tooltip.js" type="text/javascript"></script>
<script src="/www/manage/js/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="/www/manage/css/datePicker.css" type="text/css" />
<script src="/www/manage/js/date.js" type="text/javascript"></script>
<script src="/www/manage/js/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="/www/manage/js/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="/"><img src="/www/manage/images/shared/logo.png" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<?php include("inc/topsearch.php");?>

 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>

<?php include("inc/nav.php");?>
 
<div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>
		<?php if($this->uri->segment(2)=='open'){?>
		公开课列表
		<?php }elseif($this->uri->segment(2)=='train'){?>
		企业内训列表
		<?php }elseif($this->uri->segment(2)=='trainer'){?>
		培训师列表
		<?php }elseif($this->uri->segment(2)=='news'){?>
		新闻列表
		<?php }elseif($this->uri->segment(2)=='resource'){?>
		资源管理列表
		<?php }elseif($this->uri->segment(2)=='member'){?>
		员工列表
		<?php }elseif($this->uri->segment(2)=='robot'){?>
		爬虫列表
		<?php }?>
		</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="/www/manage/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="/www/manage/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="/www/manage/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="/www/manage/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="/www/manage/images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<div id="message-green" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="/www/manage/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<?php if($this->uri->segment(2)=='open'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">公开课名</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">讲师名</a></th>
					<th class="table-header-repeat line-left"><a href="">页面标题</a></th>
					<th class="table-header-repeat line-left"><a href="">开课时间</a></th>
					<th class="table-header-repeat line-left"><a href="">课程状态</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='train'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">内训课名</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">课程大纲</a></th>
					<th class="table-header-repeat line-left"><a href="">页面标题</a></th>
					<th class="table-header-repeat line-left"><a href="">暂缺</a></th>
					<th class="table-header-repeat line-left"><a href="">课程状态</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='trainer'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">讲师姓名</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">讲师电话</a></th>
					<th class="table-header-repeat line-left"><a href="">联系邮箱</a></th>
					<th class="table-header-repeat line-left"><a href="">助理姓名</a></th>
					<th class="table-header-repeat line-left"><a href="">助理联系方式</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='news'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">新闻名称</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">新闻标题</a></th>
					<th class="table-header-repeat line-left"><a href="">新闻来源</a></th>
					<th class="table-header-repeat line-left"><a href="">发布时间</a></th>
					<th class="table-header-repeat line-left"><a href="">暂无</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='resource'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">资源名称</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">资源类型</a></th>
					<th class="table-header-repeat line-left"><a href="">修改时间</a></th>
					<th class="table-header-repeat line-left"><a href="">修改人</a></th>
					<th class="table-header-repeat line-left"><a href="">创建时间</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='member'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">员工姓名</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">联系电话</a></th>
					<th class="table-header-repeat line-left"><a href="">身份证号码</a></th>
					<th class="table-header-repeat line-left"><a href="">入职时间</a></th>
					<th class="table-header-repeat line-left"><a href="">最后登录时间</a></th>
					<th class="table-header-options line-left"><a href="">操作</a></th>
				</tr>
				<?php }elseif($this->uri->segment(2)=='robot'){?>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">爬虫名</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">First Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Due</a></th>
					<th class="table-header-repeat line-left"><a href="">Website</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php }?>
				<tr>
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-4 info-tooltip"></a>
					</td>
				</tr>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-3 info-tooltip"></a>
					</td>
				</tr>
				<tr>
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-3 info-tooltip"></a>
					</td>
				</tr>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-3 info-tooltip"></a>
					</td>
				</tr>
				<tr>
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-3 info-tooltip"></a>
					</td>
				</tr>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="" title="删除" class="icon-2 info-tooltip"></a>
					<a href="" title="推荐" class="icon-3 info-tooltip"></a>
					</td>
				</tr>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">编辑</a>
					<a href="" class="action-delete">删除</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	上海聚宇企业管理咨询后台管理平台. <a href="../manage">www.waysfor.com</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>