<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>上海聚宇企业管理咨询后台管理</title>
<link rel="stylesheet" href="/www/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="/www/manage/css/pro_dropline_ie.css" />
<![endif]-->
<!--  jquery core -->
<script src="/www/js/jquery.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="/www/admin/js/ui.core.js" type="text/javascript"></script>
<script src="/www/admin/js/ui.checkbox.js" type="text/javascript"></script>
<script src="/www/admin/js/jquery.bind.js" type="text/javascript"></script>
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
<script src="/www/admin/js/jquery.selectbox-0.5.js" type="text/javascript"></script>
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
<script src="/www/admin/js/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
		image: "/www/admin/images/forms/choose-file.gif",
		imageheight : 21,
		imagewidth : 78,
		width : 310
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="/www/admin/js/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="/www/admin/js/jquery.tooltip.js" type="text/javascript"></script>
<script src="/www/admin/js/jquery.dimensions.js" type="text/javascript"></script>
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
<link rel="stylesheet" href="/www/admin/css/datePicker.css" type="text/css" />
<script src="/www/admin/js/date.js" type="text/javascript"></script>
<script src="/www/admin/js/jquery.datePicker.js" type="text/javascript"></script>
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
<script src="/www/admin/js/jquery.pngFix.pack.js" type="text/javascript"></script>
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
	<a href=""><img src="/www/admin/images/shared/logo.png" alt="" /></a>
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
		<h1>上海聚宇企业管理咨询平台管理</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="/www/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="/www/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<h2>各位同事：</h2>
			<h3 style="text-indent:2em">welcome to Shanghai JuYu enterprise management consulting platform management</h3>
			
			很荣幸上海聚宇新版本的后台管理平台第二版本上线了。
			<br />
			<br />
			本平台尚处于测试阶段，如果在功能体验上有什么建议，请与平台程序员联系。希望能给大家提供一个好用的工作助手。谢谢！
			<br />
			<br />
			
			
			</div>
			<!--  end table-content  -->
	
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